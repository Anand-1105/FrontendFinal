<?php
session_start();
require_once '../db-connection.php';

function generateOTP() {
    return sprintf("%06d", mt_rand(0, 999999));
}

function sendEmail($to, $subject, $message) {
    // Email headers
    $headers = array(
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: FuturePath Mentor <noreply@futurepath.com>',
        'Reply-To: noreply@futurepath.com',
        'X-Mailer: PHP/' . phpversion()
    );

    // Configure PHP mail settings for Windows
    ini_set("SMTP", "localhost");
    ini_set("smtp_port", "25");
    ini_set("sendmail_from", "noreply@futurepath.com");

    // For testing/development, we'll log the email instead of sending it
    $emailContent = "To: $to\nSubject: $subject\n\n$message";
    error_log("Email would be sent: \n" . $emailContent);

    // For development, always return true and show OTP in logs
    if (strpos($message, 'verification code') !== false || strpos($message, 'OTP') !== false) {
        preg_match('/<strong>(\d+)<\/strong>/', $message, $matches);
        if (isset($matches[1])) {
            error_log("Development mode - OTP for $to: " . $matches[1]);
        }
    }
    
    return true;

    // In production, uncomment this:
    // return mail($to, $subject, $message, implode("\r\n", $headers));
}

function storeOTP($email, $otp, $type) {
    $conn = getConnection();
    try {
        // Delete any existing OTPs for this email and type
        $stmt = $conn->prepare("DELETE FROM otps WHERE email = ? AND type = ?");
        $stmt->bind_param("ss", $email, $type);
        $stmt->execute();

        // Insert new OTP
        $stmt = $conn->prepare("INSERT INTO otps (email, otp, type, created_at, expires_at) VALUES (?, ?, ?, NOW(), DATE_ADD(NOW(), INTERVAL 15 MINUTE))");
        $stmt->bind_param("sss", $email, $otp, $type);
        
        return $stmt->execute();
    } catch (Exception $e) {
        error_log("Error storing OTP: " . $e->getMessage());
        return false;
    } finally {
        $conn->close();
    }
}

function verifyOTP($email, $otp, $type) {
    $conn = getConnection();
    try {
        $stmt = $conn->prepare("SELECT * FROM otps WHERE email = ? AND otp = ? AND type = ? AND expires_at > NOW()");
        $stmt->bind_param("sss", $email, $otp, $type);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            // Delete the used OTP
            $deleteStmt = $conn->prepare("DELETE FROM otps WHERE email = ? AND type = ?");
            $deleteStmt->bind_param("ss", $email, $type);
            $deleteStmt->execute();
            return true;
        }
        return false;
    } catch (Exception $e) {
        error_log("Error verifying OTP: " . $e->getMessage());
        return false;
    } finally {
        $conn->close();
    }
}

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $action = $data['action'] ?? '';
    
    header('Content-Type: application/json');
    
    switch ($action) {
        case 'send_reset_otp':
            $email = $data['email'];
            $conn = getConnection();
            
            // Check if email exists
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            
            if ($stmt->get_result()->num_rows === 0) {
                echo json_encode(['success' => false, 'message' => 'Email not found']);
                $conn->close();
                exit;
            }
            
            $conn->close();
            
            // Generate and store OTP
            $otp = generateOTP();
            if (storeOTP($email, $otp, 'reset_password')) {
                $subject = "Password Reset OTP";
                $message = "
                    <html>
                    <head><title>Password Reset OTP</title></head>
                    <body>
                        <h2>Password Reset Request</h2>
                        <p>Your OTP for password reset is: <strong>{$otp}</strong></p>
                        <p>This OTP will expire in 15 minutes.</p>
                        <p>If you didn't request this, please ignore this email.</p>
                    </body>
                    </html>";
                
                if (sendEmail($email, $subject, $message)) {
                    echo json_encode(['success' => true, 'message' => 'OTP sent to your email']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to send OTP']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to generate OTP']);
            }
            break;
            
        case 'verify_reset_otp':
            $email = $data['email'];
            $otp = $data['otp'];
            
            if (verifyOTP($email, $otp, 'reset_password')) {
                // Generate a temporary token for password reset
                $token = bin2hex(random_bytes(32));
                $conn = getConnection();
                
                $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expires = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
                $stmt->bind_param("ss", $token, $email);
                $stmt->execute();
                $conn->close();
                
                echo json_encode(['success' => true, 'token' => $token]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid or expired OTP']);
            }
            break;
            
        case 'reset_password':
            $token = $data['token'];
            $password = $data['password'];
            $conn = getConnection();
            
            try {
                $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_token_expires > NOW()");
                $stmt->bind_param("s", $token);
                $stmt->execute();
                
                if ($stmt->get_result()->num_rows === 1) {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_token_expires = NULL WHERE reset_token = ?");
                    $stmt->bind_param("ss", $hashedPassword, $token);
                    
                    if ($stmt->execute()) {
                        echo json_encode(['success' => true, 'message' => 'Password reset successful']);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Failed to reset password']);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'Invalid or expired reset token']);
                }
            } catch (Exception $e) {
                error_log("Password reset error: " . $e->getMessage());
                echo json_encode(['success' => false, 'message' => 'An error occurred']);
            } finally {
                $conn->close();
            }
            break;
            
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
    exit;
}
?>
<?php 
include 'includes/header.php'; 
include 'includes/navigation.php';
?>

<div class="min-h-screen pt-24 pb-12 flex flex-col items-center">
  <div class="w-full max-w-md p-8 space-y-8 bg-white dark:bg-gray-800 rounded-lg shadow-md transition-all duration-300">
    <div class="text-center">
      <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">Verify Email</h1>
      <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Enter the verification code sent to your email</p>
    </div>

    <div id="verification-form" class="mt-8 space-y-6">
      <div id="form-message" class="hidden p-4 mb-4 text-sm rounded-lg"></div>
      
      <div>
        <label for="otp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Verification Code</label>
        <div class="mt-1">
          <input id="otp" name="otp" type="text" required maxlength="6" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-primary focus:border-primary text-base" placeholder="Enter 6-digit code">
        </div>
      </div>

      <div>
        <button onclick="verifyEmail()" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Verify Email</button>
      </div>

      <div class="text-center">
        <button onclick="resendVerificationCode()" class="text-sm text-primary hover:text-primary/80">Resend verification code</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get email from URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const userEmail = urlParams.get('email');
    
    if (!userEmail) {
        window.location.href = 'sign-in.php';
    }
});

function showMessage(message, type) {
    const formMessage = document.getElementById('form-message');
    formMessage.textContent = message;
    formMessage.classList.remove('hidden', 'bg-red-100', 'text-red-700', 'bg-green-100', 'text-green-700');
    
    if (type === 'error') {
        formMessage.classList.add('bg-red-100', 'text-red-700');
    } else {
        formMessage.classList.add('bg-green-100', 'text-green-700');
    }
    
    formMessage.classList.remove('hidden');
}

async function verifyEmail() {
    const urlParams = new URLSearchParams(window.location.search);
    const email = urlParams.get('email');
    const otp = document.getElementById('otp').value;
    
    if (!otp || otp.length !== 6) {
        showMessage('Please enter a valid 6-digit verification code', 'error');
        return;
    }
    
    try {
        const response = await fetch('auth/auth-handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'verify_email',
                email: email,
                otp: otp
            })
        });
        
        const data = await response.json();
        
        if (data.success) {
            showMessage('Email verified successfully. Redirecting to login...', 'success');
            setTimeout(() => {
                window.location.href = 'sign-in.php';
            }, 2000);
        } else {
            showMessage(data.message, 'error');
        }
    } catch (error) {
        showMessage('An error occurred. Please try again.', 'error');
    }
}

async function resendVerificationCode() {
    const urlParams = new URLSearchParams(window.location.search);
    const email = urlParams.get('email');
    
    try {
        const response = await fetch('auth/auth-handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'resend_verification',
                email: email
            })
        });
        
        const data = await response.json();
        
        if (data.success) {
            showMessage('Verification code sent successfully', 'success');
        } else {
            showMessage(data.message, 'error');
        }
    } catch (error) {
        showMessage('An error occurred. Please try again.', 'error');
    }
}
</script>

<?php include 'includes/footer.php'; ?>
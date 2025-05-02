<?php
// Process the aptitude test form submission
session_start();
require_once 'db-connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize arrays to store answers and scores
$answers = [];
$careerClusters = [
    'Science & Technology' => 0,
    'Business & Management' => 0,
    'Arts & Communication' => 0,
    'Health Services' => 0,
    'Social Services' => 0
];

// Process interests section
for ($i = 0; $i < 10; $i++) {
    $interestKey = "interest_" . $i;
    if (isset($_POST[$interestKey])) {
        $answers[$interestKey] = intval($_POST[$interestKey]);
        
        // Update career cluster scores based on interests
        switch($i) {
            case 0:
            case 1:
                $careerClusters['Science & Technology'] += $answers[$interestKey];
                break;
            case 2:
            case 3:
                $careerClusters['Arts & Communication'] += $answers[$interestKey];
                break;
            case 4:
            case 5:
                $careerClusters['Business & Management'] += $answers[$interestKey];
                break;
            case 6:
            case 7:
                $careerClusters['Health Services'] += $answers[$interestKey];
                break;
            case 8:
            case 9:
                $careerClusters['Social Services'] += $answers[$interestKey];
                break;
        }
    }
}

// Process skills section
for ($i = 0; $i < 10; $i++) {
    $skillKey = "skill_" . $i;
    if (isset($_POST[$skillKey])) {
        $answers[$skillKey] = intval($_POST[$skillKey]);
        
        // Update career cluster scores based on skills
        switch($i) {
            case 0:
            case 1:
                $careerClusters['Science & Technology'] += $answers[$skillKey];
                break;
            case 2:
            case 3:
                $careerClusters['Arts & Communication'] += $answers[$skillKey];
                break;
            case 4:
            case 5:
                $careerClusters['Business & Management'] += $answers[$skillKey];
                break;
            case 6:
            case 7:
                $careerClusters['Health Services'] += $answers[$skillKey];
                break;
            case 8:
            case 9:
                $careerClusters['Social Services'] += $answers[$skillKey];
                break;
        }
    }
}

// Process values section (if exists)
for ($i = 0; $i < 12; $i++) {
    $valueKey = "value_" . $i;
    if (isset($_POST[$valueKey])) {
        $answers[$valueKey] = intval($_POST[$valueKey]);
    }
}

// Calculate recommended career clusters
arsort($careerClusters);
$recommendedClusters = array_slice($careerClusters, 0, 3, true);

// Save results to database
function saveQuizResults($answerJson, $quizType, $resultJson) {
    try {
        $conn = getConnection(); // Use the connection function from db-connection.php
        
        // Get user ID from session (assuming user is logged in)
        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        // Convert results to a score (average of top clusters)
        $scores = array_values($resultJson);
        $score = !empty($scores) ? array_sum($scores) / count($scores) : 0;

        // Prepare statement with correct table structure
        $stmt = $conn->prepare("INSERT INTO quiz_results (user_id, test_type, score, created_at) VALUES (?, ?, ?, NOW())");
        if (!$stmt) {
            throw new Exception("Prepare failed: " . ($conn->error ?? 'Unknown error'));
        }

        // Bind parameters matching table structure
        if (!$stmt->bindParam(1, $userId, PDO::PARAM_INT) || 
            !$stmt->bindParam(2, $quizType, PDO::PARAM_STR) ||
            !$stmt->bindParam(3, $score, PDO::PARAM_STR)) {
            throw new Exception("Binding parameters failed: " . $stmt->errorInfo()[2]);
        }
        
        // Execute statement
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->errorInfo()[2]);
        }

        error_log("Quiz results saved successfully for user ID: " . $userId);
        $conn = null; // Close the PDO connection by setting it to null
        return true;
    } catch (Exception $e) {
        error_log("Error saving quiz results: " . $e->getMessage());
        if (isset($conn)) {
            $conn = null; // Close the PDO connection by setting it to null
        }
        return false;
    }
}

// Save results and redirect
if (saveQuizResults(
    json_encode($answers), 
    'career_assessment',
    json_encode($recommendedClusters)
)) {
    // Store results in session for display on next page
    $_SESSION['quiz_results'] = [
        'clusters' => $recommendedClusters,
        'scores' => $careerClusters
    ];
    
    error_log("Quiz results saved successfully");
    header("Location: career-paths.php");
    exit();
} else {
    error_log("Failed to save quiz results");
    $_SESSION['error'] = "There was an error processing your results. Please try again.";
    header("Location: aptitude-test.php");
    exit();
}
?>

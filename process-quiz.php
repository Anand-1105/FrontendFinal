<?php
require_once 'db-connection.php';

// When quiz is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = 1; // Replace with actual user ID from session
    $answers = $_POST['answers']; // Your quiz answers array
    $recommendedClusters = []; // Your calculated clusters
    $totalScore = 0; // Your calculated score
    
    // Save to database
    if (saveQuizResults($userId, $answers, $recommendedClusters)) {
        echo "Quiz results saved successfully!";
    } else {
        echo "Error saving quiz results";
    }
}
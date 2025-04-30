<?php
header('Content-Type: application/json');

// Get the raw POST data
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!isset($data['message'])) {
    http_response_code(400);
    echo json_encode(['error' => 'No message provided']);
    exit;
}

$userMessage = $data['message'];

// Here you would typically make a call to your AI service
// For now, we'll use some simple response logic
function getAIResponse($message) {
    $message = strtolower($message);
    
    if (strpos($message, 'technology') !== false && strpos($message, 'creativity') !== false) {
        return 'Careers that combine technology and creativity include UX/UI Design, Web Development, Digital Marketing, Game Design, Animation, and Data Visualization. These fields allow you to use both technical skills and creative thinking. Would you like more information about any of these career paths?';
    }
    else if (strpos($message, 'healthcare') !== false || strpos($message, 'medical') !== false) {
        return 'To prepare for a career in healthcare, you should focus on science subjects like Biology, Chemistry, and Physics. Consider volunteering at hospitals or clinics, and research specific healthcare roles that interest you. Depending on your goal, you might need anything from a certificate program to advanced medical degrees.';
    }
    else if (strpos($message, 'future') !== false && strpos($message, 'skills') !== false) {
        return 'The most important skills for future jobs include: 1) Digital literacy and programming, 2) Data analysis and interpretation, 3) Adaptability and continuous learning, 4) Critical thinking and problem-solving, 5) Emotional intelligence and collaboration, and 6) Creativity and innovation.';
    }
    else {
        return 'Thank you for your question. I can help you explore various career paths, educational requirements, and job market trends. Feel free to ask about specific industries, skills, or educational paths that interest you.';
    }
}

$response = getAIResponse($userMessage);

echo json_encode(['response' => $response]);
?>
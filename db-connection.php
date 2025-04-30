<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');  // Replace with your database username
define('DB_PASS', '');  // Replace with your database password
define('DB_NAME', 'career_counselling');  // Replace with your database name

function getConnection() {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Function to simulate getting user data
function getUserData($userId) {
    // Simulated user data
    $users = [
        1 => [
            "id" => 1,
            "name" => "John Doe",
            "email" => "john@example.com",
            "test_completed" => true,
            "recommended_clusters" => [
                "Information Technology",
                "Science, Technology, Engineering & Mathematics",
                "Business, Management & Administration"
            ]
        ],
        2 => [
            "id" => 2,
            "name" => "Jane Smith",
            "email" => "jane@example.com",
            "test_completed" => true,
            "recommended_clusters" => [
                "Health Science",
                "Education & Training",
                "Human Services"
            ]
        ]
    ];
    
    return isset($users[$userId]) ? $users[$userId] : null;
}

// Function to simulate getting career data
function getCareerData($careerCluster = null) {
    // Simulated career data with expanded information
    $careers = [
        "Software Developer" => [
            "cluster" => "Information Technology",
            "education" => "Bachelor's degree in Computer Science or related field",
            "salary" => "$105,000 - $150,000",
            "growth" => "22% (Much faster than average)",
            "description" => "Develops applications and systems that run on computers and other devices. Creates software for various purposes from mobile applications to enterprise systems."
        ],
        "Web Developer" => [
            "cluster" => "Information Technology",
            "education" => "Associate's degree or Bachelor's degree in Web Development or related field",
            "salary" => "$77,000 - $120,000",
            "growth" => "13% (Faster than average)",
            "description" => "Designs and creates websites, focusing on the technical aspects including performance, capacity, and functionality."
        ],
        "Cybersecurity Analyst" => [
            "cluster" => "Information Technology",
            "education" => "Bachelor's degree in Cybersecurity or related field",
            "salary" => "$95,000 - $145,000",
            "growth" => "33% (Much faster than average)",
            "description" => "Plans and implements security measures to protect computer networks and systems from cyberattacks and data breaches."
        ],
        "Database Administrator" => [
            "cluster" => "Information Technology",
            "education" => "Bachelor's degree in Computer Science or Information Technology",
            "salary" => "$93,000 - $140,000",
            "growth" => "8% (As fast as average)",
            "description" => "Stores and organizes data using specialized software, ensuring that data is available to authorized users and secure from unauthorized access."
        ],
        "Registered Nurse" => [
            "cluster" => "Health Science",
            "education" => "Bachelor's degree in Nursing",
            "salary" => "$75,000 - $110,000",
            "growth" => "9% (As fast as average)",
            "description" => "Provides and coordinates patient care, educates patients about health conditions, and offers advice and emotional support to patients and their families."
        ],
        "Physician Assistant" => [
            "cluster" => "Health Science",
            "education" => "Master's degree in Physician Assistant Studies",
            "salary" => "$115,000 - $160,000",
            "growth" => "31% (Much faster than average)",
            "description" => "Practices medicine under the supervision of physicians and surgeons, examining, diagnosing, and treating patients."
        ],
        "Medical Laboratory Technologist" => [
            "cluster" => "Health Science",
            "education" => "Bachelor's degree in Medical Technology or Clinical Laboratory Science",
            "salary" => "$53,000 - $80,000",
            "growth" => "11% (Faster than average)",
            "description" => "Performs tests on body fluids, tissue, and other substances to help diagnose health conditions and diseases."
        ],
        "Physical Therapist" => [
            "cluster" => "Health Science",
            "education" => "Doctoral Degree in Physical Therapy",
            "salary" => "$91,000 - $130,000",
            "growth" => "18% (Much faster than average)",
            "description" => "Helps injured or ill people improve movement and manage pain, working with patients to restore or improve mobility."
        ],
        "Financial Analyst" => [
            "cluster" => "Finance",
            "education" => "Bachelor's degree in Finance, Accounting, Economics, or related field",
            "salary" => "$85,000 - $125,000",
            "growth" => "6% (As fast as average)",
            "description" => "Guides businesses and individuals in making investment decisions by assessing the performance of stocks, bonds, and other types of investments."
        ],
        "Accountant" => [
            "cluster" => "Finance",
            "education" => "Bachelor's degree in Accounting or related field",
            "salary" => "$73,000 - $115,000",
            "growth" => "7% (As fast as average)",
            "description" => "Prepares and examines financial records, ensuring their accuracy and that taxes are paid properly and on time."
        ],
        "Financial Advisor" => [
            "cluster" => "Finance",
            "education" => "Bachelor's degree in Finance, Economics, or related field",
            "salary" => "$89,000 - $150,000",
            "growth" => "5% (As fast as average)",
            "description" => "Provides advice to clients on personal finance matters, including investments, insurance, mortgages, and retirement planning."
        ],
        "Actuary" => [
            "cluster" => "Finance",
            "education" => "Bachelor's degree in Mathematics, Actuarial Science, or Statistics",
            "salary" => "$108,000 - $160,000",
            "growth" => "24% (Much faster than average)",
            "description" => "Analyzes the financial costs of risk and uncertainty using mathematics, statistics, and financial theory to assess the risk of potential events."
        ],
        "Mechanical Engineer" => [
            "cluster" => "Science, Technology, Engineering & Mathematics",
            "education" => "Bachelor's degree in Mechanical Engineering",
            "salary" => "$90,000 - $135,000",
            "growth" => "7% (As fast as average)",
            "description" => "Designs, develops, builds, and tests mechanical devices and systems. Works on various components, tools, engines, and machines."
        ],
        "Data Scientist" => [
            "cluster" => "Science, Technology, Engineering & Mathematics",
            "education" => "Master's or Ph.D. in Computer Science, Statistics, or related field",
            "salary" => "$120,000 - $165,000",
            "growth" => "36% (Much faster than average)",
            "description" => "Analyzes and interprets complex digital data, such as the usage statistics of a website, to help businesses make better decisions."
        ],
        "Environmental Scientist" => [
            "cluster" => "Science, Technology, Engineering & Mathematics",
            "education" => "Bachelor's degree in Environmental Science or related field",
            "salary" => "$71,000 - $120,000",
            "growth" => "8% (As fast as average)",
            "description" => "Studies the environment and investigates sources of pollution and contamination, working to protect human health and the environment."
        ],
        "Biomedical Engineer" => [
            "cluster" => "Science, Technology, Engineering & Mathematics",
            "education" => "Bachelor's degree in Biomedical Engineering",
            "salary" => "$92,000 - $144,000",
            "growth" => "5% (As fast as average)",
            "description" => "Combines engineering principles with medical sciences to design and create equipment, devices, and software used in healthcare."
        ],
        "High School Teacher" => [
            "cluster" => "Education & Training",
            "education" => "Bachelor's degree in Education or subject area",
            "salary" => "$60,000 - $100,000",
            "growth" => "8% (As fast as average)",
            "description" => "Teaches academic lessons and skills to high school students in public or private schools, preparing them for college or the workforce."
        ],
        "Elementary School Teacher" => [
            "cluster" => "Education & Training",
            "education" => "Bachelor's degree in Elementary Education",
            "salary" => "$58,000 - $95,000",
            "growth" => "7% (As fast as average)",
            "description" => "Instructs young students in basic subjects, such as math and reading, to establish a solid educational foundation."
        ],
        "Special Education Teacher" => [
            "cluster" => "Education & Training",
            "education" => "Bachelor's degree in Special Education",
            "salary" => "$61,000 - $98,000",
            "growth" => "8% (As fast as average)",
            "description" => "Works with students who have a wide range of learning, mental, emotional, and physical disabilities, adapting general education lessons to meet their needs."
        ],
        "College Professor" => [
            "cluster" => "Education & Training",
            "education" => "Doctoral degree in field of expertise",
            "salary" => "$80,000 - $170,000",
            "growth" => "12% (Faster than average)",
            "description" => "Teaches courses in their field of expertise at colleges and universities, and conducts research to advance knowledge in their field."
        ],
        "Graphic Designer" => [
            "cluster" => "Arts, Audio/Visual Technology & Communications",
            "education" => "Bachelor's degree in Graphic Design or related field",
            "salary" => "$53,000 - $93,000",
            "growth" => "3% (Slower than average)",
            "description" => "Creates visual concepts, using computer software or by hand, to communicate ideas that inspire, inform, and captivate consumers."
        ],
        "Journalist" => [
            "cluster" => "Arts, Audio/Visual Technology & Communications",
            "education" => "Bachelor's degree in Journalism or Communications",
            "salary" => "$47,000 - $85,000",
            "growth" => "-4% (Decline)",
            "description" => "Informs the public about news and events, researching topics, conducting interviews, and writing articles or creating multimedia content."
        ],
        "Film and Video Editor" => [
            "cluster" => "Arts, Audio/Visual Technology & Communications",
            "education" => "Bachelor's degree in Film or Media Production",
            "salary" => "$62,000 - $110,000",
            "growth" => "22% (Much faster than average)",
            "description" => "Arranges footage shot by camera operators into a cohesive final product, selecting shots and combining them to form a story or narrative."
        ],
        "Public Relations Specialist" => [
            "cluster" => "Arts, Audio/Visual Technology & Communications",
            "education" => "Bachelor's degree in Public Relations, Communications, or related field",
            "salary" => "$62,000 - $115,000",
            "growth" => "8% (As fast as average)",
            "description" => "Creates and maintains a favorable public image for the organization they represent, building relationships with the media and crafting press releases."
        ],
        "Marketing Manager" => [
            "cluster" => "Business, Management & Administration",
            "education" => "Bachelor's degree in Marketing, Business Administration, or related field",
            "salary" => "$95,000 - $150,000",
            "growth" => "10% (Faster than average)",
            "description" => "Plans, directs, and coordinates marketing policies and programs, determining the demand for products and services and identifying potential customers."
        ],
        "Human Resources Manager" => [
            "cluster" => "Business, Management & Administration",
            "education" => "Bachelor's degree in Human Resources or Business Administration",
            "salary" => "$88,000 - $135,000",
            "growth" => "9% (As fast as average)",
            "description" => "Plans, directs, and coordinates the administrative functions of an organization, overseeing the recruiting, interviewing, and hiring of new staff."
        ],
        "Operations Manager" => [
            "cluster" => "Business, Management & Administration",
            "education" => "Bachelor's degree in Business Administration or related field",
            "salary" => "$85,000 - $140,000",
            "growth" => "8% (As fast as average)",
            "description" => "Directs the operations of organizations in both the public and private sectors, formulating policies and managing daily operations."
        ],
        "Management Analyst" => [
            "cluster" => "Business, Management & Administration",
            "education" => "Bachelor's degree in Business Administration or related field",
            "salary" => "$85,000 - $135,000",
            "growth" => "11% (Faster than average)",
            "description" => "Proposes ways to improve an organization's efficiency, advising managers on how to make their organizations more profitable through reduced costs and increased revenues."
        ],
        "Social Worker" => [
            "cluster" => "Human Services",
            "education" => "Bachelor's or Master's degree in Social Work",
            "salary" => "$50,000 - $85,000",
            "growth" => "12% (Faster than average)",
            "description" => "Helps people solve and cope with problems in their everyday lives, connecting clients with resources in the community."
        ],
        "Psychologist" => [
            "cluster" => "Human Services",
            "education" => "Doctoral degree in Psychology",
            "salary" => "$80,000 - $132,000",
            "growth" => "8% (As fast as average)",
            "description" => "Studies cognitive, emotional, and social processes and behavior by observing, interpreting, and recording how individuals relate to one another and to their environments."
        ],
        "Marriage and Family Therapist" => [
            "cluster" => "Human Services",
            "education" => "Master's degree in Marriage and Family Therapy or related field",
            "salary" => "$51,000 - $87,000",
            "growth" => "16% (Much faster than average)",
            "description" => "Helps people manage and overcome problems with family and other relationships, using a variety of therapeutic techniques."
        ],
        "Substance Abuse Counselor" => [
            "cluster" => "Human Services",
            "education" => "Bachelor's degree in Counseling or Psychology",
            "salary" => "$46,000 - $76,000",
            "growth" => "23% (Much faster than average)",
            "description" => "Advises people who suffer from alcoholism, drug addiction, eating disorders, or other behavioral problems, helping them develop skills and behaviors to recover."
        ]
    ];
    
    if ($careerCluster) {
        $filtered = [];
        foreach ($careers as $career => $data) {
            if ($data["cluster"] === $careerCluster) {
                $filtered[$career] = $data;
            }
        }
        return $filtered;
    }
    
    return $careers;
}

// Function to log user activity (would be implemented in a real system)
function logUserActivity($userId, $activity) {
    // In a real implementation, this would log to the database
    // For this demo, we'll just print to the console
    error_log("User $userId performed activity: $activity");
    return true;
}
?>

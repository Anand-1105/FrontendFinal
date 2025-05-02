<?php
include 'includes/header.php';
include 'includes/navigation.php';
include 'includes/test-results-alert.php';
?>

<div class="bg-white dark:bg-gray-800 min-h-screen py-12 pb-24 pt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Cluster Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                <?php echo isset($_GET['cluster']) ? htmlspecialchars(urldecode($_GET['cluster'])) : 'Career Paths'; ?>
            </h1>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-300 sm:mt-4">
                Explore various career opportunities in this field and their requirements
            </p>
        </div>

        <!-- Career Grid -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 mb-16">
            <?php
            // Career data array based on clusters
            $careers = [
                'Science, Technology, Engineering & Mathematics' => [
                    ['title' => 'Biomedical Engineer', 'demand' => 'High Demand', 'skills' => ['Medical Device Design', 'Biology', 'Engineering Principles'], 'growth' => '6%', 'salary' => '$92,620', 'education' => 'Bachelor\'s degree in Biomedical Engineering'],
                    ['title' => 'Environmental Scientist', 'demand' => 'Growing', 'skills' => ['Environmental Analysis', 'Research', 'Data Collection'], 'growth' => '8%', 'salary' => '$73,230', 'education' => 'Bachelor\'s degree in Environmental Science'],
                    ['title' => 'Aerospace Engineer', 'demand' => 'High Demand', 'skills' => ['Aircraft Design', 'Aerodynamics', 'CAD Software'], 'growth' => '7%', 'salary' => '$118,610', 'education' => 'Bachelor\'s degree in Aerospace Engineering'],
                    ['title' => 'Chemical Engineer', 'demand' => 'Stable', 'skills' => ['Process Design', 'Chemistry', 'Quality Control'], 'growth' => '4%', 'salary' => '$108,540', 'education' => 'Bachelor\'s degree in Chemical Engineering'],
                    ['title' => 'Statistician', 'demand' => 'High Demand', 'skills' => ['Statistical Analysis', 'Data Modeling', 'Programming'], 'growth' => '33%', 'salary' => '$92,270', 'education' => 'Master\'s degree in Statistics'],
                    ['title' => 'Materials Scientist', 'demand' => 'Growing', 'skills' => ['Material Analysis', 'Lab Testing', 'Research'], 'growth' => '6%', 'salary' => '$99,460', 'education' => 'Bachelor\'s degree in Materials Science'],
                    ['title' => 'Robotics Engineer', 'demand' => 'High Demand', 'skills' => ['Robotics Programming', 'Mechanical Design', 'AI'], 'growth' => '9%', 'salary' => '$103,220', 'education' => 'Bachelor\'s degree in Robotics Engineering'],
                    ['title' => 'Quantum Computing Researcher', 'demand' => 'Emerging', 'skills' => ['Quantum Mechanics', 'Programming', 'Mathematics'], 'growth' => '15%', 'salary' => '$125,000', 'education' => 'Ph.D. in Physics or Computer Science'],
                    ['title' => 'Nanotechnology Engineer', 'demand' => 'Growing', 'skills' => ['Nanomaterials', 'Microscopy', 'Research'], 'growth' => '8%', 'salary' => '$98,890', 'education' => 'Master\'s degree in Nanotechnology'],
                    ['title' => 'Biochemist', 'demand' => 'Stable', 'skills' => ['Biochemistry', 'Lab Techniques', 'Research'], 'growth' => '5%', 'salary' => '$94,270', 'education' => 'Ph.D. in Biochemistry'],
                    ['title' => 'Data Scientist', 'demand' => 'High Demand', 'skills' => ['Machine Learning', 'Statistics', 'Programming'], 'growth' => '36%', 'salary' => '$100,910', 'education' => 'Master\'s degree in Data Science'],
                    ['title' => 'Civil Engineer', 'demand' => 'Growing', 'skills' => ['Structural Design', 'AutoCAD', 'Project Management'], 'growth' => '7%', 'salary' => '$88,050', 'education' => 'Bachelor\'s degree in Civil Engineering'],
                    ['title' => 'Research Scientist', 'demand' => 'Stable', 'skills' => ['Research Methods', 'Data Analysis', 'Technical Writing'], 'growth' => '8%', 'salary' => '$85,830', 'education' => 'Ph.D. in Related Field'],
                    ['title' => 'Mechanical Engineer', 'demand' => 'High Demand', 'skills' => ['Mechanical Design', 'Thermodynamics', 'CAD'], 'growth' => '7%', 'salary' => '$90,160', 'education' => 'Bachelor\'s degree in Mechanical Engineering'],
                    ['title' => 'Nuclear Engineer', 'demand' => 'Stable', 'skills' => ['Nuclear Systems', 'Safety Protocols', 'Physics'], 'growth' => '4%', 'salary' => '$116,140', 'education' => 'Bachelor\'s degree in Nuclear Engineering']
                ],
                'Business, Management & Administration' => [
                    ['title' => 'Business Operations Manager', 'demand' => 'High Demand', 'skills' => ['Leadership', 'Strategic Planning', 'Project Management'], 'growth' => '9%', 'salary' => '$103,650', 'education' => 'Bachelor\'s degree in Business Administration'],
                    ['title' => 'Human Resources Manager', 'demand' => 'Stable', 'skills' => ['Employee Relations', 'Recruitment', 'Policy Development'], 'growth' => '7%', 'salary' => '$121,220', 'education' => 'Bachelor\'s degree in HR Management'],
                    ['title' => 'Management Consultant', 'demand' => 'High Demand', 'skills' => ['Business Analysis', 'Problem Solving', 'Communication'], 'growth' => '11%', 'salary' => '$87,660', 'education' => 'Bachelor\'s degree in Business or related field'],
                    ['title' => 'Supply Chain Manager', 'demand' => 'Growing', 'skills' => ['Logistics', 'Inventory Management', 'Procurement'], 'growth' => '30%', 'salary' => '$75,410', 'education' => 'Bachelor\'s degree in Supply Chain Management'],
                    ['title' => 'Project Manager', 'demand' => 'High Demand', 'skills' => ['Project Planning', 'Team Leadership', 'Risk Management'], 'growth' => '8%', 'salary' => '$116,000', 'education' => 'Bachelor\'s degree + PMP Certification'],
                    ['title' => 'Quality Manager', 'demand' => 'Stable', 'skills' => ['Quality Control', 'Process Improvement', 'Compliance'], 'growth' => '5%', 'salary' => '$89,190', 'education' => 'Bachelor\'s degree in Business or related field'],
                    ['title' => 'Administrative Services Manager', 'demand' => 'Growing', 'skills' => ['Office Management', 'Budget Planning', 'Staff Supervision'], 'growth' => '6%', 'salary' => '$98,890', 'education' => 'Bachelor\'s degree in Business Administration'],
                    ['title' => 'Business Intelligence Analyst', 'demand' => 'High Demand', 'skills' => ['Data Analysis', 'Business Strategy', 'Reporting'], 'growth' => '14%', 'salary' => '$93,000', 'education' => 'Bachelor\'s degree in Business Analytics'],
                    ['title' => 'Change Management Director', 'demand' => 'Growing', 'skills' => ['Change Management', 'Leadership', 'Strategic Planning'], 'growth' => '9%', 'salary' => '$120,000', 'education' => 'Master\'s degree in Business Administration'],
                    ['title' => 'Corporate Trainer', 'demand' => 'Stable', 'skills' => ['Training Development', 'Public Speaking', 'Adult Education'], 'growth' => '7%', 'salary' => '$62,700', 'education' => 'Bachelor\'s degree in Training and Development'],
                    ['title' => 'Operations Research Analyst', 'demand' => 'High Demand', 'skills' => ['Data Analysis', 'Problem Solving', 'Mathematical Modeling'], 'growth' => '25%', 'salary' => '$86,200', 'education' => 'Bachelor\'s degree in Operations Research'],
                    ['title' => 'Risk Manager', 'demand' => 'Growing', 'skills' => ['Risk Assessment', 'Financial Analysis', 'Compliance'], 'growth' => '15%', 'salary' => '$124,100', 'education' => 'Bachelor\'s degree in Risk Management'],
                    ['title' => 'Business Development Manager', 'demand' => 'High Demand', 'skills' => ['Sales Strategy', 'Relationship Building', 'Market Analysis'], 'growth' => '8%', 'salary' => '$112,800', 'education' => 'Bachelor\'s degree in Business'],
                    ['title' => 'Procurement Manager', 'demand' => 'Stable', 'skills' => ['Negotiation', 'Vendor Management', 'Contract Management'], 'growth' => '6%', 'salary' => '$121,110', 'education' => 'Bachelor\'s degree in Supply Chain Management'],
                    ['title' => 'Facilities Manager', 'demand' => 'Growing', 'skills' => ['Facility Operations', 'Budget Management', 'Vendor Relations'], 'growth' => '9%', 'salary' => '$98,890', 'education' => 'Bachelor\'s degree in Facility Management']
                ],
                'Arts, Audio/Visual Technology & Communications' => [
                    ['title' => 'Graphic Designer', 'demand' => 'Competitive', 'skills' => ['Adobe Creative Suite', 'Typography', 'Visual Design'], 'growth' => '3%', 'salary' => '$53,380', 'education' => 'Bachelor\'s degree in Graphic Design'],
                    ['title' => 'Film Producer', 'demand' => 'Growing', 'skills' => ['Project Management', 'Creative Direction', 'Budgeting'], 'growth' => '10%', 'salary' => '$76,400', 'education' => 'Bachelor\'s degree in Film Production'],
                    ['title' => 'UX/UI Designer', 'demand' => 'High Demand', 'skills' => ['User Research', 'Wireframing', 'Prototyping'], 'growth' => '13%', 'salary' => '$85,900', 'education' => 'Bachelor\'s degree in Design'],
                    ['title' => 'Video Game Designer', 'demand' => 'Growing', 'skills' => ['Game Development', '3D Modeling', 'Animation'], 'growth' => '11%', 'salary' => '$66,500', 'education' => 'Bachelor\'s degree in Game Design'],
                    ['title' => 'Broadcast Technician', 'demand' => 'Stable', 'skills' => ['Audio Equipment', 'Broadcasting Software', 'Technical Support'], 'growth' => '3%', 'salary' => '$47,360', 'education' => 'Associate\'s degree in Broadcast Technology'],
                    ['title' => 'Art Director', 'demand' => 'Competitive', 'skills' => ['Creative Direction', 'Team Management', 'Brand Development'], 'growth' => '4%', 'salary' => '$97,270', 'education' => 'Bachelor\'s degree in Art or Design'],
                    ['title' => 'Technical Writer', 'demand' => 'Growing', 'skills' => ['Technical Documentation', 'Content Strategy', 'Research'], 'growth' => '7%', 'salary' => '$74,650', 'education' => 'Bachelor\'s degree in English or Communications'],
                    ['title' => 'Motion Graphics Designer', 'demand' => 'High Demand', 'skills' => ['After Effects', 'Animation', 'Visual Effects'], 'growth' => '14%', 'salary' => '$71,600', 'education' => 'Bachelor\'s degree in Animation'],
                    ['title' => 'Sound Engineer', 'demand' => 'Stable', 'skills' => ['Audio Production', 'Sound Mixing', 'Recording'], 'growth' => '8%', 'salary' => '$55,950', 'education' => 'Bachelor\'s degree in Audio Engineering'],
                    ['title' => 'Photographer', 'demand' => 'Competitive', 'skills' => ['Photography', 'Photo Editing', 'Lighting'], 'growth' => '4%', 'salary' => '$41,280', 'education' => 'Bachelor\'s degree in Photography'],
                    ['title' => 'Web Designer', 'demand' => 'High Demand', 'skills' => ['HTML/CSS', 'Web Design', 'Responsive Design'], 'growth' => '13%', 'salary' => '$77,200', 'education' => 'Bachelor\'s degree in Web Design'],
                    ['title' => 'Multimedia Artist', 'demand' => 'Growing', 'skills' => ['3D Animation', 'Digital Art', 'Creative Software'], 'growth' => '16%', 'salary' => '$77,700', 'education' => 'Bachelor\'s degree in Fine Arts'],
                    ['title' => 'Digital Marketing Manager', 'demand' => 'High Demand', 'skills' => ['Social Media', 'Content Strategy', 'Analytics'], 'growth' => '10%', 'salary' => '$88,590', 'education' => 'Bachelor\'s degree in Marketing'],
                    ['title' => 'Journalist', 'demand' => 'Competitive', 'skills' => ['Writing', 'Research', 'Media Production'], 'growth' => '-5%', 'salary' => '$49,300', 'education' => 'Bachelor\'s degree in Journalism'],
                    ['title' => 'Voice Actor', 'demand' => 'Growing', 'skills' => ['Voice Acting', 'Script Reading', 'Audio Recording'], 'growth' => '7%', 'salary' => '$51,000', 'education' => 'Bachelor\'s degree in Theater Arts']
                ],
                'Health Science' => [
                    ['title' => 'Registered Nurse', 'demand' => 'High Demand', 'skills' => ['Patient Care', 'Medical Knowledge', 'Critical Thinking'], 'growth' => '9%', 'salary' => '$75,330', 'education' => 'Bachelor\'s degree in Nursing'],
                    ['title' => 'Physical Therapist', 'demand' => 'High Demand', 'skills' => ['Rehabilitation', 'Patient Assessment', 'Treatment Planning'], 'growth' => '21%', 'salary' => '$91,010', 'education' => 'Doctoral Degree in Physical Therapy'],
                    ['title' => 'Medical Doctor', 'demand' => 'High Demand', 'skills' => ['Medical Diagnosis', 'Patient Care', 'Clinical Skills'], 'growth' => '7%', 'salary' => '$208,000', 'education' => 'Medical Doctor (MD)'],
                    ['title' => 'Pharmacist', 'demand' => 'Stable', 'skills' => ['Pharmacy Operations', 'Drug Knowledge', 'Patient Consultation'], 'growth' => '2%', 'salary' => '$128,710', 'education' => 'Doctor of Pharmacy'],
                    ['title' => 'Dental Hygienist', 'demand' => 'Growing', 'skills' => ['Dental Care', 'Patient Education', 'Clinical Skills'], 'growth' => '11%', 'salary' => '$77,090', 'education' => 'Associate\'s degree in Dental Hygiene'],
                    ['title' => 'Occupational Therapist', 'demand' => 'High Demand', 'skills' => ['Rehabilitation', 'Treatment Planning', 'Patient Care'], 'growth' => '17%', 'salary' => '$86,280', 'education' => 'Master\'s degree in Occupational Therapy'],
                    ['title' => 'Medical Laboratory Technologist', 'demand' => 'Growing', 'skills' => ['Lab Testing', 'Sample Analysis', 'Quality Control'], 'growth' => '11%', 'salary' => '$54,180', 'education' => 'Bachelor\'s degree in Medical Technology'],
                    ['title' => 'Radiologic Technologist', 'demand' => 'Stable', 'skills' => ['Imaging Technology', 'Patient Care', 'Medical Equipment'], 'growth' => '7%', 'salary' => '$63,120', 'education' => 'Associate\'s degree in Radiologic Technology'],
                    ['title' => 'Nurse Practitioner', 'demand' => 'High Demand', 'skills' => ['Advanced Practice Nursing', 'Diagnosis', 'Treatment'], 'growth' => '45%', 'salary' => '$117,670', 'education' => 'Master\'s degree in Nursing'],
                    ['title' => 'Healthcare Administrator', 'demand' => 'Growing', 'skills' => ['Healthcare Management', 'Policy Implementation', 'Leadership'], 'growth' => '32%', 'salary' => '$104,280', 'education' => 'Master\'s degree in Healthcare Administration'],
                    ['title' => 'Speech-Language Pathologist', 'demand' => 'High Demand', 'skills' => ['Speech Therapy', 'Assessment', 'Treatment Planning'], 'growth' => '29%', 'salary' => '$80,480', 'education' => 'Master\'s degree in Speech-Language Pathology'],
                    ['title' => 'Dietitian', 'demand' => 'Growing', 'skills' => ['Nutrition Planning', 'Patient Education', 'Clinical Assessment'], 'growth' => '8%', 'salary' => '$63,090', 'education' => 'Bachelor\'s degree in Dietetics'],
                    ['title' => 'Medical Research Scientist', 'demand' => 'High Demand', 'skills' => ['Research Methods', 'Data Analysis', 'Lab Techniques'], 'growth' => '6%', 'salary' => '$91,510', 'education' => 'Ph.D. in Life Sciences'],
                    ['title' => 'Emergency Medical Technician', 'demand' => 'High Demand', 'skills' => ['Emergency Care', 'Medical Procedures', 'Patient Transport'], 'growth' => '11%', 'salary' => '$36,650', 'education' => 'EMT Certification'],
                    ['title' => 'Veterinarian', 'demand' => 'Growing', 'skills' => ['Animal Care', 'Surgery', 'Diagnosis'], 'growth' => '17%', 'salary' => '$99,250', 'education' => 'Doctor of Veterinary Medicine']
                ],
                'Information Technology' => [
                    ['title' => 'Software Developer', 'demand' => 'High Demand', 'skills' => ['Programming', 'Problem Solving', 'Database Management'], 'growth' => '22%', 'salary' => '$110,140', 'education' => 'Bachelor\'s degree in Computer Science'],
                    ['title' => 'Cybersecurity Analyst', 'demand' => 'High Demand', 'skills' => ['Network Security', 'Threat Analysis', 'Security Tools'], 'growth' => '35%', 'salary' => '$103,590', 'education' => 'Bachelor\'s degree in Cybersecurity'],
                    ['title' => 'Cloud Solutions Architect', 'demand' => 'High Demand', 'skills' => ['Cloud Platforms', 'System Design', 'Infrastructure'], 'growth' => '5%', 'salary' => '$146,360', 'education' => 'Bachelor\'s degree in Computer Science'],
                    ['title' => 'DevOps Engineer', 'demand' => 'High Demand', 'skills' => ['CI/CD', 'Automation', 'Cloud Technologies'], 'growth' => '22%', 'salary' => '$120,730', 'education' => 'Bachelor\'s degree in Software Engineering'],
                    ['title' => 'Database Administrator', 'demand' => 'Growing', 'skills' => ['Database Management', 'SQL', 'Data Security'], 'growth' => '8%', 'salary' => '$98,860', 'education' => 'Bachelor\'s degree in Computer Science'],
                    ['title' => 'Network Engineer', 'demand' => 'Stable', 'skills' => ['Network Infrastructure', 'Security', 'Troubleshooting'], 'growth' => '5%', 'salary' => '$83,510', 'education' => 'Bachelor\'s degree in Network Engineering'],
                    ['title' => 'AI/ML Engineer', 'demand' => 'High Demand', 'skills' => ['Machine Learning', 'Python', 'Deep Learning'], 'growth' => '32%', 'salary' => '$146,085', 'education' => 'Master\'s degree in Computer Science'],
                    ['title' => 'Mobile App Developer', 'demand' => 'High Demand', 'skills' => ['Mobile Development', 'UI/UX Design', 'App Security'], 'growth' => '22%', 'salary' => '$105,310', 'education' => 'Bachelor\'s degree in Computer Science'],
                    ['title' => 'IT Project Manager', 'demand' => 'Growing', 'skills' => ['Project Management', 'Team Leadership', 'Technical Planning'], 'growth' => '11%', 'salary' => '$151,150', 'education' => 'Bachelor\'s degree in IT Management'],
                    ['title' => 'Systems Analyst', 'demand' => 'Stable', 'skills' => ['Systems Analysis', 'Problem Solving', 'Technical Documentation'], 'growth' => '7%', 'salary' => '$93,730', 'education' => 'Bachelor\'s degree in Information Systems'],
                    ['title' => 'Data Engineer', 'demand' => 'High Demand', 'skills' => ['Data Pipeline', 'ETL', 'Big Data'], 'growth' => '21%', 'salary' => '$116,830', 'education' => 'Bachelor\'s degree in Computer Science'],
                    ['title' => 'Quality Assurance Engineer', 'demand' => 'Growing', 'skills' => ['Testing', 'Automation', 'Bug Tracking'], 'growth' => '22%', 'salary' => '$90,270', 'education' => 'Bachelor\'s degree in Computer Science'],
                    ['title' => 'Blockchain Developer', 'demand' => 'Emerging', 'skills' => ['Blockchain', 'Smart Contracts', 'Cryptography'], 'growth' => '32%', 'salary' => '$154,550', 'education' => 'Bachelor\'s degree in Computer Science'],
                    ['title' => 'IT Support Specialist', 'demand' => 'Stable', 'skills' => ['Technical Support', 'Problem Solving', 'Customer Service'], 'growth' => '8%', 'salary' => '$55,510', 'education' => 'Associate\'s degree in IT'],
                    ['title' => 'UX Engineer', 'demand' => 'Growing', 'skills' => ['Frontend Development', 'UI/UX Design', 'User Research'], 'growth' => '13%', 'salary' => '$120,000', 'education' => 'Bachelor\'s degree in Computer Science']
                ],
                'Education & Training' => [
                    ['title' => 'High School Teacher', 'demand' => 'Stable', 'skills' => ['Subject Expertise', 'Classroom Management', 'Curriculum Development'], 'growth' => '4%', 'salary' => '$62,870', 'education' => 'Bachelor\'s degree in Education'],
                    ['title' => 'Educational Administrator', 'demand' => 'Growing', 'skills' => ['Educational Leadership', 'Policy Implementation', 'Staff Management'], 'growth' => '4%', 'salary' => '$98,490', 'education' => 'Master\'s degree in Educational Leadership'],
                    ['title' => 'College Professor', 'demand' => 'Stable', 'skills' => ['Research', 'Teaching', 'Subject Expertise'], 'growth' => '9%', 'salary' => '$80,790', 'education' => 'Ph.D. in Subject Area'],
                    ['title' => 'Special Education Teacher', 'demand' => 'High Demand', 'skills' => ['Adaptive Teaching', 'Individualized Education Plans', 'Behavioral Management'], 'growth' => '3%', 'salary' => '$61,420', 'education' => 'Bachelor\'s degree in Special Education'],
                    ['title' => 'School Counselor', 'demand' => 'Growing', 'skills' => ['Counseling', 'Student Assessment', 'Career Guidance'], 'growth' => '8%', 'salary' => '$58,120', 'education' => 'Master\'s degree in School Counseling'],
                    ['title' => 'Instructional Designer', 'demand' => 'High Demand', 'skills' => ['Curriculum Development', 'E-Learning', 'Educational Technology'], 'growth' => '6%', 'salary' => '$66,970', 'education' => 'Master\'s degree in Instructional Design'],
                    ['title' => 'Elementary School Teacher', 'demand' => 'Stable', 'skills' => ['Child Development', 'Lesson Planning', 'Classroom Management'], 'growth' => '4%', 'salary' => '$60,940', 'education' => 'Bachelor\'s degree in Elementary Education'],
                    ['title' => 'Corporate Trainer', 'demand' => 'Growing', 'skills' => ['Training Development', 'Public Speaking', 'Needs Assessment'], 'growth' => '9%', 'salary' => '$62,700', 'education' => 'Bachelor\'s degree in Training and Development'],
                    ['title' => 'Educational Technologist', 'demand' => 'High Demand', 'skills' => ['EdTech Tools', 'Digital Learning', 'Technology Integration'], 'growth' => '10%', 'salary' => '$64,450', 'education' => 'Master\'s degree in Educational Technology'],
                    ['title' => 'School Principal', 'demand' => 'Stable', 'skills' => ['Educational Leadership', 'Administration', 'Staff Development'], 'growth' => '4%', 'salary' => '$98,490', 'education' => 'Master\'s degree in Educational Leadership'],
                    ['title' => 'ESL Teacher', 'demand' => 'Growing', 'skills' => ['Language Instruction', 'Cultural Awareness', 'Curriculum Adaptation'], 'growth' => '4%', 'salary' => '$59,720', 'education' => 'Bachelor\'s degree in TESOL'],
                    ['title' => 'Education Policy Analyst', 'demand' => 'Stable', 'skills' => ['Policy Analysis', 'Research', 'Data Interpretation'], 'growth' => '5%', 'salary' => '$63,460', 'education' => 'Master\'s degree in Education Policy'],
                    ['title' => 'Curriculum Developer', 'demand' => 'Growing', 'skills' => ['Curriculum Design', 'Educational Standards', 'Content Creation'], 'growth' => '6%', 'salary' => '$66,970', 'education' => 'Master\'s degree in Curriculum and Instruction'],
                    ['title' => 'School Psychologist', 'demand' => 'High Demand', 'skills' => ['Psychological Assessment', 'Intervention', 'Consultation'], 'growth' => '14%', 'salary' => '$78,200', 'education' => 'Master\'s or Doctoral degree in School Psychology'],
                    ['title' => 'Early Childhood Educator', 'demand' => 'Growing', 'skills' => ['Child Development', 'Curriculum Planning', 'Classroom Management'], 'growth' => '7%', 'salary' => '$31,930', 'education' => 'Associate\'s degree in Early Childhood Education']
                ]
            ];

            // Check if a specific cluster is requested
            // Get the current cluster from URL parameter
            $currentCluster = isset($_GET['cluster']) ? urldecode($_GET['cluster']) : null;
            
            // Check if the cluster exists in our data
            if ($currentCluster && isset($careers[$currentCluster])) {
                $currentCluster = urldecode($_GET['cluster']);
                
                // Display careers for the selected cluster
                foreach ($careers[$currentCluster] as $career) {
                    ?>
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                        <div class="px-6 py-8">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white"><?php echo htmlspecialchars($career['title']); ?></h3>
                                <span class="px-3 py-1 text-sm font-semibold <?php echo $career['demand'] === 'High Demand' ? 'text-green-800 bg-green-100' : 'text-blue-800 bg-blue-100'; ?> rounded-full">
                                    <?php echo htmlspecialchars($career['demand']); ?>
                                </span>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-semibold text-gray-700 dark:text-gray-300">Required Skills</h4>
                                    <ul class="mt-2 text-gray-600 dark:text-gray-400 space-y-1">
                                        <?php foreach ($career['skills'] as $skill) { ?>
                                            <li>• <?php echo htmlspecialchars($skill); ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-700 dark:text-gray-300">Education</h4>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400"><?php echo htmlspecialchars($career['education']); ?></p>
                                </div>
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="font-semibold text-gray-700 dark:text-gray-300">Growth</h4>
                                        <p class="mt-2 text-gray-600 dark:text-gray-400"><?php echo htmlspecialchars($career['growth']); ?></p>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-700 dark:text-gray-300">Avg. Salary</h4>
                                        <p class="mt-2 text-gray-600 dark:text-gray-400"><?php echo htmlspecialchars($career['salary']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                // Display available clusters
                foreach (array_keys($careers) as $cluster) {
                    ?>
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="px-6 py-8">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4"><?php echo htmlspecialchars($cluster); ?></h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-6">Explore career opportunities in <?php echo htmlspecialchars($cluster); ?></p>
                            <a href="?cluster=<?php echo urlencode($cluster); ?>" 
                               class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition duration-150">
                                View Careers →
                            </a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

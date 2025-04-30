
<!-- Featured Careers -->
<?php if (empty($searchTerm) && empty($highlightedCluster) && empty($educationFilter) && empty($growthFilter)): ?>
  <div class="mt-16">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Featured Careers</h2>
    
    <?php
    // Define featured careers with details
    $featuredCareers = [
      [
        "title" => "Data Scientist",
        "cluster" => "Information Technology",
        "education" => "Bachelor's or Master's degree in Computer Science, Statistics, or related field",
        "salary" => "$100,000 - $150,000",
        "growth" => "High (31% growth projected through 2030)",
        "description" => "Data scientists utilize their analytical, statistical, and programming skills to collect, analyze, and interpret large datasets. They develop data-driven solutions to complex business challenges."
      ],
      [
        "title" => "Healthcare Administrator",
        "cluster" => "Health Science",
        "education" => "Bachelor's degree in Healthcare Administration or related field",
        "salary" => "$70,000 - $120,000",
        "growth" => "Medium (32% growth projected through 2030)",
        "description" => "Healthcare administrators plan, direct, and coordinate medical and health services. They may manage an entire facility, a specific clinical area or department, or a medical practice for a group of physicians."
      ],
      [
        "title" => "Renewable Energy Engineer",
        "cluster" => "Science, Technology, Engineering & Mathematics",
        "education" => "Bachelor's degree in Engineering or related field",
        "salary" => "$80,000 - $130,000",
        "growth" => "High (8% growth projected through 2030)",
        "description" => "Renewable Energy Engineers design and develop systems and components that derive energy from renewable or sustainable sources such as solar, wind, and hydropower."
      ]
    ];
    
    foreach ($featuredCareers as $career) {
      echo '<div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">';
      echo '<div class="px-4 py-5 sm:px-6 flex justify-between items-center">';
      echo '<div>';
      echo '<h3 class="text-lg leading-6 font-medium text-gray-900">' . htmlspecialchars($career["title"]) . '</h3>';
      echo '<p class="max-w-2xl text-sm text-gray-500">' . htmlspecialchars($career["cluster"]) . '</p>';
      echo '</div>';
      echo '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">' . htmlspecialchars($career["growth"]) . '</span>';
      echo '</div>';
      
      echo '<div class="border-t border-gray-200">';
      echo '<dl>';
      
      echo '<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">';
      echo '<dt class="text-sm font-medium text-gray-500">Education Required</dt>';
      echo '<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">' . htmlspecialchars($career["education"]) . '</dd>';
      echo '</div>';
      
      echo '<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">';
      echo '<dt class="text-sm font-medium text-gray-500">Average Salary</dt>';
      echo '<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">' . htmlspecialchars($career["salary"]) . '</dd>';
      echo '</div>';
      
      echo '<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">';
      echo '<dt class="text-sm font-medium text-gray-500">Description</dt>';
      echo '<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">' . htmlspecialchars($career["description"]) . '</dd>';
      echo '</div>';
      
      echo '</dl>';
      echo '</div>';
      
      echo '<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">';
      echo '<button onclick="showCareerDetails(\'' . addslashes(htmlspecialchars($career["title"])) . '\', \'' . addslashes(htmlspecialchars($career["cluster"])) . '\')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-primary bg-primary/10 hover:bg-primary/20 focus:outline-none">';
      echo 'Learn More';
      echo '</button>';
      echo '</div>';
      
      echo '</div>';
    }
    ?>
    
    <div class="mt-6 text-center">
      <a href="career-paths.php?search=all" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
        View All Careers
      </a>
    </div>
  </div>
<?php endif; ?>

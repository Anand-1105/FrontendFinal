<?php
// Define the highlighted cluster variable with a default value
$highlightedCluster = $_GET['cluster'] ?? '';

// Only show clusters if no filters/search are applied
if (empty($searchTerm) && empty($highlightedCluster) && empty($educationFilter) && empty($growthFilter)): ?>
  <div>
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Career Clusters</h2>
    <?php
    // Define career clusters with descriptions
    $careerClusters = [
      "Science, Technology, Engineering & Mathematics" => [
        "description" => "Careers that involve planning, managing, and providing scientific research, professional and technical services.",
        "careers" => ["Engineer", "Scientist", "Mathematician", "Researcher"],
        "highlight" => ($highlightedCluster == "Science, Technology, Engineering & Mathematics")
      ],
      "Business, Management & Administration" => [
        "description" => "Careers that involve planning, organizing, directing and evaluating business functions.",
        "careers" => ["Business Manager", "Human Resources Specialist", "Marketing Manager", "Administrative Assistant"],
        "highlight" => ($highlightedCluster == "Business, Management & Administration")
      ],
      "Arts, Audio/Visual Technology & Communications" => [
        "description" => "Careers that involve designing, producing, exhibiting, performing, writing, and publishing multimedia content.",
        "careers" => ["Graphic Designer", "Journalist", "Actor", "Photographer"],
        "highlight" => ($highlightedCluster == "Arts, Audio/Visual Technology & Communications")
      ],
      "Health Science" => [
        "description" => "Careers that involve planning, managing, and providing therapeutic services, diagnostic services, health informatics, support services, and biotechnology research.",
        "careers" => ["Doctor", "Nurse", "Therapist", "Medical Technician"],
        "highlight" => ($highlightedCluster == "Health Science")
      ],
      "Information Technology" => [
        "description" => "Careers that involve designing, developing, supporting and managing hardware, software, multimedia and systems integration services.",
        "careers" => ["Software Developer", "Network Administrator", "Cybersecurity Analyst", "Database Administrator"],
        "highlight" => ($highlightedCluster == "Information Technology")
      ],
      "Education & Training" => [
        "description" => "Careers that involve planning, managing and providing education and training services, and related learning support services.",
        "careers" => ["Teacher", "Principal", "Counselor", "Corporate Trainer"],
        "highlight" => ($highlightedCluster == "Education & Training")
      ],
      "Finance" => [
        "description" => "Careers that involve planning, services for financial and investment planning, banking, insurance, and business financial management.",
        "careers" => ["Accountant", "Financial Advisor", "Banker", "Insurance Agent"],
        "highlight" => ($highlightedCluster == "Finance")
      ],
      "Human Services" => [
        "description" => "Careers that prepare individuals for employment in career pathways related to families and human needs.",
        "careers" => ["Social Worker", "Counselor", "Community Service Manager", "Psychologist"],
        "highlight" => ($highlightedCluster == "Human Services")
      ]
    ];

    echo '<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">';
    foreach ($careerClusters as $cluster => $details) {
      $highlightClass = $details["highlight"] ? "ring-2 ring-primary" : "";
      echo '<div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg ' . $highlightClass . '">';
      echo '<div class="px-4 py-5 sm:p-6">';
      echo '<h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">' . htmlspecialchars($cluster) . '</h3>';
      echo '<div class="mt-2 max-w-xl text-sm text-gray-500 dark:text-gray-400">';
      echo '<p>' . htmlspecialchars($details["description"]) . '</p>';
      echo '</div>';
      echo '<div class="mt-4">';
      echo '<h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Popular Careers:</h4>';
      echo '<ul class="mt-2 list-disc pl-5 text-sm text-gray-500 dark:text-gray-400">';
      foreach ($details["careers"] as $career) {
        echo '<li>' . htmlspecialchars($career) . '</li>';
      }
      echo '</ul>';
      echo '</div>';
      echo '<div class="mt-5">';
      echo '<a href="career-paths.php?cluster=' . urlencode($cluster) . '" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-primary hover:bg-primary/90 focus:outline-none">';
      echo 'Explore this cluster';
      echo '</a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    echo '</div>';
    ?>
  </div>
<?php endif; ?>

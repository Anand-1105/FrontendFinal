<!-- Show search results if search is performed -->
<?php if (!empty($searchTerm) || !empty($educationFilter) || !empty($growthFilter)): ?>
  <div class="mb-12">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
      <?php 
      if (!empty($searchTerm)) {
        echo 'Search Results for "' . htmlspecialchars($searchTerm) . '"';
      } else {
        echo 'Filtered Results';
      }
      
      if (!empty($educationFilter) || !empty($growthFilter)) {
        echo ' <span class="text-lg font-normal text-gray-600 dark:text-gray-400">(';
        $filters = [];
        if (!empty($educationFilter)) $filters[] = 'Education: ' . htmlspecialchars($educationFilter);
        if (!empty($growthFilter)) $filters[] = 'Growth: ' . htmlspecialchars($growthFilter);
        echo implode(', ', $filters);
        echo ')</span>';
      }
      ?>
    </h2>
    
    <?php if (empty($filteredCareers)): ?>
      <div class="bg-yellow-50 dark:bg-yellow-900 border-l-4 border-yellow-400 p-4">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-3">
            <p class="text-sm text-yellow-700 dark:text-yellow-200">
              No careers found matching your criteria. Please try different search terms or filters.
            </p>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($filteredCareers as $career => $data): ?>
          <div class="bg-white dark:bg-gray-800 shadow overflow-hidden rounded-lg hover:shadow-md transition-shadow">
            <div class="px-4 py-5 sm:p-6">
              <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white"><?php echo htmlspecialchars($career); ?></h3>
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-400"><?php echo htmlspecialchars($data['cluster']); ?></p>
              <div class="mt-4 space-y-2 text-sm">
                <p class="dark:text-gray-300"><span class="font-medium">Education:</span> <?php echo htmlspecialchars($data['education']); ?></p>
                <p class="dark:text-gray-300"><span class="font-medium">Salary Range:</span> <?php echo htmlspecialchars($data['salary']); ?></p>
                <p class="dark:text-gray-300"><span class="font-medium">Growth:</span> <?php echo htmlspecialchars($data['growth']); ?></p>
              </div>
              <p class="mt-3 text-sm text-gray-600 dark:text-gray-400"><?php echo htmlspecialchars($data['description']); ?></p>
              <div class="mt-4">
                <button onclick="showCareerDetails('<?php echo addslashes(htmlspecialchars($career)); ?>', '<?php echo addslashes(htmlspecialchars($data['cluster'])); ?>')" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-primary hover:bg-primary/90 focus:outline-none">
                  Learn More
                </button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="mt-6">
        <a href="career-paths.php" class="text-primary hover:text-primary/90 font-medium">
          ← Back to all career clusters
        </a>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>

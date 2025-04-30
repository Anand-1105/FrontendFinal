<!-- Show filtered careers for a specific cluster -->
<?php if (!empty($highlightedCluster) && !empty($clusterCareers)): ?>
  <div class="mb-12">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Careers in <?php echo htmlspecialchars($highlightedCluster); ?></h2>
    
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($clusterCareers as $career => $data): ?>
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden rounded-lg hover:shadow-md transition-shadow">
          <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white"><?php echo htmlspecialchars($career); ?></h3>
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
  </div>
<?php endif; ?>

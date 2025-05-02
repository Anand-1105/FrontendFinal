
<?php if (isset($_SESSION["quiz_results"]) && !empty($_SESSION["quiz_results"]["clusters"])): ?>
<div class="pb-4 bg-white dark:bg-gray-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-blue-50 dark:bg-blue-900/50 border-l-4 border-blue-400 p-4">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm text-blue-700 dark:text-blue-200">
            Based on your aptitude test, these career clusters are recommended for you:
            <?php 
            $clusterLinks = [];
            foreach (array_keys($_SESSION["quiz_results"]["clusters"]) as $cluster) {
              $clusterLinks[] = '<a href="career-paths.php?cluster=' . urlencode($cluster) . '" class="font-medium underline hover:text-blue-500 dark:hover:text-blue-400">' . $cluster . '</a>';
            }
            echo implode(', ', $clusterLinks);
            ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php if (isset($_SESSION["test_results"]) && !empty($_SESSION["test_results"]["recommended_clusters"])): ?>
<div class="pb-4 bg-white dark:bg-gray-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-blue-50 dark:bg-blue-900/50 border-l-4 border-blue-400 p-4">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm text-blue-700 dark:text-blue-200">
            Based on your aptitude test, these career clusters are recommended for you:
            <?php 
            $clusterLinks = [];
            foreach ($_SESSION["test_results"]["recommended_clusters"] as $cluster) {
              $clusterLinks[] = '<a href="career-paths.php?cluster=' . urlencode($cluster) . '" class="font-medium underline hover:text-blue-500 dark:hover:text-blue-400">' . $cluster . '</a>';
            }
            echo implode(', ', $clusterLinks);
            ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

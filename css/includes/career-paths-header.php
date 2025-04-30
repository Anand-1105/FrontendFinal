<!-- Career Paths Header -->
<div class="pt-24 pb-12 bg-white dark:bg-gray-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">Career Paths</h1>
      <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-400 sm:mt-4">
        Explore various career clusters and find detailed information about potential career paths.
      </p>
      <?php if (isset($highlightedCluster) && !empty($highlightedCluster)): ?>
        <div class="mt-4">
          <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
            Viewing: <?php echo htmlspecialchars($highlightedCluster); ?>
          </span>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

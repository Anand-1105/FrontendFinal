<!-- Career Exploration Tools -->
<div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg mb-12">
  <h2 class="text-xl font-bold text-gray-900 dark:text-white">Career Exploration Tools</h2>
  <div class="mt-4 flex flex-col md:flex-row gap-6">
    <div class="flex-1">
      <h3 class="text-lg font-medium text-gray-900 dark:text-white">Search Careers</h3>
      <div class="mt-2">
        <form action="career-paths.php" method="get" class="flex">
          <input
            type="text"
            name="search"
            value="<?php echo isset($searchTerm) ? htmlspecialchars($searchTerm) : ''; ?>"
            class="flex-1 focus:ring-primary focus:border-primary rounded-l-md sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
            placeholder="Enter career title or keyword..."
          />
          <button
            type="submit"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-r-md text-white bg-primary hover:bg-primary/90 focus:outline-none"
          >
            Search
          </button>
        </form>
      </div>
    </div>
    <div class="flex-1">
      <h3 class="text-lg font-medium text-gray-900 dark:text-white">Filter by Education Level</h3>
      <div class="mt-2">
        <form action="career-paths.php" method="get" id="education-form">
          <input type="hidden" name="search" value="<?php echo isset($searchTerm) ? htmlspecialchars($searchTerm) : ''; ?>">
          <?php if (isset($growthFilter) && !empty($growthFilter)): ?>
          <input type="hidden" name="growth" value="<?php echo htmlspecialchars($growthFilter); ?>">
          <?php endif; ?>
          <?php if (isset($highlightedCluster) && !empty($highlightedCluster)): ?>
          <input type="hidden" name="cluster" value="<?php echo htmlspecialchars($highlightedCluster); ?>">
          <?php endif; ?>
          <select name="education" id="education-filter" class="w-full focus:ring-primary focus:border-primary rounded-md sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            <option value="">All Education Levels</option>
            <option value="High School" <?php echo (isset($educationFilter) && $educationFilter === 'High School') ? 'selected' : ''; ?>>High School Diploma</option>
            <option value="Certificate" <?php echo (isset($educationFilter) && $educationFilter === 'Certificate') ? 'selected' : ''; ?>>Certificate/Vocational</option>
            <option value="Associate" <?php echo (isset($educationFilter) && $educationFilter === 'Associate') ? 'selected' : ''; ?>>Associate's Degree</option>
            <option value="Bachelor" <?php echo (isset($educationFilter) && $educationFilter === 'Bachelor') ? 'selected' : ''; ?>>Bachelor's Degree</option>
            <option value="Master" <?php echo (isset($educationFilter) && $educationFilter === 'Master') ? 'selected' : ''; ?>>Master's Degree</option>
            <option value="Doctoral" <?php echo (isset($educationFilter) && $educationFilter === 'Doctoral') ? 'selected' : ''; ?>>Doctoral Degree</option>
          </select>
        </form>
      </div>
    </div>
    <div class="flex-1">
      <h3 class="text-lg font-medium text-gray-900 dark:text-white">Filter by Growth Outlook</h3>
      <div class="mt-2">
        <form action="career-paths.php" method="get" id="growth-form">
          <input type="hidden" name="search" value="<?php echo isset($searchTerm) ? htmlspecialchars($searchTerm) : ''; ?>">
          <?php if (isset($educationFilter) && !empty($educationFilter)): ?>
          <input type="hidden" name="education" value="<?php echo htmlspecialchars($educationFilter); ?>">
          <?php endif; ?>
          <?php if (isset($highlightedCluster) && !empty($highlightedCluster)): ?>
          <input type="hidden" name="cluster" value="<?php echo htmlspecialchars($highlightedCluster); ?>">
          <?php endif; ?>
          <select name="growth" id="growth-filter" class="w-full focus:ring-primary focus:border-primary rounded-md sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            <option value="">All Growth Rates</option>
            <option value="high" <?php echo (isset($growthFilter) && $growthFilter === 'high') ? 'selected' : ''; ?>>High Growth (>15%)</option>
            <option value="medium" <?php echo (isset($growthFilter) && $growthFilter === 'medium') ? 'selected' : ''; ?>>Medium Growth (5-15%)</option>
            <option value="low" <?php echo (isset($growthFilter) && $growthFilter === 'low') ? 'selected' : ''; ?>>Low Growth (<5%)</option>
          </select>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
// Main aptitude test file - refactored into smaller components
include 'includes/header.php';
include 'includes/navigation.php';
include 'includes/page-header.php';
?>

<!-- Aptitude Test Form -->
<div class="pb-16 bg-white dark:bg-gray-800">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <?php include 'includes/error-message.php'; ?>
    <form id="aptitudeForm" method="post" action="process-test.php" class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700">
      <div class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700">
        <?php include 'includes/aptitude-form.php'; ?>
      </div>

      <div class="pt-5">
        <div class="flex justify-end gap-3">
          <button type="button" onclick="resetForm()" class="inline-flex items-center bg-white dark:bg-gray-700 py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            Reset
          </button>
          <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php 
include 'includes/form-validation.php';
include 'includes/footer.php'; 
?>

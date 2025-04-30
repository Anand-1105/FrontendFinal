<!-- Test Introduction -->
<div class="pt-8">
  <div>
    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Instructions</h3>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
      This aptitude test consists of multiple sections designed to assess different aspects of your abilities and interests.
      Please answer each question honestly. There are no right or wrong answers. <span class="text-red-500 font-medium">All fields are required.</span>
    </p>
  </div>

  <?php include 'includes/interest-section.php'; ?>
  <?php include 'includes/skills-section.php'; ?>
  <?php include 'includes/values-section.php'; ?>

  <script>
    // Main script for the aptitude form
    document.addEventListener('DOMContentLoaded', function() {
      console.log('Aptitude form initialized');
    });
  </script>
</div>

<!-- Section 1: Interests -->
<div class="mt-6">
  <h3 class="text-lg font-medium text-gray-900 dark:text-white">Section 1: Interests</h3>
  <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Rate your interest level in the following activities from 1 (Not Interested) to 5 (Very Interested).</p>
  
  <?php
  $interestQuestions = [
    "Building or fixing things with your hands",
    "Analyzing data and solving complex problems",
    "Creating art, music, or writing",
    "Helping and teaching others",
    "Leading groups and making decisions",
    "Organizing and managing information",
    "Investigating scientific phenomena",
    "Designing new products or systems",
    "Persuading others and selling ideas or products",
    "Working with plants, animals, or natural resources"
  ];
  
  foreach ($interestQuestions as $index => $question) {
    echo '<div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 transition-all hover:shadow-md">';
    echo '<label class="block text-sm font-medium text-gray-700 dark:text-gray-300 required-star">' . $question . '</label>';
    echo '<div class="mt-3">';
    
    echo '<div class="relative pt-1">';
    echo '<div class="flex mb-2 items-center justify-between">';
    echo '<div class="text-xs font-semibold text-gray-500 dark:text-gray-400 w-20">Not Interested</div>';
    echo '<div class="text-xs font-semibold text-primary w-20 text-right">Very Interested</div>';
    echo '</div>';
    
    echo '<div class="flex justify-between space-x-2">';
    for ($i = 1; $i <= 5; $i++) {
      echo '<div class="w-1/5">';
      echo '<input type="radio" id="interest_' . $index . '_' . $i . '" name="interest_' . $index . '" value="' . $i . '" class="sr-only peer" required>';
      echo '<label for="interest_' . $index . '_' . $i . '" class="flex flex-col items-center cursor-pointer">';
      echo '<div class="w-12 h-12 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-lg font-medium text-gray-500 dark:text-gray-400 border-2 border-gray-200 dark:border-gray-600 peer-checked:border-blue-500 peer-checked:bg-blue-500 peer-checked:text-white transition-all hover:bg-gray-200 dark:hover:bg-gray-600">' . $i . '</div>';
      echo '</label>';
      echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    
    echo '</div>';
    echo '</div>';
  }
  ?>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const interestRadios = document.querySelectorAll('input[name^="interest_"]');
      
      interestRadios.forEach(radio => {
        radio.addEventListener('change', function() {
          const name = this.name;
          const groupLabels = document.querySelectorAll(`input[name="${name}"] + label .rounded-full`);
          
          groupLabels.forEach(label => {
            label.classList.remove('bg-blue-500', 'border-blue-500', 'text-white');
            label.classList.add('bg-gray-100', 'dark:bg-gray-700', 'border-gray-200', 'dark:border-gray-600', 'text-gray-500', 'dark:text-gray-400');
          });
          
          const selectedLabel = document.querySelector(`input#${this.id} + label .rounded-full`);
          if (selectedLabel) {
            selectedLabel.classList.remove('bg-gray-100', 'dark:bg-gray-700', 'border-gray-200', 'dark:border-gray-600', 'text-gray-500', 'dark:text-gray-400');
            selectedLabel.classList.add('bg-blue-500', 'border-blue-500', 'text-white');
          }
        });
      });
      
      interestRadios.forEach(radio => {
        if (radio.checked) {
          const event = new Event('change');
          radio.dispatchEvent(event);
        }
      });
    });
  </script>
</div>

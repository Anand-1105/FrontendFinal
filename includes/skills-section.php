<!-- Section 2: Skills -->
<div class="mt-8">
  <h3 class="text-lg font-medium text-gray-900 dark:text-white">Section 2: Skills</h3>
  <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Rate your proficiency level in the following skills from 1 (Beginner) to 5 (Expert).</p>
  
  <?php
  $skillQuestions = [
    "Mathematical and logical reasoning",
    "Verbal communication",
    "Written communication",
    "Creative thinking",
    "Problem-solving",
    "Attention to detail",
    "Leadership",
    "Teamwork",
    "Technical/computer skills",
    "Analytical thinking"
  ];
  
  foreach ($skillQuestions as $index => $question) {
    echo '<div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 transition-all hover:shadow-md">';
    echo '<label class="block text-sm font-medium text-gray-700 dark:text-gray-300 required-star">' . $question . '</label>';
    echo '<div class="mt-3">';
    
    echo '<div class="relative pt-1">';
    echo '<div class="flex mb-2 items-center justify-between">';
    echo '<div class="text-xs font-semibold text-gray-500 dark:text-gray-400 w-20">Beginner</div>';
    echo '<div class="text-xs font-semibold text-primary w-20 text-right">Expert</div>';
    echo '</div>';
    
    echo '<div class="flex justify-between space-x-2">';
    for ($i = 1; $i <= 5; $i++) {
      echo '<div class="w-1/5">';
      echo '<input type="radio" id="skill_' . $index . '_' . $i . '" name="skill_' . $index . '" value="' . $i . '" class="sr-only peer" required>';
      echo '<label for="skill_' . $index . '_' . $i . '" class="flex flex-col items-center cursor-pointer">';
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
      const skillRadios = document.querySelectorAll('input[name^="skill_"]');
      
      skillRadios.forEach(radio => {
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
      
      skillRadios.forEach(radio => {
        if (radio.checked) {
          const event = new Event('change');
          radio.dispatchEvent(event);
        }
      });
    });
  </script>
</div>

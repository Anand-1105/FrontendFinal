<!-- Section 3: Work Values -->
<div class="mt-8">
  <h3 class="text-lg font-medium text-gray-900 dark:text-white">Section 3: Work Values</h3>
  <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Rate how important each value is to you from 1 (Not Important) to 5 (Very Important).</p>
  
  <?php
  $valueQuestions = [
    "Achievement and accomplishment",
    "Independence and autonomy",
    "Recognition and status",
    "Relationships and teamwork",
    "Support and mentorship",
    "Working conditions and work-life balance",
    "Salary and benefits",
    "Job security and stability",
    "Creativity and innovation",
    "Helping others and making a difference",
    "Challenge and problem-solving",
    "Advancement and growth opportunities"
  ];
  
  foreach ($valueQuestions as $index => $question) {
    echo '<div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 transition-all hover:shadow-md">';
    echo '<label class="block text-sm font-medium text-gray-700 dark:text-gray-300 required-star">' . $question . '</label>';
    echo '<div class="mt-3">';
    
    echo '<div class="relative pt-1">';
    echo '<div class="flex mb-2 items-center justify-between">';
    echo '<div class="text-xs font-semibold text-gray-500 dark:text-gray-400 w-20">Not Important</div>';
    echo '<div class="text-xs font-semibold text-primary w-20 text-right">Very Important</div>';
    echo '</div>';
    
    echo '<div class="flex justify-between space-x-2">';
    for ($i = 1; $i <= 5; $i++) {
      echo '<div class="w-1/5">';
      echo '<input type="radio" id="value_' . $index . '_' . $i . '" name="value_' . $index . '" value="' . $i . '" class="sr-only peer" required>';
      echo '<label for="value_' . $index . '_' . $i . '" class="flex flex-col items-center cursor-pointer">';
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
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      const valueRadios = document.querySelectorAll('input[name^="value_"]');
      
      valueRadios.forEach(radio => {
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
      
      valueRadios.forEach(radio => {
        if (radio.checked) {
          const event = new Event('change');
          radio.dispatchEvent(event);
        }
      });
    });
</script>

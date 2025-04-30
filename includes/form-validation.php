<script>
// Validate form function
function validateForm() {
    const form = document.getElementById('aptitudeForm');
    let isValid = true;
    
    // Check all required fields
    const requiredInputs = form.querySelectorAll('input[required]');
    requiredInputs.forEach(input => {
        if (!input.value) {
            isValid = false;
        }
    });

    // Validate radio button groups
    const sections = ['interest', 'skill', 'value'];
    sections.forEach(section => {
        const totalQuestions = document.querySelectorAll(`input[name^="${section}_"]`).length / 5;
        for(let i = 0; i < totalQuestions; i++) {
            if (!form.querySelector(`input[name="${section}_${i}"]:checked`)) {
                isValid = false;
            }
        }
    });
    
    return isValid;
}

// Handle form submission
document.getElementById('aptitudeForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const errorElement = document.getElementById('error-message');
    let isValid = validateForm();
    
    if (!isValid) {
        errorElement.textContent = 'Please answer all questions before submitting.';
        errorElement.classList.remove('hidden');
        return false;
    }
    
    try {
        const formData = new FormData(form);
        const response = await fetch('process-test.php', {
            method: 'POST',
            body: formData
        });
        
        if (response.ok) {
            window.location.href = 'career-paths.php';
        } else {
            throw new Error('Form submission failed');
        }
    } catch (error) {
        console.error('Error:', error);
        errorElement.textContent = 'An error occurred. Please try again.';
        errorElement.classList.remove('hidden');
    }
});

// Reset form function
function resetForm() {
    const form = document.getElementById('aptitudeForm');
    form.reset();

    // Reset all radio button styling
    const radioButtons = form.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(radio => {
        const label = document.querySelector(`label[for="${radio.id}"] .rounded-full`);
        if (label) {
            label.classList.remove('bg-blue-500', 'border-blue-500', 'text-white');
            label.classList.add('bg-gray-100', 'dark:bg-gray-700', 'border-gray-200', 'dark:border-gray-600', 'text-gray-500', 'dark:text-gray-400');
        }
    });

    // Reset error message
    const errorElement = document.getElementById('error-message');
    if (errorElement) {
        errorElement.classList.add('hidden');
    }

    // Show reset confirmation
    showToast('Form has been reset', 'info');
    
    // Reset progress bar
    updateProgress();
}

// Limit work values selection to 3
const workValueCheckboxes = document.querySelectorAll('.work-value-checkbox');
const valueSelectionCounter = document.createElement('div');
valueSelectionCounter.className = 'mt-2 text-sm text-gray-600 font-medium';
valueSelectionCounter.id = 'value-counter';
valueSelectionCounter.textContent = 'Selected: 0 of 3';
document.querySelector('.grid').after(valueSelectionCounter);

workValueCheckboxes.forEach(checkbox => {
  checkbox.addEventListener('change', function() {
    const checked = document.querySelectorAll('.work-value-checkbox:checked');
    const counter = document.getElementById('value-counter');
    counter.textContent = `Selected: ${checked.length} of 3`;
    
    if (checked.length > 3) {
      this.checked = false;
      document.getElementById('value-error').classList.remove('hidden');
      counter.textContent = `Selected: ${checked.length - 1} of 3`;
      
      // Show too many selected toast
      showToast('You can only select 3 values', 'warning');
    } else {
      document.getElementById('value-error').classList.add('hidden');
      
      // If exactly 3 are selected, show success toast
      if (checked.length === 3) {
        showToast('Great! You\'ve selected 3 values', 'success');
      }
    }
  });
});

// Progress indicator
const createProgressBar = () => {
  const form = document.getElementById('aptitudeForm');
  const progressContainer = document.createElement('div');
  progressContainer.className = 'sticky top-0 z-10 bg-white/80 backdrop-blur-sm py-2 px-4 border-b border-gray-200';
  progressContainer.innerHTML = `
    <div class="max-w-3xl mx-auto">
      <div class="flex justify-between items-center mb-1">
        <span class="text-sm font-medium text-primary">Your progress</span>
        <span class="text-sm font-medium text-primary" id="progress-text">0%</span>
      </div>
      <div class="w-full bg-gray-200 rounded-full h-2.5">
        <div class="bg-primary h-2.5 rounded-full transition-all duration-300" id="progress-bar" style="width: 0%"></div>
      </div>
    </div>
  `;
  
  form.parentNode.insertBefore(progressContainer, form);
  
  // Initialize progress tracker
  updateProgress();
  
  // Add listeners to all inputs to update progress
  const allInputs = form.querySelectorAll('input[type="radio"], input[type="checkbox"]');
  allInputs.forEach(input => {
    input.addEventListener('change', updateProgress);
  });
};

// Calculate and update progress
const updateProgress = () => {
  const form = document.getElementById('aptitudeForm');
  const totalQuestions = 20; // 10 interest + 10 skill questions
  const workValueRequirement = 3;
  
  // Count answered questions
  const answeredInterests = form.querySelectorAll('input[name^="interest_"]:checked').length;
  const answeredSkills = form.querySelectorAll('input[name^="skill_"]:checked').length;
  const selectedValues = Math.min(form.querySelectorAll('input[name="work_values[]"]:checked').length, workValueRequirement);
  
  const totalAnswered = answeredInterests + answeredSkills + (selectedValues / workValueRequirement);
  const progressPercentage = Math.floor((totalAnswered / (totalQuestions + 1)) * 100);
  
  // Update progress bar
  const progressBar = document.getElementById('progress-bar');
  const progressText = document.getElementById('progress-text');
  
  if (progressBar && progressText) {
    progressBar.style.width = `${progressPercentage}%`;
    progressText.textContent = `${progressPercentage}%`;
  }
  
  // Change progress bar color based on completion
  if (progressPercentage < 33) {
    progressBar.classList.remove('bg-yellow-500', 'bg-green-500');
    progressBar.classList.add('bg-primary');
  } else if (progressPercentage < 66) {
    progressBar.classList.remove('bg-primary', 'bg-green-500');
    progressBar.classList.add('bg-yellow-500');
  } else {
    progressBar.classList.remove('bg-primary', 'bg-yellow-500');
    progressBar.classList.add('bg-green-500');
  }
};

// Create toast notification system
const createToastSystem = () => {
  const toastContainer = document.createElement('div');
  toastContainer.className = 'fixed bottom-4 right-4 z-50 flex flex-col gap-2';
  toastContainer.id = 'toast-container';
  document.body.appendChild(toastContainer);
};

// Show toast notification
const showToast = (message, type = 'info') => {
  const toastContainer = document.getElementById('toast-container');
  if (!toastContainer) {
    createToastSystem();
  }
  
  const toast = document.createElement('div');
  let bgColor, textColor, icon;
  
  switch (type) {
    case 'success':
      bgColor = 'bg-green-100';
      textColor = 'text-green-800';
      icon = '<svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>';
      break;
    case 'warning':
      bgColor = 'bg-yellow-100';
      textColor = 'text-yellow-800';
      icon = '<svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>';
      break;
    default:
      bgColor = 'bg-blue-100';
      textColor = 'text-blue-800';
      icon = '<svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>';
  }
  
  toast.className = `flex items-center p-4 ${bgColor} rounded-lg shadow-sm transform transition-all duration-300 translate-x-full opacity-0`;
  toast.innerHTML = `
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 mr-2">
      ${icon}
    </div>
    <div class="${textColor} text-sm font-medium">${message}</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 ${bgColor} ${textColor} rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 inline-flex h-8 w-8 hover:${bgColor} hover:${textColor}" onclick="this.parentElement.remove()">
      <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  `;
  
  document.getElementById('toast-container').appendChild(toast);
  
  // Animate in
  setTimeout(() => {
    toast.classList.remove('translate-x-full', 'opacity-0');
  }, 10);
  
  // Auto remove after 5 seconds
  setTimeout(() => {
    toast.classList.add('opacity-0', 'translate-x-full');
    setTimeout(() => {
      toast.remove();
    }, 300);
  }, 5000);
};

// Initialize UI enhancements when the DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  createProgressBar();
  createToastSystem();
  
  // Add custom styling to Tailwind
  const style = document.createElement('style');
  style.innerHTML = `
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-5px); }
      50% { transform: translateX(5px); }
      75% { transform: translateX(-5px); }
    }
    .animate-shake {
      animation: shake 0.5s ease-in-out;
    }
  `;
  document.head.appendChild(style);
  
  // Add shadow to form
  const form = document.getElementById('aptitudeForm');
  form.classList.add('bg-white', 'rounded-lg', 'shadow-md', 'p-6');
  
  // Enhance submit and reset buttons
  const submitBtn = form.querySelector('button[type="submit"]');
  const resetBtn = form.querySelector('button[type="button"]');
  
  submitBtn.className = 'ml-3 inline-flex justify-center items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-200';
  submitBtn.innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    Submit
  `;
  
  resetBtn.className = 'bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-200';
  resetBtn.innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
    </svg>
    Reset
  `;
});
</script>

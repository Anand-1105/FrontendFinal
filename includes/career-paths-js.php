<script>
  // Mobile menu toggle
  function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    if (menu) {
      menu.classList.toggle('hidden');
    }
  }
  
  // Show career details modal
  function showCareerDetails(title, cluster, event) {
    if (event) {
      event.preventDefault();
    }
    
    const modalTitle = document.getElementById('modal-title');
    const modalCluster = document.getElementById('modal-cluster');
    const modalContent = document.getElementById('modal-content');
    const modal = document.getElementById('career-modal');
    
    if (modalTitle && modalCluster && modalContent && modal) {
      modalTitle.textContent = title;
      modalCluster.textContent = cluster;
      modalContent.innerHTML = `
        <p class="mb-2 text-gray-900 dark:text-white"><strong>Description:</strong> This career involves using specialized skills to solve problems and create value in the ${cluster} field.</p>
        <p class="mb-2 text-gray-900 dark:text-white"><strong>Required Skills:</strong></p>
        <ul class="list-disc pl-5 mb-2 text-gray-900 dark:text-white">
          <li>Critical thinking and problem-solving</li>
          <li>Communication and collaboration</li>
          <li>Technical expertise in relevant areas</li>
          <li>Adaptability and continuous learning</li>
        </ul>
        <p class="mb-2 text-gray-900 dark:text-white"><strong>Work Environment:</strong> Typically in office settings, laboratories, or specialized facilities depending on the specific role.</p>
        <p class="text-gray-900 dark:text-white"><strong>Career Path:</strong> Entry-level positions often lead to senior roles, management opportunities, or specialized expert positions after gaining experience.</p>
        <div class="mt-4 p-3 bg-blue-50 dark:bg-blue-900 rounded-md">
          <p class="text-sm text-blue-800 dark:text-blue-200"><strong>Pro Tip:</strong> Consider pursuing internships or volunteer opportunities in this field to gain valuable experience and make industry connections.</p>
        </div>
      `;
      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }
  }
  
  // Close modal
  function closeModal() {
    const modal = document.getElementById('career-modal');
    if (modal) {
      modal.classList.add('hidden');
      document.body.style.overflow = 'auto';
    }
  }
  
  // Set up event listeners after the DOM is fully loaded
  document.addEventListener('DOMContentLoaded', function() {
    // Close modal if clicking outside
    const modal = document.getElementById('career-modal');
    if (modal) {
      modal.addEventListener('click', function(e) {
        if (e.target === this) {
          closeModal();
        }
      });
    }
    
    // Close modal on button click
    const closeButton = document.getElementById('close-modal-btn');
    if (closeButton) {
      closeButton.addEventListener('click', closeModal);
    }
    
    // Close modal on escape key press
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
        closeModal();
      }
    });
    
    // Set up career link event listeners
    const careerLinks = document.querySelectorAll('.career-link');
    careerLinks.forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const title = this.getAttribute('data-title');
        const cluster = this.getAttribute('data-cluster');
        showCareerDetails(title, cluster, e);
      });
    });
    
    // Add event listeners for education and growth filters
    const educationFilter = document.getElementById('education-filter');
    const growthFilter = document.getElementById('growth-filter');
    
    if (educationFilter) {
      educationFilter.addEventListener('change', function(e) {
        document.getElementById('education-form').submit();
      });
    }
    
    if (growthFilter) {
      growthFilter.addEventListener('change', function(e) {
        document.getElementById('growth-form').submit();
      });
    }
  });
</script>

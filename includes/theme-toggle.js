
// On page load, check for theme preference
document.addEventListener('DOMContentLoaded', function() {
  initializeThemeToggle();
  
  // Also add a mutation observer to catch dynamically added theme toggles
  const bodyObserver = new MutationObserver(function(mutations) {
    // Check if our toggle buttons might have been added
    const toggleExists = document.getElementById('theme-toggle') || 
                         document.getElementById('mobile-theme-toggle');
    
    if (toggleExists) {
      initializeThemeToggle();
    }
  });
  
  // Start observing the body for added nodes
  bodyObserver.observe(document.body, { childList: true, subtree: true });
});

function initializeThemeToggle() {
  const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
  const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
  const themeToggleBtn = document.getElementById('theme-toggle');
  
  // Mobile versions
  const mobileThemeToggleDarkIcon = document.getElementById('mobile-theme-toggle-dark-icon');
  const mobileThemeToggleLightIcon = document.getElementById('mobile-theme-toggle-light-icon');
  const mobileThemeToggleBtn = document.getElementById('mobile-theme-toggle');
  
  // Set the initial theme based on localStorage or system preference
  function setInitialTheme() {
    if (localStorage.getItem('color-theme') === 'dark' || 
        (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
      
      // Update icons if they exist
      if (themeToggleLightIcon) themeToggleLightIcon.classList.remove('hidden');
      if (themeToggleDarkIcon) themeToggleDarkIcon.classList.add('hidden');
      if (mobileThemeToggleLightIcon) mobileThemeToggleLightIcon.classList.remove('hidden');
      if (mobileThemeToggleDarkIcon) mobileThemeToggleDarkIcon.classList.add('hidden');
    } else {
      document.documentElement.classList.remove('dark');
      
      // Update icons if they exist
      if (themeToggleDarkIcon) themeToggleDarkIcon.classList.remove('hidden');
      if (themeToggleLightIcon) themeToggleLightIcon.classList.add('hidden');
      if (mobileThemeToggleDarkIcon) mobileThemeToggleDarkIcon.classList.remove('hidden');
      if (mobileThemeToggleLightIcon) mobileThemeToggleLightIcon.classList.add('hidden');
    }
  }
  
  // Set initial state
  setInitialTheme();
  
  // Toggle theme function
  function toggleTheme() {
    // Toggle icons if they exist
    if (themeToggleDarkIcon) themeToggleDarkIcon.classList.toggle('hidden');
    if (themeToggleLightIcon) themeToggleLightIcon.classList.toggle('hidden');
    if (mobileThemeToggleDarkIcon) mobileThemeToggleDarkIcon.classList.toggle('hidden');
    if (mobileThemeToggleLightIcon) mobileThemeToggleLightIcon.classList.toggle('hidden');
    
    // If is already dark, set to light mode
    if (document.documentElement.classList.contains('dark')) {
      document.documentElement.classList.remove('dark');
      localStorage.setItem('color-theme', 'light');
    } else {
      document.documentElement.classList.add('dark');
      localStorage.setItem('color-theme', 'dark');
    }
  }
  
  // Add click event listeners to buttons if they exist
  if (themeToggleBtn) {
    themeToggleBtn.addEventListener('click', toggleTheme);
  }
  
  if (mobileThemeToggleBtn) {
    mobileThemeToggleBtn.addEventListener('click', toggleTheme);
  }
}

// Fake authentication handler
function handleFakeSignIn(event) {
    event.preventDefault();
    
    // Set fake session
    localStorage.setItem('isLoggedIn', 'true');
    localStorage.setItem('userName', 'Demo User');
    
    // Update UI
    updateAuthUI();
    
    // Redirect to home page
    window.location.href = 'index.php';
}

// Update UI based on auth state
function updateAuthUI() {
    const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
    const userName = localStorage.getItem('userName');
    
    // Get all auth-related elements
    const signInButtons = document.querySelectorAll('.sign-in-btn');
    const userMenus = document.querySelectorAll('.user-menu');
    const userNames = document.querySelectorAll('.user-name');
    
    if (isLoggedIn) {
        // Hide sign-in buttons
        signInButtons.forEach(btn => btn.classList.add('hidden'));
        
        // Show user menu
        userMenus.forEach(menu => menu.classList.remove('hidden'));
        
        // Update username display
        userNames.forEach(name => name.textContent = userName);
    } else {
        // Show sign-in buttons
        signInButtons.forEach(btn => btn.classList.remove('hidden'));
        
        // Hide user menu
        userMenus.forEach(menu => menu.classList.add('hidden'));
    }
}

// Handle sign out
function handleSignOut() {
    localStorage.removeItem('isLoggedIn');
    localStorage.removeItem('userName');
    updateAuthUI();
    window.location.href = 'index.php';
}

// Initialize auth state on page load
document.addEventListener('DOMContentLoaded', updateAuthUI);
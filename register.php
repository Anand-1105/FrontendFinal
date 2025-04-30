<?php include 'includes/header.php'; ?>
<?php include 'includes/navigation.php'; ?>

<div class="min-h-screen pt-24 pb-12 flex flex-col items-center">
  <div class="w-full max-w-md p-8 space-y-8 bg-white dark:bg-gray-800 rounded-lg shadow-md transition-all duration-300">
    <div class="text-center">
      <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">Create Account</h1>
      <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Start your career journey today</p>
    </div>

    <form id="register-form" class="mt-8 space-y-6">
      <div id="form-message" class="hidden p-4 mb-4 text-sm rounded-lg"></div>
      
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
        <div class="mt-1">
          <input id="username" name="username" type="text" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-primary focus:border-primary text-base" placeholder="Choose a username">
        </div>
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email address</label>
        <div class="mt-1">
          <input id="email" name="email" type="email" autocomplete="email" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-primary focus:border-primary text-base" placeholder="Enter your email">
        </div>
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
        <div class="mt-1">
          <input id="password" name="password" type="password" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-primary focus:border-primary text-base" placeholder="Create a password">
        </div>
      </div>

      <div>
        <label for="confirm-password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
        <div class="mt-1">
          <input id="confirm-password" name="confirm-password" type="password" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-primary focus:border-primary text-base" placeholder="Confirm your password">
        </div>
      </div>

      <div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Create Account</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500 dark:text-gray-400">
      Already have an account?
      <a href="sign-in.php" class="font-medium text-primary hover:text-primary/80">Sign in</a>
    </p>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('register-form');
    const formMessage = document.getElementById('form-message');
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;
        
        // Basic validation
        if (!username || !email || !password || !confirmPassword) {
            showMessage('Please fill in all fields', 'error');
            return;
        }
        
        if (password !== confirmPassword) {
            showMessage('Passwords do not match', 'error');
            return;
        }
        
        try {
            const response = await fetch('auth/auth-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'register',
                    username: username,
                    email: email,
                    password: password
                })
            });
            
            const data = await response.json();
            
            if (data.success) {
                showMessage(data.message, 'success');
                // Redirect to verification page if email verification is needed
                setTimeout(() => {
                    window.location.href = `verify-email.php?email=${encodeURIComponent(email)}`;
                }, 1500);
            } else {
                showMessage(data.message, 'error');
            }
        } catch (error) {
            showMessage('An error occurred. Please try again.', 'error');
        }
    });
    
    function showMessage(message, type) {
        formMessage.textContent = message;
        formMessage.classList.remove('hidden', 'bg-red-100', 'text-red-700', 'bg-green-100', 'text-green-700');
        
        if (type === 'error') {
            formMessage.classList.add('bg-red-100', 'text-red-700');
        } else {
            formMessage.classList.add('bg-green-100', 'text-green-700');
        }
        
        formMessage.classList.remove('hidden');
    }
});
</script>

<?php include 'includes/footer.php'; ?>
    <script src="js/fake-auth.js"></script>
</body>
</html>
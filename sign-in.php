<?php include 'includes/header.php'; ?>
<?php include 'includes/navigation.php'; ?>

<div class="min-h-screen pt-24 pb-12 flex flex-col items-center">
  <div class="w-full max-w-md p-8 space-y-8 bg-white dark:bg-gray-800 rounded-lg shadow-md transition-all duration-300">
    <div class="text-center">
      <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">Sign In</h1>
      <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Sign in to your account to access your career profiles</p>
    </div>

    <!-- Add this to your sign-in form -->
    <form id="signInForm" onsubmit="handleFakeSignIn(event)" class="space-y-6">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email address</label>
            <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm dark:bg-gray-700 dark:border-gray-600">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>
            <input type="password" name="password" id="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm dark:bg-gray-700 dark:border-gray-600">
        </div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
            Sign in
        </button>
    </form>

    <div class="mt-6">
      <div class="relative">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
        </div>
        <div class="relative flex justify-center text-sm">
          <span class="px-2 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">Or continue with</span>
        </div>
      </div>

      <div class="mt-6">
        <script src="https://accounts.google.com/gsi/client" async></script>
        <div id="g_id_onload"
             data-client_id="310784166857-5t11fmbmmo9g465qfoa78d162c0i4t4a.apps.googleusercontent.com"
             data-context="signin"
             data-ux_mode="popup"
             data-callback="handleCredentialResponse"
             data-login_uri="http://localhost"
             data-auto_prompt="false">
        </div>

        <div class="g_id_signin"
             data-type="standard"
             data-size="large"
             data-theme="outline"
             data-text="sign_in_with"
             data-shape="rectangular"
             data-logo_alignment="left">
        </div>
      </div>
    </div>

    <p class="mt-10 text-center text-sm text-gray-500 dark:text-gray-400">
      Not a member?
      <a href="register.php" class="font-medium text-primary hover:text-primary/80">Create an account</a>
    </p>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signin-form');
    const formMessage = document.getElementById('form-message');
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        if (!email || !password) {
            showMessage('Please enter both email and password', 'error');
            return;
        }
        
        try {
            const response = await fetch('auth/auth-handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'login',
                    email: email,
                    password: password
                })
            });
            
            const data = await response.json();
            
            if (data.success) {
                showMessage(data.message, 'success');
                setTimeout(() => {
                    window.location.href = 'index.php';
                }, 1500);
            } else {
                if (data.needs_verification) {
                    showMessage('Please verify your email before logging in', 'error');
                    setTimeout(() => {
                        // Redirect to verification page
                        window.location.href = `verify-email.php?email=${encodeURIComponent(email)}`;
                    }, 1500);
                } else {
                    showMessage(data.message, 'error');
                }
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

// Google Sign-In callback
function handleCredentialResponse(response) {
    const responsePayload = decodeJwtResponse(response.credential);

    fetch('auth/auth-handler.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            action: 'google_login',
            token: response.credential,
            email: responsePayload.email,
            name: responsePayload.name,
            google_id: responsePayload.sub
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'index.php';  // Updated from index.html to index.php
        } else {
            showMessage(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Google Sign-In error:', error);
        showMessage('An error occurred with Google Sign-In', 'error');
    });
}

function decodeJwtResponse(token) {
    var base64Url = token.split('.')[1];
    var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));

    return JSON.parse(jsonPayload);
}
</script>

<?php include 'includes/footer.php'; ?>
    <script src="js/fake-auth.js"></script>
</body>
</html>

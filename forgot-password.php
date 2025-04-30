<?php include 'includes/header.php'; ?>
<?php include 'includes/navigation.php'; ?>

<div class="min-h-screen pt-24 pb-12 flex flex-col items-center">
  <div class="w-full max-w-md p-8 space-y-8 bg-white dark:bg-gray-800 rounded-lg shadow-md transition-all duration-300">
    <div class="text-center">
      <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">Reset Password</h1>
      <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Enter your email to receive a password reset OTP</p>
    </div>

    <div id="step-1" class="space-y-6">
      <div id="form-message" class="hidden p-4 mb-4 text-sm rounded-lg"></div>
      
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email address</label>
        <div class="mt-1">
          <input id="email" name="email" type="email" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-primary focus:border-primary text-base" placeholder="Enter your email">
        </div>
      </div>

      <div>
        <button onclick="requestOTP()" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Send OTP</button>
      </div>
    </div>

    <div id="step-2" class="space-y-6 hidden">
      <div>
        <label for="otp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Enter OTP</label>
        <div class="mt-1">
          <input id="otp" name="otp" type="text" required maxlength="6" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-primary focus:border-primary text-base" placeholder="Enter 6-digit OTP">
        </div>
      </div>

      <div>
        <button onclick="verifyOTP()" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Verify OTP</button>
      </div>
    </div>

    <div id="step-3" class="space-y-6 hidden">
      <div>
        <label for="new-password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password</label>
        <div class="mt-1">
          <input id="new-password" name="new-password" type="password" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-primary focus:border-primary text-base" placeholder="Enter new password">
        </div>
      </div>

      <div>
        <label for="confirm-password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
        <div class="mt-1">
          <input id="confirm-password" name="confirm-password" type="password" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-primary focus:border-primary text-base" placeholder="Confirm new password">
        </div>
      </div>

      <div>
        <button onclick="resetPassword()" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Reset Password</button>
      </div>
    </div>
  </div>
</div>

<script>
let resetToken = '';
let userEmail = '';

function showMessage(message, type) {
    const formMessage = document.getElementById('form-message');
    formMessage.textContent = message;
    formMessage.classList.remove('hidden', 'bg-red-100', 'text-red-700', 'bg-green-100', 'text-green-700');
    
    if (type === 'error') {
        formMessage.classList.add('bg-red-100', 'text-red-700');
    } else {
        formMessage.classList.add('bg-green-100', 'text-green-700');
    }
    
    formMessage.classList.remove('hidden');
}

function showStep(step) {
    document.getElementById('step-1').classList.add('hidden');
    document.getElementById('step-2').classList.add('hidden');
    document.getElementById('step-3').classList.add('hidden');
    document.getElementById('step-' + step).classList.remove('hidden');
}

async function requestOTP() {
    const email = document.getElementById('email').value;
    if (!email) {
        showMessage('Please enter your email address', 'error');
        return;
    }
    
    userEmail = email;
    
    try {
        const response = await fetch('auth/email-handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'send_reset_otp',
                email: email
            })
        });
        
        const data = await response.json();
        
        if (data.success) {
            showMessage('OTP sent to your email', 'success');
            showStep(2);
        } else {
            showMessage(data.message, 'error');
        }
    } catch (error) {
        showMessage('An error occurred. Please try again.', 'error');
    }
}

async function verifyOTP() {
    const otp = document.getElementById('otp').value;
    if (!otp || otp.length !== 6) {
        showMessage('Please enter a valid 6-digit OTP', 'error');
        return;
    }
    
    try {
        const response = await fetch('auth/email-handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'verify_reset_otp',
                email: userEmail,
                otp: otp
            })
        });
        
        const data = await response.json();
        
        if (data.success) {
            resetToken = data.token;
            showMessage('OTP verified successfully', 'success');
            showStep(3);
        } else {
            showMessage(data.message, 'error');
        }
    } catch (error) {
        showMessage('An error occurred. Please try again.', 'error');
    }
}

async function resetPassword() {
    const password = document.getElementById('new-password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    
    if (!password || !confirmPassword) {
        showMessage('Please enter both passwords', 'error');
        return;
    }
    
    if (password !== confirmPassword) {
        showMessage('Passwords do not match', 'error');
        return;
    }
    
    try {
        const response = await fetch('auth/email-handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'reset_password',
                token: resetToken,
                password: password
            })
        });
        
        const data = await response.json();
        
        if (data.success) {
            showMessage('Password reset successful. Redirecting to login...', 'success');
            setTimeout(() => {
                window.location.href = 'sign-in.php';
            }, 2000);
        } else {
            showMessage(data.message, 'error');
        }
    } catch (error) {
        showMessage('An error occurred. Please try again.', 'error');
    }
}
</script>

<?php include 'includes/footer.php'; ?>
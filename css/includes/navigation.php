<nav class="bg-white dark:bg-gray-800 fixed w-full z-50 top-0 border-b border-gray-200 dark:border-gray-700">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="index.php" class="flex items-center">
                <span class="text-2xl font-bold text-primary">FuturePath<span class="text-gray-900 dark:text-white">Mentor</span></span>
            </a>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8">
                <a href="index.php" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Home</a>
                <a href="aptitude-test.php" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Aptitude Test</a>
                <a href="career-paths.php" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Career Paths</a>
                <a href="ai-counselor.php" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">AI Counselor</a>
                <a href="features.php" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Features</a>
                <a href="about.php" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">About</a>
                <a href="contact.php" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Contact</a>
                <a href="testimonials.php" class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Testimonials</a>
            </div>

            <!-- Dark Mode Toggle -->
            <button id="theme-toggle" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                </svg>
            </button>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button type="button" class="mobile-menu-button text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="index.php" class="block px-3 py-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Home</a>
                <a href="aptitude-test.php" class="block px-3 py-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Aptitude Test</a>
                <a href="career-paths.php" class="block px-3 py-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Career Paths</a>
                <a href="ai-counselor.php" class="block px-3 py-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">AI Counselor</a>
                <a href="features.php" class="block px-3 py-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Features</a>
                <a href="about.php" class="block px-3 py-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">About</a>
                <a href="contact.php" class="block px-3 py-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Contact</a>
                <a href="testimonials.php" class="block px-3 py-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary">Testimonials</a>
            </div>
        </div>
    </div>
</nav>
<head>
    <link rel="stylesheet" href="css/animations.css">
    <script src="js/scroll-animations.js" defer></script>
</head>
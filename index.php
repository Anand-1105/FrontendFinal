<?php
include 'includes/header.php';
include 'includes/navigation.php';
?>

<div class="min-h-screen pt-24 pb-12 bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-gray-800">
    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-6 animate-fade-in">
                Welcome to <span class="text-primary">FuturePathMentor!</span>
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed">
                Discover your perfect career path with our AI-powered guidance system. Get personalized recommendations and make informed decisions about your future.
            </p>
        </div>

        <!-- Feature Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Aptitude Test Card -->
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <div class="flex items-center justify-center w-16 h-16 bg-primary/10 rounded-full mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Career Aptitude Test</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6 min-h-[4rem]">
                    Discover your strengths and potential career paths through our comprehensive assessment powered by advanced analytics.
                </p>
                <a href="aptitude-test.php" class="inline-flex items-center justify-center w-full bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-colors group-hover:scale-105">
                    <span>Take the Test</span>
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>

            <!-- Career Paths Card -->
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <div class="flex items-center justify-center w-16 h-16 bg-secondary/10 rounded-full mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Explore Career Paths</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6 min-h-[4rem]">
                    Browse through our extensive database of career options with detailed insights, salary information, and growth prospects.
                </p>
                <a href="career-paths.php" class="inline-flex items-center justify-center w-full bg-secondary text-white px-6 py-3 rounded-lg hover:bg-secondary/90 transition-colors group-hover:scale-105">
                    <span>Explore Careers</span>
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>

            <!-- AI Counselor Card -->
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <div class="flex items-center justify-center w-16 h-16 bg-tertiary/10 rounded-full mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-tertiary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">AI Career Counselor</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6 min-h-[4rem]">
                    Get instant, personalized career guidance from our AI counselor. Ask questions and receive expert advice 24/7.
                </p>
                <a href="ai-counselor.php" class="inline-flex items-center justify-center w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors group-hover:scale-105">
                    <span>Start Conversation</span>
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="mt-20 text-center">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="p-4">
                    <div class="text-4xl font-bold text-primary mb-2">1000+</div>
                    <div class="text-gray-600 dark:text-gray-400">Career Paths</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl font-bold text-secondary mb-2">24/7</div>
                    <div class="text-gray-600 dark:text-gray-400">AI Support</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl font-bold text-tertiary mb-2">98%</div>
                    <div class="text-gray-600 dark:text-gray-400">User Satisfaction</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl font-bold text-primary mb-2">50K+</div>
                    <div class="text-gray-600 dark:text-gray-400">Users Guided</div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.animate-fade-in {
    animation: fadeIn 1s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<?php include 'includes/footer.php'; ?>
</body>
</html>
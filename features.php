<?php 
include 'includes/header.php';
include 'includes/navigation.php';
?>

<div class="min-h-screen pt-24 pb-12 bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-gray-800">
    <div class="container mx-auto px-4">
        <!-- Features Hero Section -->
        <div class="text-center mb-16 animate-fade-in">
            <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-6">
                Our <span class="text-primary">Features</span>
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed">
                Discover the powerful tools and resources we offer to help guide your career journey
            </p>
        </div>

        <!-- Main Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- AI Career Assessment -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 transform hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center justify-center w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full mb-6">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">AI Career Assessment</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Take our comprehensive AI-powered assessment to discover career paths that match your skills, interests, and personality.
                </p>
                <a href="aptitude-test.php" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:underline">
                    Take Assessment
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- Career Path Explorer -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 transform hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center justify-center w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full mb-6">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Career Path Explorer</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Explore detailed career paths with insights into required skills, salary expectations, and growth opportunities.
                </p>
                <a href="career-paths.php" class="inline-flex items-center text-green-600 dark:text-green-400 hover:underline">
                    Explore Careers
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- AI Career Counselor -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 transform hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center justify-center w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full mb-6">
                    <svg class="w-8 h-8 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">AI Career Counselor</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Get personalized career guidance and answers to your questions from our AI counselor, available 24/7.
                </p>
                <a href="ai-counselor.php" class="inline-flex items-center text-purple-600 dark:text-purple-400 hover:underline">
                    Chat Now
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Additional Features Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Personalized Learning -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Personalized Learning Path</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="ml-3 text-gray-600 dark:text-gray-400">Customized skill development recommendations</p>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="ml-3 text-gray-600 dark:text-gray-400">Progress tracking and milestone achievements</p>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="ml-3 text-gray-600 dark:text-gray-400">Adaptive learning suggestions based on your progress</p>
                    </div>
                </div>
            </div>

            <!-- Industry Insights -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Industry Insights</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="ml-3 text-gray-600 dark:text-gray-400">Real-time job market trends and analysis</p>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="ml-3 text-gray-600 dark:text-gray-400">Salary benchmarks and industry standards</p>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="ml-3 text-gray-600 dark:text-gray-400">Future career outlook and emerging opportunities</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navigation.php'; ?>

<div class="min-h-screen pt-24 pb-12 bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-gray-800">
    <div class="container mx-auto px-4">
        <!-- About Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-6">
                About <span class="text-primary">Us</span>
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed">
                Empowering students to make informed career decisions through AI-powered guidance and comprehensive resources.
            </p>
        </div>

        <!-- Mission & Vision -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
            <!-- Mission -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                <div class="flex items-center justify-center w-16 h-16 bg-primary/10 rounded-full mb-6">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Our Mission</h2>
                <p class="text-gray-600 dark:text-gray-400">
                    To revolutionize career guidance by leveraging artificial intelligence and data-driven insights, making professional career counseling accessible to students worldwide. We strive to help every individual discover their true potential and find their ideal career path.
                </p>
            </div>

            <!-- Vision -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                <div class="flex items-center justify-center w-16 h-16 bg-secondary/10 rounded-full mb-6">
                    <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Our Vision</h2>
                <p class="text-gray-600 dark:text-gray-400">
                    To become the world's leading platform for career guidance, creating a future where every student has access to personalized, AI-powered career counseling. We envision a world where career decisions are made with confidence, backed by data and expert insights.
                </p>
            </div>
        </div>

        <!-- Values -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 mb-16">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Our Core Values</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="flex items-center justify-center w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Innovation</h3>
                    <p class="text-gray-600 dark:text-gray-400">Continuously improving our AI technology to provide the best guidance possible.</p>
                </div>
                <div class="text-center">
                    <div class="flex items-center justify-center w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Accessibility</h3>
                    <p class="text-gray-600 dark:text-gray-400">Making career guidance available to everyone, anywhere, anytime.</p>
                </div>
                <div class="text-center">
                    <div class="flex items-center justify-center w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Excellence</h3>
                    <p class="text-gray-600 dark:text-gray-400">Committed to providing the highest quality career guidance and support.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
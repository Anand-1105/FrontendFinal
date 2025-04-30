<?php 
include 'includes/header.php';
include 'includes/navigation.php';
?>

<div class="min-h-screen pt-24 pb-12 bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-gray-800">
    <div class="container mx-auto px-4">
        <!-- Contact Hero Section -->
        <div class="text-center mb-16 animate-fade-in">
            <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-6">
                Contact <span class="text-primary">Us</span>
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed">
                Have questions? We're here to help. Reach out to us through any of the channels below.
            </p>
        </div>

        <div class="max-w-4xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 transform hover:shadow-2xl transition-all duration-300">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8">Send us a Message</h2>
                <form id="contact-form" class="space-y-6">
                    <div class="form-group">
                        <label for="name" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                        <input type="text" name="name" id="name" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 dark:border-gray-600 focus:border-primary focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white transition-colors duration-200" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                        <input type="email" name="email" id="email" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 dark:border-gray-600 focus:border-primary focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white transition-colors duration-200" required>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Subject</label>
                        <input type="text" name="subject" id="subject" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 dark:border-gray-600 focus:border-primary focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white transition-colors duration-200" required>
                    </div>
                    <div class="form-group">
                        <label for="message" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
                        <textarea name="message" id="message" rows="5" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 dark:border-gray-600 focus:border-primary focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white transition-colors duration-200" required></textarea>
                    </div>
                    <button type="submit" class="w-full flex items-center justify-center space-x-2 px-6 py-4 bg-primary text-white rounded-lg hover:bg-primary/90 transform hover:scale-[1.02] transition-all duration-200 font-semibold text-lg">
                        <span>Send Message</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-8">
                <!-- Map -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden h-[300px]">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.332792000579!2d-122.41941708468204!3d37.77492997975903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDQ2JzI5LjgiTiAxMjLCsDI1JzA5LjYiVw!5e0!3m2!1sen!2sus!4v1635786994963!5m2!1sen!2sus"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>

                <!-- Contact Details -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 transform hover:shadow-2xl transition-all duration-300">
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Visit Us</h3>
                                <p class="text-gray-600 dark:text-gray-400 mt-2">
                                    123 Career Street<br>
                                    Innovation District<br>
                                    Tech City, TC 12345
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Contact Info</h3>
                                <p class="text-gray-600 dark:text-gray-400 mt-2">
                                    Email: info@futurepathmentor.com<br>
                                    Phone: +1 (555) 123-4567<br>
                                    Hours: Mon-Fri 9AM-6PM, Sat 10AM-2PM
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Thank you for your message. We will get back to you soon!');
        form.reset();
    });
});
</script>
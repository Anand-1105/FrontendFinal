<?php
require_once('db-connection.php');
session_start();
include 'includes/header.php';
include 'includes/navigation.php';

// Generate random career scores if not set
if (!isset($_SESSION['career_scores'])) {
    $_SESSION['career_scores'] = [
        'technology' => rand(65, 95),
        'healthcare' => rand(60, 90),
        'business' => rand(70, 95),
        'education' => rand(55, 85),
        'engineering' => rand(75, 98)
    ];
}

$career_scores = $_SESSION['career_scores'];
?>

<div class="container mx-auto px-4 pt-24 pb-12">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Career Paths</h1>
        <?php if ($career_scores): ?>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
            Based on your aptitude test results, here are your career compatibility scores:
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-4xl mx-auto mb-12">
            <?php foreach ($career_scores as $career => $score): ?>
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-md">
                <h3 class="text-xl font-semibold text-primary mb-3 capitalize"><?php echo $career; ?></h3>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200 dark:bg-gray-700">
                        <div style="width:<?php echo $score; ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-primary"></div>
                    </div>
                    <div class="text-right">
                        <span class="text-lg font-semibold text-primary"><?php echo round($score); ?>%</span>
                        <span class="text-sm text-gray-600 dark:text-gray-400">compatibility</span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
            Take our <a href="aptitude-test.php" class="text-primary hover:underline">aptitude test</a> to see your career compatibility scores!
        </p>
        <?php endif; ?>
    </div>

    <!-- Rest of your career paths content -->
    <?php include 'includes/career-exploration-tools.php'; ?>

        <!-- Include cluster careers component -->
        <?php include 'includes/cluster-careers.php'; ?>
        
        <!-- Include search results component -->
        <?php include 'includes/search-results.php'; ?>

        <!-- Include career clusters grid component -->
        <?php include 'includes/career-clusters-grid.php'; ?>
        
        <!-- Include featured careers component -->
        <?php include 'includes/featured-careers.php'; ?>
        
        <!-- Include career planning resources component -->
        <?php include 'includes/career-planning-resources.php'; ?>
</div>

<?php include 'includes/footer.php'; ?>
  </body>
</html>

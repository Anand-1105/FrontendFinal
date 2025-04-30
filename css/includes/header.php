

<!DOCTYPE html>
<html lang="en" class="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aptitude Test - FuturePath Mentor</title>
    <meta name="description" content="Take our comprehensive aptitude test" />
    <meta name="author" content="Lovable" />
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              primary: "#4F46E5",
              secondary: "#10B981",
              accent: "#8B5CF6",
              neutral: "#1F2937",
              "light-gray": "#F3F4F6",
            },
            boxShadow: {
              sm: '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
              DEFAULT: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)',
              md: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
              lg: '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
              xl: '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
              '2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
            },
            animation: {
              'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            }
          }
        }
      }
    </script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Inter', sans-serif;
      }
      .required-star::after {
        content: " *";
        color: #EF4444;
      }
      .dark {
        color-scheme: dark;
      }
      .dark body {
        background-color: #1F2937;
        color: #F9FAFB;
      }
      /* Add specific dark mode overrides */
      .dark .bg-white {
        background-color: #1F2937 !important;
      }
      .dark .bg-gray-50 {
        background-color: #111827 !important;
      }
      .dark .text-gray-900 {
        color: #F9FAFB !important;
      }
      .dark .border-gray-200 {
        border-color: #374151 !important;
      }
      .dark .shadow-md {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.1);
      }
      .dark input, .dark textarea, .dark select {
        background-color: #374151 !important;
        border-color: #4B5563 !important;
        color: #F9FAFB !important;
      }
      .dark label {
        color: #F9FAFB !important;
      }
      .dark p {
        color: #E5E7EB !important;
      }
      .dark h2, .dark h3 {
        color: #F9FAFB !important;
      }
      /* Additional dark mode styles for sections with light backgrounds */
      .dark .bg-gradient-to-r {
        background-image: none !important;
      }
      .dark .bg-blue-50, 
      .dark .bg-indigo-50, 
      .dark .bg-purple-50 {
        background-color: #1E293B !important;
      }
      .dark .from-blue-50, 
      .dark .via-indigo-50, 
      .dark .to-purple-50 {
        background-image: linear-gradient(to right, #1A1F2C, #221F26, #403E43) !important;
      }
      /* Progress bar specific styles */
      .dark .progress-bar,
      .dark [role="progressbar"] {
        background-color: #374151 !important;
      }
      .dark .progress-value,
      .dark [data-state="loading"] div {
        background-color: #6366F1 !important;
      }
      .dark .bg-blue-100 {
        background-color: #3B4866 !important;
      }
      /* Fix any remaining light sections */
      .dark .bg-gray-100 {
        background-color: #1F2937 !important;
      }
      .dark .bg-blue-500 {
        background-color: #3B82F6 !important;
      }
      .dark .text-gray-600 {
        color: #D1D5DB !important;
      }
      .dark .text-gray-800 {
        color: #F3F4F6 !important;
      }
      /* Career paths specific styles */
      .dark .divide-gray-200 {
        border-color: #374151 !important;
      }
      .dark .hover\:bg-gray-50:hover {
        background-color: #2D3748 !important;
      }
      .dark .text-green-800 {
        color: #D1FAE5 !important; 
      }
      .dark .bg-green-100 {
        background-color: #065F46 !important;
      }
      /* AI counselor specific fixes */
      .dark #message-input,
      .dark #user-input {
        background-color: #374151 !important;
        color: #F9FAFB !important;
        border-color: #4B5563 !important;
      }
      .dark .user-message,
      .dark .ai-message {
        border-color: #4B5563 !important;
      }
      .dark .user-message {
        background-color: #3B4866 !important;
      }
      .dark .ai-message {
        background-color: #1F2937 !important;
      }
    </style>
    <!-- Required Lovable script tag -->
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  </head>

  <body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Dark mode script -->
    <script>
      // On page load or when changing themes, best to add inline in `head` to avoid FOUC
      if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    </script>


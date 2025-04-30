
import React, { useState, useEffect } from "react";

const CareerPaths = () => {
  const [modalVisible, setModalVisible] = useState(false);
  const [modalTitle, setModalTitle] = useState("");
  const [modalCluster, setModalCluster] = useState("");
  const [darkMode, setDarkMode] = useState(false);

  // Check for dark mode on component mount
  useEffect(() => {
    const isDarkMode = document.documentElement.classList.contains('dark');
    setDarkMode(isDarkMode);
    
    // Set up listener for theme changes
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.attributeName === 'class') {
          const isDark = document.documentElement.classList.contains('dark');
          setDarkMode(isDark);
        }
      });
    });
    
    observer.observe(document.documentElement, { attributes: true });
    
    return () => observer.disconnect();
  }, []);

  const showCareerDetails = (title: string, cluster: string, e: React.MouseEvent) => {
    e.preventDefault();
    setModalTitle(title);
    setModalCluster(cluster);
    setModalVisible(true);
  };

  const closeModal = () => {
    setModalVisible(false);
  };

  // Sample career clusters data
  const careerClusters = [
    { name: "Business Management & Administration", icon: "briefcase" },
    { name: "Health Science", icon: "activity" },
    { name: "Information Technology", icon: "cpu" },
    { name: "Arts, Audio/Video Technology & Communications", icon: "music" },
    { name: "Education & Training", icon: "book-open" },
    { name: "Finance", icon: "dollar-sign" },
    { name: "Government & Public Administration", icon: "landmark" },
    { name: "Hospitality & Tourism", icon: "map" },
    { name: "Science, Technology, Engineering & Mathematics", icon: "flask" },
  ];

  return (
    <div className="min-h-screen bg-gray-50 dark:bg-gray-900">
      {/* Career Paths Header */}
      <div className="pt-24 pb-12 bg-white dark:bg-gray-800">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center">
            <h1 className="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">Career Paths</h1>
            <p className="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-300 sm:mt-4">
              Explore various career clusters and find detailed information about potential career paths.
            </p>
          </div>
        </div>
      </div>

      {/* Career Clusters Content */}
      <div className="pb-16 bg-white dark:bg-gray-800">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          {/* Career exploration tools */}
          <div className="mt-8 mb-12 bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <div className="p-6">
              <h2 className="text-xl font-semibold text-gray-900 dark:text-white mb-4">Career Exploration Tools</h2>
              <div className="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                  <label htmlFor="search" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Search Careers:</label>
                  <div className="mt-1 relative rounded-md shadow-sm">
                    <input
                      type="text"
                      name="search"
                      id="search"
                      className="focus:ring-primary focus:border-primary block w-full pl-3 pr-12 sm:text-sm border-gray-300 dark:border-gray-600 rounded-md h-10 dark:bg-gray-700 dark:text-white"
                      placeholder="Search for careers"
                    />
                    <div className="absolute inset-y-0 right-0 flex items-center">
                      <button 
                        type="submit" 
                        className="h-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-r-md text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:bg-indigo-600 dark:hover:bg-indigo-700"
                      >
                        Search
                      </button>
                    </div>
                  </div>
                </div>
                <div>
                  <label htmlFor="education-filter" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Filter by Education:</label>
                  <select
                    id="education-filter"
                    name="education"
                    className="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md h-10 dark:bg-gray-700 dark:text-white"
                  >
                    <option value="">All Education Levels</option>
                    <option value="High School">High School Diploma</option>
                    <option value="Associate">Associate's Degree</option>
                    <option value="Bachelor">Bachelor's Degree</option>
                    <option value="Master">Master's Degree</option>
                    <option value="Doctoral">Doctoral Degree</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          {/* Career clusters grid */}
          <div className="mt-8">
            <h2 className="text-2xl font-bold text-gray-900 dark:text-white mb-6">Career Clusters</h2>
            <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
              {careerClusters.map((cluster, index) => (
                <div key={index} className="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg hover:shadow-md transition-shadow duration-300 dark:border dark:border-gray-700">
                  <div className="px-4 py-5 sm:p-6">
                    <div className="flex items-center">
                      <div className="flex-shrink-0 bg-primary dark:bg-indigo-600 rounded-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                      </div>
                      <div className="ml-5">
                        <h3 className="text-lg font-medium text-gray-900 dark:text-white">{cluster.name}</h3>
                        <div className="mt-2">
                          <a
                            href="#"
                            className="text-sm font-medium text-primary dark:text-indigo-400 hover:text-primary/80 dark:hover:text-indigo-300 career-link"
                            onClick={(e) => showCareerDetails("Sample Career Title", cluster.name, e)}
                          >
                            View Careers <span aria-hidden="true">→</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
          
          {/* Featured careers section */}
          <div className="mt-12">
            <h2 className="text-2xl font-bold text-gray-900 dark:text-white mb-6">Featured Careers</h2>
            <div className="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-md dark:border dark:border-gray-700">
              <ul role="list" className="divide-y divide-gray-200 dark:divide-gray-700">
                {[
                  { title: "Software Developer", cluster: "Information Technology" },
                  { title: "Registered Nurse", cluster: "Health Science" },
                  { title: "Financial Analyst", cluster: "Finance" },
                  { title: "Marketing Manager", cluster: "Business Management & Administration" },
                ].map((career, index) => (
                  <li key={index}>
                    <a
                      href="#"
                      className="block hover:bg-gray-50 dark:hover:bg-gray-700"
                      onClick={(e) => showCareerDetails(career.title, career.cluster, e)}
                    >
                      <div className="px-4 py-4 sm:px-6">
                        <div className="flex items-center justify-between">
                          <p className="text-sm font-medium text-primary dark:text-indigo-400 truncate">{career.title}</p>
                          <div className="ml-2 flex-shrink-0 flex">
                            <p className="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                              High Growth
                            </p>
                          </div>
                        </div>
                        <div className="mt-2 sm:flex sm:justify-between">
                          <div className="sm:flex">
                            <p className="flex items-center text-sm text-gray-500 dark:text-gray-400">
                              {career.cluster}
                            </p>
                          </div>
                        </div>
                      </div>
                    </a>
                  </li>
                ))}
              </ul>
            </div>
          </div>
        </div>
      </div>

      {/* Career Details Modal */}
      {modalVisible && (
        <div className="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center p-4 z-50">
          <div className="bg-white dark:bg-gray-800 rounded-lg max-w-2xl w-full mx-auto overflow-hidden shadow-xl transform transition-all">
            <div className="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div className="sm:flex sm:items-start">
                <div className="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                  <h3 className="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                    {modalTitle}
                  </h3>
                  <div className="mt-2">
                    <p className="text-sm text-gray-500 dark:text-gray-400" id="modal-cluster">
                      {modalCluster}
                    </p>
                    <div className="mt-4 prose prose-sm text-gray-500 dark:text-gray-300" id="modal-content">
                      <p><strong>Description:</strong> This career involves using specialized skills to solve problems and create value in the {modalCluster} field.</p>
                      <p className="mb-2"><strong>Required Skills:</strong></p>
                      <ul className="list-disc pl-5 mb-2">
                        <li>Critical thinking and problem-solving</li>
                        <li>Communication and collaboration</li>
                        <li>Technical expertise in relevant areas</li>
                        <li>Adaptability and continuous learning</li>
                      </ul>
                      <p className="mb-2"><strong>Work Environment:</strong> Typically in office settings, laboratories, or specialized facilities depending on the specific role.</p>
                      <p><strong>Career Path:</strong> Entry-level positions often lead to senior roles, management opportunities, or specialized expert positions after gaining experience.</p>
                      <div className="mt-4 p-3 bg-blue-50 dark:bg-blue-900 rounded-md">
                        <p className="text-sm text-blue-800 dark:text-blue-200"><strong>Pro Tip:</strong> Consider pursuing internships or volunteer opportunities in this field to gain valuable experience and make industry connections.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <button
                type="button"
                className="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                onClick={closeModal}
              >
                Close
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  );
};

export default CareerPaths;

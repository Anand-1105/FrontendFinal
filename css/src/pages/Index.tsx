import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { motion } from "framer-motion";

const Index = () => {
  return (
    <div className="min-h-screen bg-gray-50 dark:bg-gray-900">
      {/* Hero Section with Enhanced Gradient Background */}
      <div className="relative bg-gradient-to-r from-primary to-secondary overflow-hidden">
        <div className="absolute inset-0 bg-grid-pattern opacity-10"></div>
        <motion.div 
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          className="max-w-7xl mx-auto"
        >
          <div className="max-w-7xl mx-auto">
            <div className="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:w-full lg:pb-28 xl:pb-32">
              <main className="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div className="text-center">
                  <h1 className="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                    <span className="block">Shape Your Future With</span>
                    <span className="block text-primary-light">FuturePathMentor</span>
                  </h1>
                  <p className="mt-3 text-base text-gray-100 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
                    Discover your perfect career path with our AI-powered guidance system. Get personalized recommendations and make informed decisions about your future.
                  </p>
                  <div className="mt-5 sm:mt-8 sm:flex sm:justify-center">
                    <div className="rounded-md shadow">
                      <Link
                        to="/aptitude-test"
                        className="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-primary-dark md:py-4 md:text-lg md:px-10"
                      >
                        Start Your Journey
                      </Link>
                    </div>
                  </div>
                </div>
              </main>
            </div>
          </div>
        </div>

      {/* Enhanced Features Section */}
      <div className="py-12 bg-white dark:bg-gray-800">
        <motion.div 
          initial={{ opacity: 0 }}
          whileInView={{ opacity: 1 }}
          viewport={{ once: true }}
          className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
        >
          <div className="text-center mb-12">
            <h2 className="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
              Explore Your Career Options
            </h2>
            <p className="mt-4 text-xl text-gray-500 dark:text-gray-300">
              Everything you need to make informed career decisions
            </p>
          </div>

          <div className="grid grid-cols-1 gap-8 md:grid-cols-3">
            {/* Aptitude Test Card */}
            <Link 
              to="/aptitude-test"
              className="group bg-white dark:bg-gray-700 overflow-hidden shadow-lg rounded-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1"
            >
              <div className="px-4 py-5 sm:p-6">
                <div className="text-center">
                  <div className="flex items-center justify-center h-16 w-16 rounded-full bg-primary text-white mx-auto group-hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" className="h-8 w-8">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <h3 className="mt-4 text-xl font-semibold text-gray-900 dark:text-white">Aptitude Test</h3>
                  <p className="mt-3 text-base text-gray-500 dark:text-gray-300">
                    Discover your strengths, interests, and values through our comprehensive aptitude test.
                  </p>
                  <span className="inline-flex items-center mt-4 text-primary dark:text-primary-light group-hover:translate-x-1 transition-transform duration-300">
                    Take the Test
                    <svg className="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                    </svg>
                  </span>
                </div>
              </div>
            </Link>

            {/* Career Paths Card */}
            <Link 
              to="/career-paths"
              className="group bg-white dark:bg-gray-700 overflow-hidden shadow-lg rounded-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1"
            >
              <div className="px-4 py-5 sm:p-6">
                <div className="text-center">
                  <div className="flex items-center justify-center h-16 w-16 rounded-full bg-secondary text-white mx-auto group-hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" className="h-8 w-8">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <h3 className="mt-4 text-xl font-semibold text-gray-900 dark:text-white">Career Paths</h3>
                  <p className="mt-3 text-base text-gray-500 dark:text-gray-300">
                    Explore various career paths and find detailed information about potential opportunities.
                  </p>
                  <span className="inline-flex items-center mt-4 text-secondary dark:text-secondary-light group-hover:translate-x-1 transition-transform duration-300">
                    Explore Careers
                    <svg className="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                    </svg>
                  </span>
                </div>
              </div>
            </Link>

            {/* AI Counselor Card */}
            <Link 
              to="/ai-counselor"
              className="group bg-white dark:bg-gray-700 overflow-hidden shadow-lg rounded-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1"
            >
              <div className="px-4 py-5 sm:p-6">
                <div className="text-center">
                  <div className="flex items-center justify-center h-16 w-16 rounded-full bg-tertiary text-white mx-auto group-hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" className="h-8 w-8">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                  </div>
                  <h3 className="mt-4 text-xl font-semibold text-gray-900 dark:text-white">AI Counselor</h3>
                  <p className="mt-3 text-base text-gray-500 dark:text-gray-300">
                    Get personalized career advice and guidance from our AI-powered career counselor.
                  </p>
                  <span className="inline-flex items-center mt-4 text-tertiary dark:text-tertiary-light group-hover:translate-x-1 transition-transform duration-300">
                    Start Chat
                    <svg className="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                    </svg>
                  </span>
                </div>
              </div>
            </Link>
          </div>
        </div>

      {/* Animated Stats Section */}
      <div className="bg-gray-50 dark:bg-gray-900 py-12">
        <motion.div 
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5 }}
          className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
        >
          <div className="grid grid-cols-1 gap-5 sm:grid-cols-4 mt-5">
            <div className="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
              <div className="px-4 py-5 sm:p-6 text-center">
                <dt className="text-sm font-medium text-gray-500 dark:text-gray-300 truncate">Career Paths</dt>
                <dd className="mt-1 text-3xl font-semibold text-primary">100+</dd>
              </div>
            </div>
            <div className="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
              <div className="px-4 py-5 sm:p-6 text-center">
                <dt className="text-sm font-medium text-gray-500 dark:text-gray-300 truncate">Success Stories</dt>
                <dd className="mt-1 text-3xl font-semibold text-secondary">1000+</dd>
              </div>
            </div>
            <div className="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
              <div className="px-4 py-5 sm:p-6 text-center">
                <dt className="text-sm font-medium text-gray-500 dark:text-gray-300 truncate">Career Tests</dt>
                <dd className="mt-1 text-3xl font-semibold text-tertiary">5+</dd>
              </div>
            </div>
            <div className="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
              <div className="px-4 py-5 sm:p-6 text-center">
                <dt className="text-sm font-medium text-gray-500 dark:text-gray-300 truncate">Expert Insights</dt>
                <dd className="mt-1 text-3xl font-semibold text-primary">24/7</dd>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Index;
<!-- Footer -->
<footer class="bg-gray-100 dark:bg-gray-900 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('gov_logo.png') }}" alt="ICTA Logo" class="h-8 w-auto">
                    <div class="text-xl font-semibold text-blue-600 dark:text-blue-400">ICTA</div>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Empowering digital transformation through innovative space solutions.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Quick Links</h3>
                <ul class="space-y-3">
                    <li><a href="#home" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Home</a></li>
                    <li><a href="#rooms" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Rooms</a></li>
                    <li><a href="#features" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Features</a></li>
                    <li><a href="#about" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">About Us</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Support</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Help Center</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">FAQs</a></li>
                    <li><a href="#contact" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Contact Us</a></li>
                    <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Terms of Service</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Contact Info</h3>
                <ul class="space-y-3 text-gray-600 dark:text-gray-400">
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt w-5 text-blue-600 dark:text-blue-400"></i>
                        <span>490, R.A. De Mel Mawatha, Colombo 03</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone w-5 text-blue-600 dark:text-blue-400"></i>
                        <span>+94 11 236 9099</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope w-5 text-blue-600 dark:text-blue-400"></i>
                        <span>info@icta.lk</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-800">
            <p class="text-center text-gray-600 dark:text-gray-400 text-sm">
                © {{ date('Y') }} ICTA RoomBook. All rights reserved.
            </p>
        </div>
    </div>
</footer>
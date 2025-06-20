<!-- Features Section -->
<section id="features" class="py-20 px-8 bg-gradient-to-br from-blue-50 to-white" x-intersect="$el.classList.add('animate-fadeIn')">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4 text-blue-800 animate-fadeInUp main-topic">Why Choose ICTA RoomBook?</h2>
                <p class="text-slate-600 max-w-2xl mx-auto animate-fadeInUp animate-delay-100">
                    Our platform is designed to provide the most efficient and user-friendly booking experience
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="feature-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 animate-fadeInUp animate-delay-100">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 feature-icon">
                        <i class="fas fa-bolt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Instant Booking</h3>
                    <p class="text-slate-600">Book your meeting space in seconds with our streamlined process and real-time availability updates.</p>
                </div>
                
                <div class="feature-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 animate-fadeInUp animate-delay-200">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 feature-icon">
                        <i class="fas fa-desktop text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Tech-Enabled Spaces</h3>
                    <p class="text-slate-600">All rooms equipped with high-speed internet, smart displays, and video conferencing equipment.</p>
                </div>
                
                <div class="feature-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 animate-fadeInUp animate-delay-300">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 feature-icon">
                        <i class="fas fa-calendar-check text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Smart Scheduling</h3>
                    <p class="text-slate-600">AI-powered scheduling suggestions based on your team's availability and meeting purpose.</p>
                </div>
                
                <div class="feature-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 animate-fadeInUp animate-delay-100">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 feature-icon">
                        <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Secure Access</h3>
                    <p class="text-slate-600">Digital access control with unique QR codes for each booking, ensuring highest security standards.</p>
                </div>
                
                <div class="feature-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 animate-fadeInUp animate-delay-200">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 feature-icon">
                        <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Usage Analytics</h3>
                    <p class="text-slate-600">Gain insights into your organization's space utilization patterns with detailed analytics.</p>
                </div>
                
                <div class="feature-card bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 animate-fadeInUp animate-delay-300">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 feature-icon">
                        <i class="fas fa-headset text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">24/7 Support</h3>
                    <p class="text-slate-600">Our dedicated support team is always available to assist with any inquiries or technical issues.</p>
                </div>
            </div>
            
            <!-- Additional Features -->
            <div class="mt-16 glass-card rounded-xl p-8 shadow-lg animate-fadeInUp">
                <div class="grid md:grid-cols-4 gap-6 text-center">
                    <div class="p-4">
                        <div class="text-blue-600 text-3xl mb-2"><i class="fas fa-wifi"></i></div>
                        <h4 class="font-medium mb-1">High-Speed WiFi</h4>
                        <p class="text-sm text-slate-600">Gigabit connectivity in all spaces</p>
                    </div>
                    
                    <div class="p-4">
                        <div class="text-blue-600 text-3xl mb-2"><i class="fas fa-mug-hot"></i></div>
                        <h4 class="font-medium mb-1">Refreshments</h4>
                        <p class="text-sm text-slate-600">Complimentary tea, coffee & water</p>
                    </div>
                    
                    <div class="p-4">
                        <div class="text-blue-600 text-3xl mb-2"><i class="fas fa-wheelchair"></i></div>
                        <h4 class="font-medium mb-1">Accessibility</h4>
                        <p class="text-sm text-slate-600">All locations fully accessible</p>
                    </div>
                    
                    <div class="p-4">
                        <div class="text-blue-600 text-3xl mb-2"><i class="fas fa-leaf"></i></div>
                        <h4 class="font-medium mb-1">Eco-Friendly</h4>
                        <p class="text-sm text-slate-600">Sustainable practices & materials</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Showcase of Room Types -->
    <section class="py-20 px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-4 text-blue-800 animate-fadeInUp">Our Premium Spaces</h2>
            <p class="text-center text-slate-600 mb-12 max-w-2xl mx-auto animate-fadeInUp animate-delay-100">
                Discover our diverse range of thoughtfully designed spaces to match every meeting need
            </p>
            
            <div class="grid md:grid-cols-2 gap-10 mb-16">
                <!-- Executive Boardrooms -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 animate-slideInLeft">
                    <div class="relative">
                        <img src="{{ asset('features/Executive Boardrooms.webp') }}" alt="Executive Boardroom" class="w-full h-64 object-cover">
                        <div class="absolute top-0 right-0 bg-blue-600 text-white px-4 py-2 rounded-bl-xl text-sm font-medium">
                            Premium
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-3">Executive Boardrooms</h3>
                        <p class="text-slate-600 mb-4">Sophisticated spaces designed for high-level discussions and strategic planning sessions.</p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Capacity for 10-20 executives</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Integrated video conferencing</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Ultra HD displays with wireless sharing</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Soundproof environment</span>
                            </li>
                        </ul>
                        <a href="#rooms" class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800">
                            View Available Boardrooms
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Innovation Labs -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 animate-slideInRight">
                    <div class="relative">
                        <img src="{{ asset('features/Innovation Labs.jpg') }}" alt="Innovation Lab" class="w-full h-64 object-cover">
                        <div class="absolute top-0 right-0 bg-indigo-600 text-white px-4 py-2 rounded-bl-xl text-sm font-medium">
                            Creative
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-3">Innovation Labs</h3>
                        <p class="text-slate-600 mb-4">Dynamic spaces designed to foster creativity, collaboration, and breakthrough thinking.</p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Flexible furniture arrangements</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Interactive whiteboards and touchscreens</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Ideation tools and materials</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Integrated AR/VR capabilities</span>
                            </li>
                        </ul>
                        <a href="#rooms" class="inline-flex items-center font-medium text-indigo-600 hover:text-indigo-800">
                            View Available Innovation Labs
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Training Rooms -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 animate-fadeInUp">
                    <img src="{{ asset('features/Training Rooms.jpg') }}" alt="Training Room" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3">Training Rooms</h3>
                        <p class="text-slate-600 mb-4">Optimal learning environments for workshops, training sessions, and educational events.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500">Capacity: 15-40 people</span>
                            <a href="#rooms" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Conference Halls -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 animate-fadeInUp animate-delay-200">
                    <img src="{{ asset('features/Conference Halls.jpg') }}" alt="Conference Hall" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3">Conference Halls</h3>
                        <p class="text-slate-600 mb-4">Large-scale venues for conferences, seminars, and major corporate events.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500">Capacity: 50-200 people</span>
                            <a href="#rooms" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Focus Pods -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 animate-fadeInUp animate-delay-300">
                    <img src="{{ asset('features/Focus Pods.jpg') }}" alt="Focus Pod" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-3">Focus Pods</h3>
                        <p class="text-slate-600 mb-4">Private spaces for individual work or small group discussions requiring concentration.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500">Capacity: 1-4 people</span>
                            <a href="#rooms" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Testimonials Section -->
<section id="testimonials" class="py-20 px-8 bg-gradient-to-br from-blue-50 to-white" x-intersect="$el.classList.add('animate-fadeIn')">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-4 text-blue-800 animate-fadeInUp main-topic">What Our Users Say</h2>
            <p class="text-center text-slate-600 mb-12 max-w-2xl mx-auto animate-fadeInUp animate-delay-100">
                Hear from organizations and teams that have transformed their collaborative experiences with ICTA RoomBook
            </p>
            
            <div class="relative overflow-hidden">
                <!-- Previous Button -->
                <button class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-blue-600 p-3 rounded-full shadow-lg transition-all duration-300 focus:outline-none" 
                        onclick="scrollTestimonials(-1)">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <!-- Next Button -->
                <button class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-blue-600 p-3 rounded-full shadow-lg transition-all duration-300 focus:outline-none" 
                        onclick="scrollTestimonials(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Testimonials Container -->
                <div class="flex gap-8 overflow-x-auto snap-x snap-mandatory hide-scrollbar" x-ref="testimonialContainer" style="scroll-behavior: smooth;">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-card bg-white p-6 rounded-xl shadow-md flex-shrink-0 w-full md:w-[400px] snap-center">
                        <div class="flex items-center mb-4">
                            <div class="text-yellow-400 text-lg">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="ml-2 text-sm text-slate-500">5.0</div>
                        </div>
                        <p class="text-slate-600 mb-6 italic">"The booking process is seamless, and the staff is always helpful. Having access to these professional spaces has elevated our company's image significantly."</p>
                        <div class="flex items-center">
                            <img src="{{ asset('Testimonials/TechLanka.png') }}" alt="Testimonial Author" class="w-12 h-12 rounded-full object-cover">
                            <div class="ml-3">
                                <div class="font-medium">Sarah Perera</div>
                                <div class="text-sm text-slate-500">Operations Director, TechLanka</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="testimonial-card bg-white p-6 rounded-xl shadow-md flex-shrink-0 w-full md:w-[400px] snap-center">
                        <div class="flex items-center mb-4">
                            <div class="text-yellow-400 text-lg">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <div class="ml-2 text-sm text-slate-500">4.5</div>
                        </div>
                        <p class="text-slate-600 mb-6 italic">"The quality of the meeting rooms and technical equipment is exceptional. Our international partners are always impressed with the professional setup when we host virtual conferences through ICTA facilities."</p>
                        <div class="flex items-center">
                            <img src="{{ asset('Testimonials/Global Connect Solutions.jpg') }}" alt="Testimonial Author" class="w-12 h-12 rounded-full object-cover">
                            <div class="ml-3">
                                <div class="font-medium">Raj Fernando</div>
                                <div class="text-sm text-slate-500">CEO, Global Connect Solutions</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="testimonial-card bg-white p-6 rounded-xl shadow-md flex-shrink-0 w-full md:w-[400px] snap-center">
                        <div class="flex items-center mb-4">
                            <div class="text-yellow-400 text-lg">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="ml-2 text-sm text-slate-500">5.0</div>
                        </div>
                        <p class="text-slate-600 mb-6 italic">"As a startup, access to premium meeting spaces on-demand has been a game changer. The flexible booking options and transparent pricing have allowed us to maintain a professional image without the overhead."</p>
                        <div class="flex items-center">
                            <img src="{{ asset('Testimonials/The Witcher 3 Wild Hunt Logo.jpg') }}" alt="Testimonial Author" class="w-12 h-12 rounded-full object-cover">
                            <div class="ml-3">
                                <div class="font-medium">Amina Hussain</div>
                                <div class="text-sm text-slate-500">Founder, InnovateSL</div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 4 -->
                    <div class="testimonial-card bg-white p-6 rounded-xl shadow-md flex-shrink-0 w-full md:w-[400px] snap-center">
                        <div class="flex items-center mb-4">
                            <div class="text-yellow-400 text-lg">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="ml-2 text-sm text-slate-500">5.0</div>
                        </div>
                        <p class="text-slate-600 mb-6 italic">"As a startup, access to premium meeting spaces on-demand has been a game changer. The flexible booking options and transparent pricing have allowed us to maintain a professional image without the overhead."</p>
                        <div class="flex items-center">
                            <img src="{{ asset('Testimonials/The Witcher 3 Wild Hunt Logo.jpg') }}" alt="Testimonial Author" class="w-12 h-12 rounded-full object-cover">
                            <div class="ml-3">
                                <div class="font-medium">Amina Hussain</div>
                                <div class="text-sm text-slate-500">Founder, InnovateSL</div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 5 -->
                    <div class="testimonial-card bg-white p-6 rounded-xl shadow-md flex-shrink-0 w-full md:w-[400px] snap-center">
                        <div class="flex items-center mb-4">
                            <div class="text-yellow-400 text-lg">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="ml-2 text-sm text-slate-500">5.0</div>
                        </div>
                        <p class="text-slate-600 mb-6 italic">"Our experience with ICTA RoomBook has been exceptional. The facilities are top-notch, and the booking process is incredibly user-friendly. We have been able to host successful meetings that impress our clients every time!"</p>
                        <div class="flex items-center">
                            <img src="{{ asset('Testimonials/Tech Innovations.png') }}" alt="Testimonial Author" class="w-12 h-12 rounded-full object-cover">
                            <div class="ml-3">
                                <div class="font-medium">John Doe</div>
                                <div class="text-sm text-slate-500">CEO, Tech Innovations</div>
                            </div>
                        </div>
                    </div>
                    <!-- Additional Testimonials can be added here -->
                </div>
            </div>

            <style>
                .hide-scrollbar {
                    -ms-overflow-style: none;  /* IE and Edge */
                    scrollbar-width: none;  /* Firefox */
                }
                .hide-scrollbar::-webkit-scrollbar {
                    display: none;  /* Chrome, Safari and Opera */
                }
            </style>
            
            <!-- Testimonial Video Section -->
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                <!-- Left Side Interactive Content -->
                <div class="hidden md:block">
                    <div class="space-y-4">
                        <div class="bg-white p-6 rounded-xl shadow-md transform hover:scale-105 transition-transform duration-300">
                            <div class="flex items-center space-x-3">
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <i class="fas fa-video text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">HD Quality</h3>
                                    <p class="text-sm text-gray-600">Crystal clear video conferencing</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-md transform hover:scale-105 transition-transform duration-300">
                            <div class="flex items-center space-x-3">
                                <div class="bg-green-100 p-3 rounded-full">
                                    <i class="fas fa-wifi text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">High-Speed Internet</h3>
                                    <p class="text-sm text-gray-600">Uninterrupted connectivity</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Center Video Content -->
                <div class="md:col-span-1">
                    <div class="relative rounded-xl overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                        <video 
                            class="w-full h-auto" 
                            controls
                            autoplay
                            muted
                            loop
                            poster="{{ asset('Testimonials/withcer 3 Thumbnail.png') }}"
                        >
                            <source src="{{ asset('Testimonials/a-painting-landscape.3840x2160.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                            <p class="text-white text-sm">Experience our state-of-the-art facilities</p>
                        </div>
                    </div>
                </div>

                <!-- Right Side Interactive Content -->
                <div class="hidden md:block">
                    <div class="space-y-4">
                        <div class="bg-white p-6 rounded-xl shadow-md transform hover:scale-105 transition-transform duration-300">
                            <div class="flex items-center space-x-3">
                                <div class="bg-purple-100 p-3 rounded-full">
                                    <i class="fas fa-tv text-purple-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Smart Displays</h3>
                                    <p class="text-sm text-gray-600">Interactive presentation tools</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-md transform hover:scale-105 transition-transform duration-300">
                            <div class="flex items-center space-x-3">
                                <div class="bg-orange-100 p-3 rounded-full">
                                    <i class="fas fa-users text-orange-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Flexible Capacity</h3>
                                    <p class="text-sm text-gray-600">Rooms for teams of any size</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script>
    let scrollInterval;

    function startAutoScroll() {
        const testimonialContainer = document.querySelector('[x-ref="testimonialContainer"]');
        scrollInterval = setInterval(() => {
            testimonialContainer.scrollBy({ left: 300, behavior: 'smooth' });
            // Reset scroll to the start if it reaches the end
            if (testimonialContainer.scrollLeft + testimonialContainer.clientWidth >= testimonialContainer.scrollWidth) {
                testimonialContainer.scrollLeft = 0; // Reset to the start
            }
        }, 5000); // Adjust the interval time (5000ms = 5 seconds) as needed
    }

    function scrollTestimonials(direction) {
        const testimonialContainer = document.querySelector('[x-ref="testimonialContainer"]');
        const scrollAmount = 300; // Adjust this value as needed
        testimonialContainer.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }

    document.addEventListener('DOMContentLoaded', () => {
        startAutoScroll();

        const testimonialContainer = document.querySelector('[x-ref="testimonialContainer"]');
        testimonialContainer.addEventListener('mouseenter', () => {
            clearInterval(scrollInterval);
        });

        testimonialContainer.addEventListener('mouseleave', () => {
            startAutoScroll();
        });
    });
</script>
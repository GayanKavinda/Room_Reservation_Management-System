<!-- Hero Section -->
<section id="home" class="pt-36 pb-20 px-8" x-intersect="$el.classList.add('animate-fadeIn')">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div class="animate-slideInLeft">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-blue-800">Empower<br>Collaboration<br>with ICTA RoomBook</h1>
                <p class="text-lg text-slate-600 mb-8 leading-relaxed">A premium room booking platform by ICTA Sri Lanka, designed for seamless space management and innovation-driven meetings.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#rooms" class="bg-blue-600 text-white px-6 py-3 rounded-full text-sm font-medium hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl btn-hover-effect">
                        <i class="fas fa-search mr-2"></i>Explore Rooms
                    </a>
                    <a href="#about" class="border border-blue-600 text-blue-600 px-6 py-3 rounded-full text-sm font-medium hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <i class="fas fa-info-circle mr-2"></i>Learn More
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 mt-10">
                    <div class="text-center animate-fadeInUp animate-delay-100">
                        <div class="text-2xl font-bold text-blue-700">25+</div>
                        <div class="text-sm text-slate-600">Premium Rooms</div>
                    </div>
                    <div class="text-center animate-fadeInUp animate-delay-200">
                        <div class="text-2xl font-bold text-blue-700">100+</div>
                     <div class="text-sm text-slate-600">Daily Bookings</div>
                    </div>
                    <div class="text-center animate-fadeInUp animate-delay-300">
                        <div class="text-2xl font-bold text-blue-700">98%</div>
                        <div class="text-sm text-slate-600">Satisfaction</div>
                    </div>
                </div>
            </div>
            
            <div class="animate-slideInRight">
                <div class="relative">
                    <img src="{{ asset('Hero Section Illustration.png') }}" alt="Meeting room" class="rounded-2xl shadow-xl w-full h-auto relative z-10">
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-blue-100 rounded-full animate-spin-slow opacity-70"></div>
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-blue-200 rounded-full animate-spin-slow opacity-70"></div>
                </div>
            </div>
        </div>
    </section>
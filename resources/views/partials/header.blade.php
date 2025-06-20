<!-- Header -->
<header class="fixed top-0 w-full z-30 bg-white/90 backdrop-blur-md shadow-sm transition-all duration-300"
        x-data="{ scrolled: false, isOpen: false }"
        @scroll.window="scrolled = window.pageYOffset > 20"
        :class="{ 'py-2': scrolled, 'py-4': !scrolled }">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('gov_logo.png') }}" alt="ICTA Logo" class="h-8 w-auto object-contain">
            <div class="text-xl font-semibold tracking-tight">
                <span class="text-pink-600">ICTA Room</span> 
                <span class="text-gray-600">Reservations</span>
            </div>
        </div>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex items-center space-x-6 lg:space-x-8">
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#home').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">Home</a>
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#rooms').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">Rooms</a>
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#features').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">Features</a>
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#testimonials').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">Testimonials</a>
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#about').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">About ICTA</a>
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#contact').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">Contact</a>
            <a href="{{ route('login') }}" 
               @click="isOpen = false" 
               class="text-sm font-medium hover:text-blue-600 transition-colors flex items-center">
                <i class="fas fa-sign-in-alt mr-2"></i>Sign In
            </a>
            <a href="{{ route('register') }}" 
               @click="isOpen = false"
               class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-700 transition shadow-md">
                <i class="fas fa-user-plus mr-2"></i>Sign Up
            </a>
        </nav>

        <!-- Mobile Menu Button -->
        <div class="md:hidden pr-8">
            <button @click="isOpen = !isOpen" 
                    class="relative text-2xl text-blue-600 focus:outline-none w-12 h-12 flex items-center justify-center">
                <span class="sr-only">Menu</span>
                <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-200" 
                     :class="{'opacity-0': isOpen, 'opacity-100': !isOpen}">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-200" 
                     :class="{'opacity-100': isOpen, 'opacity-0': !isOpen}">
                    <i class="fas fa-times"></i>
                </div>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="absolute top-full left-0 right-0 md:hidden bg-white border-t border-gray-100 shadow-lg"
         @click.away="isOpen = false">
        <nav class="flex flex-col space-y-4 p-4">
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#home').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">Home</a>
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#rooms').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">Rooms</a>
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#features').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">Features</a>
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#testimonials').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">Testimonials</a>
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#about').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">About ICTA</a>
            <a href="javascript:void(0);" 
               @click.prevent="isOpen = false; document.querySelector('#contact').scrollIntoView({ behavior: 'smooth' })" 
               class="text-sm font-medium hover:text-blue-600 transition-colors">Contact</a>
            <a href="{{ route('login') }}" 
               @click="isOpen = false" 
               class="text-sm font-medium hover:text-blue-600 transition-colors flex items-center">
                <i class="fas fa-sign-in-alt mr-2"></i>Sign In
            </a>
            <a href="{{ route('register') }}" 
               @click="isOpen = false"
               class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-700 transition shadow-md text-center">
                <i class="fas fa-user-plus mr-2"></i>Sign Up
            </a>
        </nav>
    </div>
</header>

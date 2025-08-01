<!-- resources/views/layouts/landing.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Heroicons (for replacing Font Awesome) -->
        <script src="https://unpkg.com/@heroicons/v2/solid/index.js"></script>
        
        <!-- Alpine.js Plugins -->
        <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
        
        <!-- Alpine.js Core -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Animation Classes */
            .animate-fadeIn {
                animation: fadeIn 1s ease-in;
            }

            .animate-fadeInUp {
                animation: fadeInUp 1s ease-out;
            }

            .animate-slideInLeft {
                animation: slideInLeft 1s ease-out;
            }

            .animate-slideInRight {
                animation: slideInRight 1s ease-out;
            }

            /* Animation Keyframes */
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slideInLeft {
                from {
                    opacity: 0;
                    transform: translateX(-50px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes slideInRight {
                from {
                    opacity: 0;
                    transform: translateX(50px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            /* Animation Delays */
            .animation-delay-100 {
                animation-delay: 100ms;
            }

            .animation-delay-200 {
                animation-delay: 200ms;
            }

            .animation-delay-300 {
                animation-delay: 300ms;
            }

            /* Scroll Margin for Hash Navigation */
            section[id] {
                scroll-margin-top: 5rem;
            }

            /* Responsive Helpers */
            @media (max-width: 640px) {
                .mobile-p-4 {
                    padding: 1rem;
                }
                .mobile-text-sm {
                    font-size: 0.875rem;
                }
            }

            /* Main Topic Headings */
            .main-topic {
                font-family: 'Raleway', sans-serif;
                font-weight: 700;
                letter-spacing: -0.025em;
            }
        </style>
    </head>
    <body class="font-sans antialiased" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
        <div class="min-h-screen bg-gray-50">
            <!-- Navigation -->
            <nav class="fixed w-full z-50 transition-all duration-300" :class="{ 'bg-white/95 shadow backdrop-blur-sm': scrolled, 'bg-transparent': !scrolled }">
                @include('layouts.navigation')
            </nav>

            <!-- Main Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Footer -->
            @include('partials.footer')
        </div>

        <!-- Global Alpine.js Store -->
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('animation', {
                    sections: {},
                    shown(id) {
                        return this.sections[id] || false;
                    },
                    show(id) {
                        this.sections[id] = true;
                    }
                })
            })
        </script>
    </body>
</html> 
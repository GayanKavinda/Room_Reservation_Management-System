<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTA RoomBook - Premium Space Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine Plugins -->
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.12.0/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://unpkg.com/alpinejs@3.12.0/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        .animate-fadeIn {
            animation: fadeIn 1s ease-out forwards;
        }
        .animate-pulse {
            animation: pulse 2s infinite;
        }
        .animate-slideInLeft {
            animation: slideInLeft 0.8s ease-out forwards;
        }
        .animate-slideInRight {
            animation: slideInRight 0.8s ease-out forwards;
        }
        .animate-spin-slow {
            animation: spin 8s linear infinite;
        }
        .animate-delay-100 {
            animation-delay: 0.1s;
        }
        .animate-delay-200 {
            animation-delay: 0.2s;
        }
        .animate-delay-300 {
            animation-delay: 0.3s;
        }
        .animate-delay-400 {
            animation-delay: 0.4s;
        }
        .animate-delay-500 {
            animation-delay: 0.5s;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .room-card:hover .room-details {
            opacity: 1;
            transform: translateY(0);
        }
        .room-details {
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }
        .feature-icon {
            transition: transform 0.3s ease;
        }
        .feature-card:hover .feature-icon {
            transform: translateY(-5px);
        }
        .testimonial-card {
            transition: all 0.3s ease;
        }
        .testimonial-card:hover {
            transform: translateY(-5px);
        }
        .scroll-hidden::-webkit-scrollbar {
            display: none;
        }
        .scroll-hidden {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #2563eb;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .btn-hover-effect {
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .btn-hover-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
            z-index: -1;
        }
        .btn-hover-effect:hover::before {
            left: 0;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 text-slate-800 min-h-screen overflow-x-hidden" x-data="{ mobileMenu: false }">
    
    <!-- Header -->
    @include('partials.header')

    <!-- Hero Section -->
    @include('partials.hero')
    
    <!-- Featured Locations -->
    @include('partials.locations')

    <!-- Room Booking Section -->
    @include('partials.booking')

    <!-- Features Section -->
    @include('partials.features')

    <!-- Testimonials Section -->
    @include('partials.testimonials')

    <!-- About ICTA Section -->
    @include('partials.about')
    
    <!-- Partners Section -->
    @include('partials.partners')

    <!-- Contact Section -->
    @include('partials.contact')
    
     <!-- Footer -->
     @include('partials.footer')

    <!-- Alpine.js Booking System Component -->
    <script>
        function bookingSystem() {
            return {
                date: '',
                location: '',
                participants: '',
                roomType: '',
                showTimeSlots: false,
                selectedTimeSlot: null,
                availableTimeSlots: [
                    '09:00 AM',
                    '10:00 AM',
                    '11:00 AM',
                    '12:00 PM',
                    '01:00 PM',
                    '02:00 PM',
                    '03:00 PM',
                    '04:00 PM'
                ],
                filteredRooms: [],
                searchRooms() {
                    // Simulate API call
                    this.showTimeSlots = true;
                    this.filteredRooms = [
                        {
                            id: 1,
                            name: 'Executive Boardroom A',
                            location: 'Colombo HQ',
                            capacity: '10-15 people',
                            price: 'LKR 5,000/hour',
                            type: 'Meeting Room',
                            image: 'https://placehold.co/400x250',
                            features: ['4K Display', 'Video Conferencing', 'Whiteboard', 'Coffee Service'],
                            rating: '4.9',
                            reviews: '128',
                            description: 'Premium boardroom with panoramic city views and state-of-the-art facilities.'
                        },
                        {
                            id: 2,
                            name: 'Innovation Lab 1',
                            location: 'Digital Innovation Hub',
                            capacity: '15-20 people',
                            price: 'LKR 6,500/hour',
                            type: 'Training Space',
                            image: 'https://placehold.co/400x250',
                            features: ['Interactive Displays', 'AR/VR Equipment', 'Modular Furniture', 'Tech Support'],
                            rating: '4.8',
                            reviews: '96',
                            description: 'Flexible space designed for workshops and innovative collaboration sessions.'
                        },
                        {
                            id: 3,
                            name: 'Focus Pod C',
                            location: 'Colombo HQ',
                            capacity: '2-4 people',
                            price: 'LKR 2,500/hour',
                            type: 'Meeting Room',
                            image: '/api/placeholder/400/250',
                            features: ['HD Display', 'Sound Proofing', 'Ergonomic Seating', 'Climate Control'],
                            rating: '4.7',
                            reviews: '64',
                            description: 'Intimate meeting space perfect for focused discussions and small team meetings.'
                        }
                    ];
                },
                selectTimeSlot(slot) {
                    this.selectedTimeSlot = slot;
                },
                selectRoom(room) {
                    // Handle room selection
                    console.log('Selected room:', room);
                    // Redirect to booking confirmation page
                    // window.location.href = `/book/${room.id}`;
                }
            }
        }
    </script>
</body>
</html>
<!-- Room Booking Section -->
<section id="rooms" class="py-20 px-8 bg-white" x-data="bookingSystem()" x-intersect="$el.classList.add('animate-fadeIn')">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-4 text-blue-800 animate-fadeInUp">Book Your Space</h2>
            <p class="text-center text-slate-600 mb-12 max-w-2xl mx-auto animate-fadeInUp animate-delay-100">
                Find and reserve the perfect meeting space for your next collaboration, presentation, or team event
            </p>
            
            <div class="glass-card rounded-xl p-6 shadow-lg animate-fadeInUp animate-delay-200">
                <div class="grid md:grid-cols-4 gap-6">
                    <!-- Step 1: Select Date -->
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-slate-700">Date</label>
                        <input type="date" x-model="date" class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    
                    <!-- Step 2: Select Location -->
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-slate-700">Location</label>
                        <select x-model="location" class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select Location</option>
                            <option value="Colombo HQ">Colombo HQ</option>
                            <option value="Digital Innovation Hub">Digital Innovation Hub</option>
                            <option value="Regional Office Kandy">Regional Office Kandy</option>
                            <option value="Galle Innovation Center">Galle Innovation Center</option>
                            <option value="Jaffna Tech Hub">Jaffna Tech Hub</option>
                        </select>
                    </div>
                    
                    <!-- Step 3: Number of People -->
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-slate-700">Participants</label>
                        <select x-model="participants" class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select Capacity</option>
                            <option value="1-4">1-4 people</option>
                            <option value="5-8">5-8 people</option>
                            <option value="9-12">9-12 people</option>
                            <option value="13-20">13-20 people</option>
                            <option value="21+">21+ people</option>
                        </select>
                    </div>
                    
                    <!-- Step 4: Search Button -->
                    <div class="flex items-end">
                        <button @click="searchRooms" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition-all duration-300 shadow-md hover:shadow-lg btn-hover-effect">
                            <i class="fas fa-search mr-2"></i>Find Available Rooms
                        </button>
                    </div>
                </div>
                
                <!-- Time Slots Selection (shown after filtering) -->
                <div x-show="showTimeSlots" x-transition:enter="transition ease-out duration-300" 
                     x-transition:enter-start="opacity-0 transform -translate-y-4" 
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="mt-8 pt-6 border-t border-slate-200">
                    <h3 class="text-lg font-medium mb-4">Select Time Slot</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                        <template x-for="slot in availableTimeSlots">
                            <button 
                                @click="selectTimeSlot(slot)"
                                class="py-2 px-3 rounded-lg text-sm font-medium text-center transition-colors duration-200"
                                :class="selectedTimeSlot === slot ? 'bg-blue-600 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-800'"
                                x-text="slot">
                            </button>
                        </template>
                    </div>
                </div>
                
                <!-- Room Type Filter (additional filter) -->
                <div x-show="showTimeSlots" x-transition:enter="transition ease-out duration-300" 
                     x-transition:enter-start="opacity-0" 
                     x-transition:enter-end="opacity-100"
                     class="mt-6 pt-6 border-t border-slate-200">
                    <h3 class="text-lg font-medium mb-4">Room Type</h3>
                    <div class="flex flex-wrap gap-3">
                        <button @click="roomType = ''" class="py-2 px-4 rounded-lg text-sm font-medium"
                                :class="roomType === '' ? 'bg-blue-600 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-800'">
                            All Types
                        </button>
                        <button @click="roomType = 'Meeting Room'" class="py-2 px-4 rounded-lg text-sm font-medium"
                                :class="roomType === 'Meeting Room' ? 'bg-blue-600 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-800'">
                            Meeting Rooms
                        </button>
                        <button @click="roomType = 'Conference Hall'" class="py-2 px-4 rounded-lg text-sm font-medium"
                                :class="roomType === 'Conference Hall' ? 'bg-blue-600 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-800'">
                            Conference Halls
                        </button>
                        <button @click="roomType = 'Training Space'" class="py-2 px-4 rounded-lg text-sm font-medium"
                                :class="roomType === 'Training Space' ? 'bg-blue-600 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-800'">
                            Training Spaces
                        </button>
                        <button @click="roomType = 'Coworking Space'" class="py-2 px-4 rounded-lg text-sm font-medium"
                                :class="roomType === 'Coworking Space' ? 'bg-blue-600 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-800'">
                            Coworking Spaces
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Available Rooms (filtered by criteria) -->
            <div x-show="filteredRooms.length > 0" 
                 x-transition:enter="transition ease-out duration-500" 
                 x-transition:enter-start="opacity-0 transform translate-y-10" 
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 class="mt-12">
                <h3 class="text-2xl font-bold mb-8 text-blue-800">Available Rooms</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <template x-for="(room, index) in filteredRooms" :key="room.id">
                        <div class="room-card bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
                             :class="'animate-fadeInUp animate-delay-' + ((index % 5) + 1) + '00'">
                            <div class="relative">
                                <img :src="room.image" class="w-full h-56 object-cover" :alt="room.name">
                                <div class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    <span x-text="room.type"></span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h4 class="text-xl font-semibold" x-text="room.name"></h4>
                                    <span class="text-blue-600 font-medium" x-text="room.price"></span>
                                </div>
                                <div class="flex items-center text-slate-600 mb-2">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    <span x-text="room.location"></span>
                                </div>
                                <div class="flex items-center text-slate-600 mb-4">
                                    <i class="fas fa-users mr-2"></i>
                                    <span x-text="room.capacity"></span>
                                </div>
                                
                                <!-- Room Details (appears on hover) -->
                                <div class="room-details mt-4 pt-4 border-t border-slate-100">
                                    <h5 class="text-sm font-medium mb-2">Amenities</h5>
                                    <ul class="grid grid-cols-2 gap-y-2 gap-x-4 mb-4">
                                        <template x-for="feature in room.features">
                                            <li class="flex items-center text-sm text-slate-600">
                                                <i class="fas fa-check text-green-500 mr-2"></i>
                                                <span x-text="feature"></span>
                                            </li>
                                        </template>
                                    </ul>
                                    <p class="text-sm text-slate-600 mb-4" x-text="room.description"></p>
                                    <div class="flex items-center text-sm text-slate-600">
                                        <i class="fas fa-star text-yellow-400 mr-2"></i>
                                        <span x-text="room.rating + ' rating'"></span>
                                        <span class="mx-2">•</span>
                                        <i class="fas fa-comment text-blue-400 mr-2"></i>
                                        <span x-text="room.reviews + ' reviews'"></span>
                                    </div>
                                </div>
                                
                                <button @click="selectRoom(room)" class="w-full mt-4 bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition-all duration-300 btn-hover-effect">
                                    Book This Room
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>
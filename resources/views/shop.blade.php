<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Medical Equipment | EVOLVE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Navigation Bar (reused from homepage) -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-bold text-blue-600">EVOLVE</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                    <a href="{{ route('shop') }}" class="text-blue-600 font-medium">Products</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
                    <a href="#" class="relative text-gray-700 hover:text-blue-600">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-blue-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">0</span>
                    </a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="text-gray-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="bg-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Shop Medical Equipment</h1>
            <p class="text-lg text-blue-100">Browse our high-quality medical supplies and equipment</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Filters Section (Desktop only) -->
            <div class="hidden md:block w-64 flex-shrink-0">
                <div class="bg-white p-6 rounded-lg shadow-sm sticky top-28">
                    <h3 class="font-bold text-lg mb-4 text-gray-800">Filters</h3>
                    
                    <!-- Categories Filter -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-700 mb-3">Categories</h4>
                        <ul class="space-y-2">
                            <li>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded text-blue-600">
                                    <span class="ml-2 text-gray-600">Diagnostic Equipment</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded text-blue-600">
                                    <span class="ml-2 text-gray-600">Therapeutic Equipment</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded text-blue-600">
                                    <span class="ml-2 text-gray-600">Mobility Aids</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded text-blue-600">
                                    <span class="ml-2 text-gray-600">Surgical Instruments</span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded text-blue-600">
                                    <span class="ml-2 text-gray-600">Home Care Equipment</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Price Filter -->
                    <div>
                        <h4 class="font-semibold text-gray-700 mb-3">Price Range</h4>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-gray-600">$0</span>
                            <span class="text-sm text-gray-600">$1000+</span>
                        </div>
                        <input type="range" min="0" max="1000" class="w-full h-2 bg-blue-200 rounded-lg appearance-none cursor-pointer">
                    </div>
                    
                    <button class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition duration-300">
                        Apply Filters
                    </button>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="flex-1">
                <!-- Sorting Controls -->
                <div class="bg-white p-4 rounded-lg shadow-sm mb-6 flex flex-col sm:flex-row justify-between items-center">
                    <p class="text-gray-600 mb-2 sm:mb-0">Showing products</p>
                    <div class="flex items-center">
                        <label for="sort" class="mr-2 text-gray-600">Sort by:</label>
                        <select id="sort" class="border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option>Featured</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest Arrivals</option>
                            <option>Best Selling</option>
                        </select>
                    </div>
                </div>
                
                <!-- Products -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Product 1 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col">
                        <div class="bg-gray-200 h-48 flex items-center justify-center p-4">
                            <span class="text-gray-500 text-center">Portable Oxygen Concentrator Image</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">Portable Oxygen Concentrator</h3>
                            <p class="text-gray-600 text-sm mb-3">Lightweight and quiet, perfect for travel and home use</p>
                            <p class="text-blue-600 font-bold text-xl mb-4">$899.99</p>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    
                    <!-- Product 2 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col">
                        <div class="bg-gray-200 h-48 flex items-center justify-center p-4">
                            <span class="text-gray-500 text-center">Digital Blood Pressure Monitor Image</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">Digital Blood Pressure Monitor</h3>
                            <p class="text-gray-600 text-sm mb-3">Automatic arm cuff with large display and memory function</p>
                            <p class="text-blue-600 font-bold text-xl mb-4">$59.99</p>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    
                    <!-- Product 3 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col">
                        <div class="bg-gray-200 h-48 flex items-center justify-center p-4">
                            <span class="text-gray-500 text-center">Wheelchair Lightweight Image</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">Lightweight Wheelchair</h3>
                            <p class="text-gray-600 text-sm mb-3">Aluminum frame, foldable design with removable footrests</p>
                            <p class="text-blue-600 font-bold text-xl mb-4">$249.99</p>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    
                    <!-- Product 4 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col">
                        <div class="bg-gray-200 h-48 flex items-center justify-center p-4">
                            <span class="text-gray-500 text-center">Infrared Thermometer Image</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">Infrared Thermometer</h3>
                            <p class="text-gray-600 text-sm mb-3">Non-contact forehead measurement with instant results</p>
                            <p class="text-blue-600 font-bold text-xl mb-4">$39.99</p>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    
                    <!-- Product 5 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col">
                        <div class="bg-gray-200 h-48 flex items-center justify-center p-4">
                            <span class="text-gray-500 text-center">Nebulizer Machine Image</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">Compressor Nebulizer Machine</h3>
                            <p class="text-gray-600 text-sm mb-3">Quiet operation with adjustable mist control</p>
                            <p class="text-blue-600 font-bold text-xl mb-4">$79.99</p>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    
                    <!-- Product 6 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col">
                        <div class="bg-gray-200 h-48 flex items-center justify-center p-4">
                            <span class="text-gray-500 text-center">Hospital Bed Image</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">Adjustable Hospital Bed</h3>
                            <p class="text-gray-600 text-sm mb-3">Electric controls with side rails and mattress included</p>
                            <p class="text-blue-600 font-bold text-xl mb-4">$1,299.99</p>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                {{-- <div class="mt-10 flex justify-center">
                    <nav class="inline-flex rounded-md shadow-sm">
                        <a href="#" class="px-3 py-1 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-blue-600 font-medium">
                            1
                        </a>
                        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            2
                        </a>
                        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            3
                        </a>
                        <span class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-500">
                            ...
                        </span>
                        <a href="#" class="px-3 py-1 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            8
                        </a>
                        <a href="#" class="px-3 py-1 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div> --}}

            </div>
        </div>
    </div>

    <!-- Mobile Filters Button -->
    <div class="md:hidden fixed bottom-6 right-6">
        <button class="bg-blue-600 text-white p-4 rounded-full shadow-lg hover:bg-blue-700 transition duration-300">
            <i class="fas fa-filter text-xl"></i>
        </button>
    </div>

    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Column 1 -->
                <div>
                    <h3 class="text-xl font-bold mb-4">EVOLVE</h3>
                    <p class="text-gray-400">Providing high-quality medical equipment and supplies for healthcare professionals and home care.</p>
                </div>
                
                <!-- Column 2 -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Products</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Column 3 -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3"></i>
                            <span>Dar es salaam & opened branch Dodoma Ilazo</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3"></i>
                            <span><a href="tel:+255654741975">+255 654 741 975</a> / <a href="tel:+255628767852">+255 628 767 852</a></span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3"></i>
                            <span><a href="mailto:evolvemedics@gmail.com">evolvemedics@gmail.com</a></span>
                        </li>
                    </ul>
                </div>
                
                <!-- Column 4 -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/share/16Nzwvpm4d/" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/evolvemedics?igsh=Mml5ajlsejRzMWJt" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-pink-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>Developed By <a href="https://simonsoftware.xyz" target="_blank">Sam Software</a>.</p>
                <p>&copy; 2025 EVOLVE Medical Equipment. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
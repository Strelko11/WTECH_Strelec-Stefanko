<nav class="fixed top-0 left-0 w-full bg-gray-900 text-white shadow-md py-4 px-6 md:py-6 md:px-8 lg:py-8 lg:px-12 flex justify-between items-center z-50">
    <a href="{{ route('welcome') }}" id="company" class="text-xl font-semibold flex items-center">
        <i class="fas fa-globe mr-2"></i> TechSphere
    </a>

    <!-- Search Input on larger screens -->
    <form action="{{ route('adminObrazovka') }}" method="GET" class="w-1/2 hidden sm:flex items-center">
        <input type="text" name="search"
               value="{{ request('search') }}"
               placeholder="Vyhľadať produkt..."
               class="w-full px-4 py-2 border border-gray-400 rounded-lg text-white bg-gray-800 placeholder-gray-400 focus:outline-none"
        >

        <!-- Hidden fields to keep filters when searching -->
        <input type="hidden" name="type" value="{{ request('type') }}">
        <input type="hidden" name="category" value="{{ request('category') }}">
        <input type="hidden" name="price" value="{{ request('price') }}">

        <button type="submit" class="ml-2 bg-gray-600 hover:bg-gray-800 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-search"></i>
        </button>
    </form>

    <div class="flex space-x-4">
        <!-- Magnifying Glass Icon on smaller screens (optional toggle) -->
        <button class="sm:hidden text-white text-xl">
            <i class="fas fa-search"></i>
        </button>

        <!-- Shopping Cart -->
        <a href="{{ route('kosikView') }}" class="text-white text-xl hover:scale-105 transition-transform">
            <i class="fas fa-shopping-cart"></i>
        </a>

        <!-- User Dropdown -->
        <div class="relative group inline-block">
            <button class="text-white text-xl focus:outline-none">
                <i class="fas fa-user"></i>
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-200 border border-gray-300 z-50">
                <div class="px-4 py-3 text-sm text-black">
                    <div>Meno používateľa</div>
                    <div class="font-medium truncate">E-mail používateľa</div>
                </div>
                <a href="{{ route('loginForm') }}" class="block px-4 py-2 hover:bg-gray-300 rounded-t-lg">Prihlásiť sa</a>
                <a href="{{ route('adminObrazovka') }}" class="block px-4 py-2 hover:bg-gray-300">Admin</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-300 rounded-b-lg">Odhlásiť sa</a>
            </div>
        </div>
    </div>
</nav>

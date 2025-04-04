<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSphere</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        @vite(['resources/css/app.css'])
        <script src="{{ mix('resources/js/app.js') }}" defer></script>


</head>
<body class="flex flex-col min-h-screen bg-gray-100">

    <div class="flex-grow">
        <nav class="fixed top-0 left-0 w-full bg-gray-900 text-white shadow-md py-4 px-6 flex justify-between items-center z-50">
            <a href="{{ route('welcome') }}" id="company" class="text-xl font-semibold flex items-center">
                <i class="fas fa-globe mr-2"></i> TechSphere
            </a>
            <input type="text" class="w-1/2 px-4 py-2 border rounded-lg  text-white " placeholder="Search...">
            <div class="flex space-x-4">
                <a href="{{ route('kosikView') }}" class="text-white text-xl hover:scale-105 transition-transform"><i class="fas fa-shopping-cart"></i></a>

                <div class="relative group inline-block">
                    <button class="text-white text-xl focus:outline-none">
                        <i class="fas fa-user"></i>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg
                    opacity-0 invisible group-hover:visible group-hover:opacity-100
                    transition-all duration-200 border border-gray-300 z-50">
                        <div class="px-4 py-3 text-sm text-black">
                            <div>Meno používateľa</div>
                            <div class="font-medium truncate">E-mail používateľa</div>
                        </div>
                        <a href="{{ route('loginForm') }}" class="block px-4 py-2 hover:bg-gray-300 rounded-t-lg">Prihlásiť sa</a>
                        <a href="{{ route('adminObrazovka') }}" class="block px-4 py-2 hover:bg-gray-300">Admin</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-300 rounded-b-lg">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="w-full max-w-[80%] h-auto mx-auto px-4 py-10 border-l border-r border-gray-400 custom-shadow mt-22 flex items-center justify-center rounded-md bg-gray-100">
            <form class="bg-gray-200 p-6 rounded-lg shadow-md w-full max-w-md border border-gray-400">
                <h2 class="text-2xl font-bold mb-4 text-center text-gray-900">Zaregistrovať sa</h2>

                <!-- Meno -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-900 font-medium">Meno</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>

                <!-- Priezvisko -->
                <div class="mb-4">
                    <label for="surname" class="block text-gray-900 font-medium">Priezvisko</label>
                    <input type="text" id="surname" name="surname" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>

                <!-- E-mail -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-900 font-medium">E-mail</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>

                <!-- Telefónne číslo -->
                <div class="mb-4">
                    <label for="phone_number" class="block text-gray-900 font-medium">Telefónne číslo</label>
                    <input type="tel" id="phone_number" name="phone_number" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>

                <!-- Heslo -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-900 font-medium">Heslo</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>

                <!-- Potvrdenie hesla -->
                <div class="mb-4">
                    <label for="password_confirm" class="block text-gray-900 font-medium">Potvrď heslo</label>
                    <input type="password" id="password_confirm" name="password_confirm" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>

                <!-- Potvrdiť -->
                <button type="submit" class="w-3/5 bg-gray-600 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg mt-6 transition mx-auto block">
                    Potvrdiť
                </button>
            </form>
        </div>



    </div>


    <footer class="text-center py-4 bg-gray-900 mt-6 border-t  text-white">
        <p>&copy; 2025 TechSphere. Všetky práva vyhradené.</p>
    </footer>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



</body>
</html>

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
        <nav class="fixed top-0 left-0 w-full bg-white shadow-md py-4 px-6 flex justify-between items-center z-50">
            <a href="{{ route('welcome') }}" class="text-xl font-semibold flex items-center">
                <i class="fas fa-globe mr-2"></i> TechSphere
            </a>
            <input type="text" class="w-1/2 px-4 py-2 border rounded-lg" placeholder="Search...">
            <div class="flex space-x-4">
                <a href="{{ route('kosikView') }}" class="text-gray-700 text-xl"><i class="fas fa-shopping-cart"></i></a>

                <div class="relative group">

                    <button class="text-gray-700 text-xl focus:outline-none">
                        <i class="fas fa-user"></i>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 border custom-shadow">
                        <div class="px-4 py-3 text-sm text-black  ">
                            <div>Meno používateľa</div>
                            <div class="font-medium truncate">E-mail používateľa</div>
                          </div>
                        <a href="{{ route('loginForm') }}" class="block px-4 py-2 hover:bg-gray-200 rounded-t-lg">Prihlásiť sa</a>
                        <a href="{{ route('adminObrazovka') }}" class="block px-4 py-2 hover:bg-gray-200">Admin</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200 rounded-b-lg">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>

    <div class="w-full max-w-[60%] h-auto mx-auto px-4 py-10 border-l border-r border-gray-400 custom-shadow mt-22 flex items-center justify-center rounded-md">
        <form class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4 text-center">Prihlásiť sa</h2>


            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Meno</label>
                <input type="name" id="name" name="name"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="surname" class="block text-gray-700 font-medium">Priezvisko</label>
                <input type="surname" id="surname" name="surname"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="e-mail" class="block text-gray-700 font-medium">E-mail</label>
                <input type="e-mail" id="email" name="email"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 font-medium">Telefónne číslo</label>
                <input type="phone_number" id="phone_number" name="phone_number"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Heslo</label>
                <input type="password" id="password" name="password"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Potvrď heslo</label>
                <input type="password" id="password_confirm" name="password_confirm"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>


            <button type="submit" class="w-3/5 bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg mt-6 transition mx-auto block">
                Potvrdiť
            </button>



        </form>


    </div>



    </div>


    <footer class="text-center py-4 bg-gray-200 mt-6 border-t">
        <p>&copy; 2025 TechSphere. Všetky práva vyhradené.</p>
    </footer>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



</body>
</html>

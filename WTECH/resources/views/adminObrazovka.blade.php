<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSphere</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="flex flex-col min-h-screen bg-gray-100">



    <div class="flex-grow">

    <nav class="fixed top-0 left-0 w-full bg-gray-900 text-white shadow-md py-4 px-6 flex justify-between items-center z-50">
            <a href="{{ route('welcome') }}" id="company" class="text-xl font-semibold flex items-center">
                <i class="fas fa-globe mr-2"></i> TechSphere Admin
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




    <div class="flex flex-wrap justify-center gap-6 pt-28 pb-8 bg-gray-100 p-6 rounded-lg shadow-none">


        <div class="flex flex-col items-center">
            <label for="priceFilter" class="text-lg font-semibold text-gray-900 mb-2">Typ zariadenia</label>
            <select id="priceFilter" class="px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-900 hover:bg-gray-300">
                <option value="all">Všetky typy</option>
                <option value="low">Telefón</option>
                <option value="mid">Tablet</option>
            </select>
        </div>


        <div class="flex flex-col items-center">
            <label for="seriesFilter" class="text-lg font-semibold text-gray-900 mb-2">Značka</label>
            <select id="seriesFilter" class="px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-900 hover:bg-gray-300">
                <option value="all">Všetky značky</option>
                <option value="iphone-16">iPhone</option>
                <option value="samsung-s24">Samsung</option>
                <option value="xiaomi-15">Xiaomi</option>
            </select>
        </div>


        <div class="flex flex-col items-center">
            <label for="storageFilter" class="text-lg font-semibold text-gray-900 mb-2">Cena</label>
            <select id="storageFilter" class="px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-900 hover:bg-gray-300">
                <option value="all">Všetky ceny</option>
                <option value="high">Najdrahšie</option>
                <option value="low">Najlacnejšie</option>
                <option value="400">do 400 €</option>
                <option value="700">do 700 €</option>
                <option value="1000">nad 1000 €</option>
            </select>
        </div>


        <div>
            <button id="addProduct" class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-800 flex justify-center  w-[150px]"
                    onclick="window.location.href='/pridajProdukt';">
                Pridať produkt
            </button>
        </div>

    </div>


    </div>

    <div class="w-full max-w-[90%] mx-auto px-4 py-8 border-l border-r border-gray-400 custom-shadow rounded-md bg-gray-100">
        <div class="flex flex-wrap justify-center gap-6">
            <a href="{{ route('produktView') }}" class="w-full sm:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col sm:flex-row items-center shadow-md w-full min-w-[280px] h-auto gap-4 border border-gray-400 hover:bg-gray-400 transition duration-300">
                    <div class="flex space-x-4">
                        <div class="h-28 w-28 bg-white border border-gray-400 rounded overflow-hidden ">
                            <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110"></div>
                        </div>
                        <div class="h-28 w-28 bg-white border border-gray-400 rounded">
                            <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110"></div>
                        </div>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-6 flex flex-col text-center sm:text-left text-gray-900 text-base sm:text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex flex-wrap justify-center sm:justify-start gap-2 w-full">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-2 sm:ml-4">RAM: 8GB</span>
                        </div>
                        <div class="w-full flex flex-wrap justify-center sm:justify-end mt-4 gap-2">
                            <button onclick="window.location.href='/upravProdukt';" class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 w-28">
                                Upraviť
                            </button>
                            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 w-28">
                                Vymazať
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('produktView') }}" class="w-full sm:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col sm:flex-row items-center shadow-md w-full min-w-[280px] h-auto gap-4 border border-gray-400 hover:bg-gray-400 transition duration-300">
                    <div class="flex space-x-4">
                        <div class="h-28 w-28 bg-white border border-gray-400 rounded overflow-hidden ">
                            <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110"></div>
                        </div>
                        <div class="h-28 w-28 bg-white border border-gray-400 rounded">
                            <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110"></div>
                        </div>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-6 flex flex-col text-center sm:text-left text-gray-900 text-base sm:text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex flex-wrap justify-center sm:justify-start gap-2 w-full">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-2 sm:ml-4">RAM: 8GB</span>
                        </div>
                        <div class="w-full flex flex-wrap justify-center sm:justify-end mt-4 gap-2">
                            <button onclick="window.location.href='/upravProdukt';" class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 w-28">
                                Upraviť
                            </button>
                            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 w-28">
                                Vymazať
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('produktView') }}" class="w-full sm:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col sm:flex-row items-center shadow-md w-full min-w-[280px] h-auto gap-4 border border-gray-400 hover:bg-gray-400 transition duration-300">
                    <div class="flex space-x-4">
                        <div class="h-28 w-28 bg-white border border-gray-400 rounded overflow-hidden ">
                            <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110"></div>
                        </div>
                        <div class="h-28 w-28 bg-white border border-gray-400 rounded">
                            <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110"></div>
                        </div>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-6 flex flex-col text-center sm:text-left text-gray-900 text-base sm:text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex flex-wrap justify-center sm:justify-start gap-2 w-full">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-2 sm:ml-4">RAM: 8GB</span>
                        </div>
                        <div class="w-full flex flex-wrap justify-center sm:justify-end mt-4 gap-2">
                            <button onclick="window.location.href='/upravProdukt';" class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 w-28">
                                Upraviť
                            </button>
                            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 w-28">
                                Vymazať
                            </button>
                        </div>
                    </div>
                </div>
            </a>

          

        </div>
    </div>







    </div>


    <footer class="text-center py-4 bg-gray-900 mt-6 border-t  text-white">
        <p>&copy; 2025 TechSphere. Všetky práva vyhradené.</p>
    </footer>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        document.querySelectorAll("button").forEach(button => {
            button.addEventListener("click", function(event) {
                event.stopPropagation();
                event.preventDefault();
            });
        });
    </script>
</body>
</html>

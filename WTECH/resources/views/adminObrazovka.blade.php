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
    <!-- 🔹 Navigačný panel -->
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md py-4 px-6 flex justify-between items-center z-50 ">
        <a href="{{ route('welcome') }}" class="text-xl font-semibold flex items-center">
            <i class="fas fa-globe mr-2"></i> TechSphere Admin
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
                        <div>Meno Admina</div>
                        <div class="font-medium truncate">E-mail Admina</div>
                      </div>
                    <a href="{{ route('loginForm') }}" class="block px-4 py-2 hover:bg-gray-200 rounded-t-lg">Prihlásiť sa</a>
                    <a href="{{ route('adminObrazovka') }}" class="block px-4 py-2 hover:bg-gray-200">Admin</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-200 rounded-b-lg">Sign out</a>
                </div>
            </div>
        </div>
    </nav>




    <div class="flex flex-wrap justify-center gap-6  pt-28 pb-8">

        <div>
            <label for="priceFilter" class="text-lg font-semibold">Typ zariadenia</label>
            <select id="priceFilter" class="px-4 py-2 border rounded-lg">
                <option value="all">Všetky typy</option>
                <option value="low">Telefón</option>
                <option value="mid">Tablet</option>
            </select>
        </div>


        <div>
            <label for="seriesFilter" class="text-lg font-semibold">Značka:</label>
            <select id="seriesFilter" class="px-4 py-2 border rounded-lg">
                <option value="all">Všeky značky</option>
                <option value="iphone-16">iPhone</option>
                <option value="samsung-s24">Samsung</option>
                <option value="xiaomi-15">Xiaomi</option>
            </select>
        </div>

        
        <div>
            <label for="storageFilter" class="text-lg font-semibold">Cena:</label>
            <select id="storageFilter" class="px-4 py-2 border rounded-lg">
                <option value="all">Všetky ceny</option>
                <option value="64">Najdrahšie</option>
                <option value="64">Najlacnejšie</option>
                <option value="64">do 400 €</option>
                <option value="128">do 700 €</option>
                <option value="256">nad 1000 €</option>
            </select>
        </div>
        <div>
            <button id="addProduct" class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-500 flex justify-center w-[150]"
                    onclick="window.location.href='/pridajProdukt';">
                Pridať produkt
            </button>
        </div>


    </div>

    <div class="w-full max-w-[90%] mx-auto px-6 py-10 border-l border-r border-gray-400 custom-shadow rounded-md">
        <div class="flex flex-wrap justify-center gap-10">
            <a href="{{ route('produktView') }}" class="w-full md:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col md:flex-row items-center shadow-md w-full min-w-[300px] h-auto gap-4">
                    <div class="flex space-x-4">
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                    </div>
                    <div class="ml-6 flex flex-col text-center md:text-left text-black text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex justify-center md:justify-start w-full">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-4">RAM: 8GB</span>
                        </div>
                        <div class="w-full flex justify-center md:justify-end mt-4 gap-2">
                            <button onclick="window.location.href='/upravProdukt';" id="editButton" class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-500 flex justify-center w-[120px]">
                                Upraviť
                            </button>
                            <button id="deleteButton" class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-500 flex justify-center w-[120px]">
                                Vymazať
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('produktView') }}" class="w-full md:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col md:flex-row items-center shadow-md w-full min-w-[300px] h-auto gap-4">
                    <div class="flex space-x-4">
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                    </div>
                    <div class="ml-6 flex flex-col text-center md:text-left text-black text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex justify-center md:justify-start w-full">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-4">RAM: 8GB</span>
                        </div>
                        <div class="w-full flex justify-center md:justify-end mt-4 gap-2">
                            <button onclick="window.location.href='/upravProdukt';" id="editButton" class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-500 flex justify-center w-[120px]">
                                Upraviť
                            </button>
                            <button id="deleteButton" class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-500 flex justify-center w-[120px]">
                                Vymazať
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('produktView') }}" class="w-full md:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col md:flex-row items-center shadow-md w-full min-w-[300px] h-auto gap-4">
                    <div class="flex space-x-4">
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                    </div>
                    <div class="ml-6 flex flex-col text-center md:text-left text-black text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex justify-center md:justify-start w-full">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-4">RAM: 8GB</span>
                        </div>
                        <div class="w-full flex justify-center md:justify-end mt-4 gap-2">
                            <button onclick="window.location.href='/upravProdukt';" id="editButton" class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-500 flex justify-center w-[120px]">
                                Upraviť
                            </button>
                            <button id="deleteButton" class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-500 flex justify-center w-[120px]">
                                Vymazať
                            </button>
                        </div>
                    </div>
                </div>
            </a>



        </div>
    </div>







    </div>


    <footer class="text-center py-4 bg-gray-200 mt-6 border-t">
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

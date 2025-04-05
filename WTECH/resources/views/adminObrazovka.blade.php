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

   @include('navbar')




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
            <a href="{{ route('produktView') }}" class="w-full sm:w-1/2 md:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col sm:flex-row items-center border border-gray-400 shadow-md w-full h-auto gap-4 hover:bg-gray-400 transition duration-300">

                    <div class="flex justify-center sm:justify-start w-full sm:w-auto">
                        <div class="h-28 w-28 max-w-full bg-white border border-gray-400 rounded overflow-hidden">
                            <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110"></div>
                        </div>
                    </div>

                    <div class="mt-4 sm:mt-0 sm:ml-6 flex flex-col items-center sm:items-start text-center sm:text-left text-gray-900 text-base sm:text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex flex-wrap justify-center sm:justify-start gap-2 w-full mt-1">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-2 sm:ml-4">RAM: 8GB</span>
                        </div>

                        <div class="w-full flex flex-wrap justify-center sm:justify-end mt-4 gap-2">
                            <button onclick="window.location.href='/upravProdukt';"
                                    class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 w-28">
                                Upraviť
                            </button>
                            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-800 w-28">
                                Vymazať
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('produktView') }}" class="w-full sm:w-1/2 md:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col sm:flex-row items-center border border-gray-400 shadow-md w-full h-auto gap-4 hover:bg-gray-400 transition duration-300">

                    <div class="flex justify-center sm:justify-start w-full sm:w-auto">
                        <div class="h-28 w-28 max-w-full bg-white border border-gray-400 rounded overflow-hidden">
                            <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110"></div>
                        </div>
                    </div>

                    <div class="mt-4 sm:mt-0 sm:ml-6 flex flex-col items-center sm:items-start text-center sm:text-left text-gray-900 text-base sm:text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex flex-wrap justify-center sm:justify-start gap-2 w-full mt-1">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-2 sm:ml-4">RAM: 8GB</span>
                        </div>

                        <div class="w-full flex flex-wrap justify-center sm:justify-end mt-4 gap-2">
                            <button onclick="window.location.href='/upravProdukt';"
                                    class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 w-28">
                                Upraviť
                            </button>
                            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-800 w-28">
                                Vymazať
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('produktView') }}" class="w-full sm:w-1/2 md:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col sm:flex-row items-center border border-gray-400 shadow-md w-full h-auto gap-4 hover:bg-gray-400 transition duration-300">

                    <div class="flex justify-center sm:justify-start w-full sm:w-auto">
                        <div class="h-28 w-28 max-w-full bg-white border border-gray-400 rounded overflow-hidden">
                            <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110"></div>
                        </div>
                    </div>

                    <div class="mt-4 sm:mt-0 sm:ml-6 flex flex-col items-center sm:items-start text-center sm:text-left text-gray-900 text-base sm:text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex flex-wrap justify-center sm:justify-start gap-2 w-full mt-1">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-2 sm:ml-4">RAM: 8GB</span>
                        </div>

                        <div class="w-full flex flex-wrap justify-center sm:justify-end mt-4 gap-2">
                            <button onclick="window.location.href='/upravProdukt';"
                                    class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 w-28">
                                Upraviť
                            </button>
                            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-800 w-28">
                                Vymazať
                            </button>
                        </div>
                    </div>
                </div>
            </a>



        </div>
    </div>







    </div>


    @include('footer')
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

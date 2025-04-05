<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSphere</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/slider.js'])

</head>

<body class="flex flex-col min-h-screen bg-gray-100">

    <div class="flex-grow">

        @include('navbar')

        <div class="w-full mt-18 border-b border-gray-400 shadow-md px-4 pt-15 pb-5 bg-gray-100">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4">
                <div class="col-span-1 sm:col-span-2 lg:col-span-8">
                    <h1 class="text-4xl font-bold text-gray-900">Prinášame budúcnosť technológií do vašich rúk.</h1>
                    <p class="mt-2 text-gray-700 text-lg sm:text-xl">Najnovšie smartfóny a tablety za skvelé ceny. Rýchle
                        doručenie, spoľahlivosť a odborné poradenstvo. Vyberte si to najlepšie ešte dnes.</p>
                </div>
                <div class="col-span-1 sm:col-span-2 lg:col-span-4 flex justify-center bg-white h-40 w-40 rounded-lg border border-gray-400">
                    <img src="https://static.vecteezy.com/system/resources/previews/022/722/945/non_2x/samsung-galaxy-s23-ultra-transparent-image-free-png.png"
                        alt="">
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center gap-6 my-6 bg-gray-100 p-6 border-0 rounded-lg shadow-none">
            <div class="flex flex-col items-center w-full max-w-md">
                <label class="text-lg font-semibold mb-2 text-gray-900">Cena:</label>

                <div id="hs-pass-values-to-inputs" class="w-full --prevent-on-load-init" data-hs-range-slider='{
                    "start": [250, 750],
                    "range": { "min": 0, "max": 2000 },
                    "connect": true,
                    "tooltips": true,
                    "formatter": "integer"
                }'></div>
                <div class="flex flex-col sm:flex-row justify-center space-x-0 sm:space-x-4 mt-5">
                    <div class="w-full sm:w-40">
                        <label for="hs-pass-values-to-inputs-min-target" class="block text-sm font-medium mb-2 text-center text-gray-900">Min. cena:</label>
                        <input id="hs-pass-values-to-inputs-min-target" type="number" value="250" class="w-full border border-gray-400 rounded-lg px-4 py-2 text-center bg-white text-gray-900">
                    </div>
                    <div class="w-full sm:w-40">
                        <label for="hs-pass-values-to-inputs-max-target" class="block text-sm font-medium mb-2 text-center text-gray-900">Max. cena:</label>
                        <input id="hs-pass-values-to-inputs-max-target" type="number" value="750" class="w-full border border-gray-400 rounded-lg px-4 py-2 text-center bg-white text-gray-900">
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-6">
                <div class="flex flex-col items-center">
                    <label for="seriesFilter" class="text-lg font-semibold mb-2 text-gray-900">Séria:</label>
                    <select id="seriesFilter" class="px-4 py-2 border border-gray-400 rounded-lg text-center bg-white text-gray-900 hover:bg-gray-300">
                        <option value="all">Všetky série</option>
                        <option value="iphone-16">iPhone 16</option>
                        <option value="samsung-s24">iPhone 15</option>
                        <option value="xiaomi-15">iPhone 14</option>
                    </select>
                </div>

                <div class="flex flex-col items-center">
                    <label for="storageFilter" class="text-lg font-semibold mb-2 text-gray-900">Úložisko:</label>
                    <select id="storageFilter" class="px-4 py-2 border border-gray-400 rounded-lg text-center bg-white text-gray-900 hover:bg-gray-300">
                        <option value="all">Všetky kapacity</option>
                        <option value="64">64 GB</option>
                        <option value="128">128 GB</option>
                        <option value="256">256 GB</option>
                        <option value="512">512 GB</option>
                        <option value="1tb">1 TB</option>
                    </select>
                </div>

                <div class="flex flex-col items-center">
                    <label for="ramFilter" class="text-lg font-semibold mb-2 text-gray-900">RAM:</label>
                    <select id="ramFilter" class="px-4 py-2 border border-gray-400 rounded-lg text-center bg-white text-gray-900 hover:bg-gray-300">
                        <option value="all">Všetky veľkosti</option>
                        <option value="4">4 GB</option>
                        <option value="6">6 GB</option>
                        <option value="8">8 GB</option>
                        <option value="12">12 GB</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="w-full max-w-[90%] mx-auto px-6 py-10 border-l border-r border-gray-400 custom-shadow rounded-md bg-gray-100">
            <h4 class="text-2xl font-bold mb-10 text-gray-900">Telefóny iPhone</h4>
            <div class="flex flex-wrap justify-center gap-10">
                <!-- Product Card -->
                <a href="{{ route('produktView') }}" class="w-full sm:w-1/2 md:w-4/5">
                    <div class="bg-gray-300 p-4 rounded-lg flex flex-col md:flex-row items-center border border-gray-400 shadow-md w-full h-auto gap-4 hover:bg-gray-400 transition duration-300">
                        <div class="flex space-x-4">
                            <div class="h-38 w-38 bg-white border border-gray-400 rounded overflow-hidden">
                                <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-center md:items-start text-center md:text-left text-gray-900 text-lg w-full">

                            <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                            <span>Séria: 16</span>
                            <span>Cena: 1449 €</span>
                            <div class="flex justify-center md:justify-start w-full">
                                <span>Pamäť: 256GB</span>
                                <span class="ml-4">RAM: 8GB</span>
                            </div>
                            <div class="w-full flex justify-center md:justify-end mt-4">
                                <button id="buyButton" class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-800 flex justify-center w-full sm:w-[120px]">
                                    Kúpiť
                                </button>
                            </div>
                        </div>

                    </div>
                </a>
                <a href="{{ route('produktView') }}" class="w-full sm:w-1/2 md:w-4/5">
                    <div class="bg-gray-300 p-4 rounded-lg flex flex-col md:flex-row items-center border border-gray-400 shadow-md w-full  h-auto gap-4 hover:bg-gray-400 transition duration-300">
                        <div class="flex space-x-4">
                            <div class="h-38 w-38 bg-white border border-gray-400 rounded overflow-hidden">
                                <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110">
                                </div>
                            </div>
                        </div>
                        <div class=" flex flex-col items-center md:items-start text-center md:text-left text-gray-900 text-lg w-full">
                            <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                            <span>Séria: 16</span>
                            <span>Cena: 1449 €</span>
                            <div class="flex justify-center md:justify-start w-full">
                                <span>Pamäť: 256GB</span>
                                <span class="ml-4">RAM: 8GB</span>
                            </div>
                            <div class="w-full flex justify-center md:justify-end mt-4">
                                <button id="buyButton" class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-800 flex justify-center w-full sm:w-[120px]">
                                    Kúpiť
                                </button>
                            </div>
                        </div>

                    </div>
                </a>
                <a href="{{ route('produktView') }}" class="w-full sm:w-1/2 md:w-4/5">
                    <div class="bg-gray-300 p-4 rounded-lg flex flex-col md:flex-row items-center border border-gray-400 shadow-md w-full h-auto gap-4 hover:bg-gray-400 transition duration-300">
                        <div class="flex space-x-4">
                            <div class="h-38 w-38 bg-white border border-gray-400 rounded overflow-hidden">
                                <div class="h-full w-full bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col text-center md:text-left text-gray-900 text-lg w-full">
                            <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                            <span>Séria: 16</span>
                            <span>Cena: 1449 €</span>
                            <div class="flex justify-center md:justify-start w-full">
                                <span>Pamäť: 256GB</span>
                                <span class="ml-4">RAM: 8GB</span>
                            </div>
                            <div class="w-full flex justify-center md:justify-end mt-4">
                                <button id="buyButton" class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-800 flex justify-center w-full sm:w-[120px]">
                                    Kúpiť
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
            button.addEventListener("click", function (event) {
                event.stopPropagation();
                event.preventDefault();
            });
        });
    </script>
</body>

</html>

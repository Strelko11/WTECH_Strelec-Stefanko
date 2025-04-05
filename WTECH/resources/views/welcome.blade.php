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

<body class="flex flex-col min-h-screen bg-gray-50">

    <div class="flex-grow">

        @include('navbar')

        <!-- 🔹 Hlavná sekcia -->
        <div class="w-full mt-[100px] border-b border-gray-400 shadow-md px-4 sm:px-10 py-6 bg-gray-100">
            <div class="grid sm:grid-cols-12 grid-cols-1 gap-4 items-center">
                <div class="sm:col-span-8">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900">Prinášame budúcnosť technológií
                        do vašich rúk.</h1>
                    <p class="mt-2 text-gray-700 text-base sm:text-lg md:text-xl">Najnovšie smartfóny a tablety za
                        skvelé ceny. Rýchle doručenie, spoľahlivosť a odborné poradenstvo. Vyberte si to najlepšie ešte
                        dnes.</p>
                </div>
                <div class="sm:col-span-4 flex justify-center">
                    <img src="https://static.vecteezy.com/system/resources/previews/022/722/945/non_2x/samsung-galaxy-s23-ultra-transparent-image-free-png.png"
                        alt="Samsung S23"
                        class="w-32 sm:w-40 object-contain rounded-lg border border-gray-400 bg-white" />
                </div>
            </div>
        </div>

        <!-- 🔹 Telefóny -->
        <div
            class="w-full max-w-[90%] mx-auto px-6 py-10 border-l border-r border-gray-500 custom-shadow mt-4 rounded-md bg-gray-100">
            <h4 class="text-2xl font-bold mb-10 text-gray-900">Telefóny</h4>
            <div class="flex flex-wrap justify-center gap-10 max-w-[100%] mx-auto">
                <!-- Iphone -->
                <a href="{{ route('strankaProdukty') }}"
                    class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-full max-w-[380px] h-40 border border-gray-400 hover:text-black hover:scale-105 transition-all duration-300 ease-in-out">
                    <div
                        class="h-38 w-38 rounded bg-white bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center">
                    </div>
                    <span class="text-2xl text-center">Iphone</span>
                </a>

                <!-- Samsung -->
                <a href="{{ route('strankaProdukty') }}"
                    class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-full max-w-[380px] h-40 border border-gray-400 hover:text-black hover:scale-105 transition-all duration-300 ease-in-out">
                    <div
                        class="h-38 w-38 rounded bg-white bg-[url('https://s7d1.scene7.com/is/image/dish/S25_Icyblue_Hero_P1?$ProductBase$&fmt=webp-alpha')] bg-contain bg-no-repeat bg-center">
                    </div>
                    <span class="text-2xl text-center">Samsung</span>
                </a>

                <!-- Xiaomi -->
                <a href="{{ route('strankaProdukty') }}"
                    class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-full max-w-[380px] h-40 border border-gray-400 hover:text-black hover:scale-105 transition-all duration-300 ease-in-out">
                    <div
                        class="h-38 w-38 rounded bg-white bg-[url('https://www.geekwills.com/media/catalog/product/cache/d368225e56c0af8fed569f12698f474d/x/i/xiaomi_15.png')] bg-contain bg-no-repeat bg-center">
                    </div>
                    <span class="text-2xl text-center">Xiaomi</span>
                </a>
            </div>

            <h4 class="text-2xl font-bold mt-6 mb-10 text-gray-900">Tablety</h4>
            <div class="flex flex-wrap justify-center gap-10 max-w-[100%] mx-auto">
                <!-- iPad -->
                <a href="{{ route('strankaProdukty') }}"
                    class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-full max-w-[380px] h-40 border border-gray-400 hover:text-black hover:scale-105 transition-all duration-300 ease-in-out">
                    <div
                        class="h-38 w-38 rounded bg-white bg-[url('https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/ipad-2022-hero-silver-wifi-select_FMT_WHH?wid=940&hei=1112&fmt=png-alpha&.v=1664387253605')] bg-contain bg-no-repeat bg-center">
                    </div>
                    <span class="text-2xl text-center">iPad</span>
                </a>

                <!-- Galaxy Tab -->
                <a href="{{ route('strankaProdukty') }}"
                    class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-full max-w-[380px] h-40 border border-gray-400 hover:text-black hover:scale-105 transition-all duration-300 ease-in-out">
                    <div
                        class="h-38 w-38 rounded bg-white bg-[url('https://crdms.images.consumerreports.org/prod/products/cr/models/415678-9-inch-screen-and-larger-tablets-samsung-galaxy-tab-s10-ultra-256gb-wifi-10041162.png')] bg-contain bg-no-repeat bg-center">
                    </div>
                    <span class="text-2xl text-center">Galaxy Tab</span>
                </a>

                <!-- Xiaomi Pad -->
                <a href="{{ route('strankaProdukty') }}"
                    class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-full max-w-[380px] h-40 border border-gray-400 hover:text-black hover:scale-105 transition-all duration-300 ease-in-out">
                    <div
                        class="h-38 w-38 rounded bg-white bg-[url('https://i02.appmifile.com/73_operatorx_operatorx_opx/21/05/2024/9da572f0718c2baa9421143d9e848b48.png')] bg-contain bg-no-repeat bg-center">
                    </div>
                    <span class="text-2xl text-center">Xiaomi Pad</span>
                </a>
            </div>

        </div>
    </div>

    @include('footer')

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
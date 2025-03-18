<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="flex flex-col min-h-screen bg-gray-100">



    <div class="flex-grow  ">
    <!-- 🔹 Navigačný panel -->
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <a href="{{ route('welcome') }}" class="text-xl font-semibold flex items-center">
            <i class="fas fa-globe mr-2"></i> TechSphere
        </a>
        <input type="text" class="w-1/2 px-4 py-2 border rounded-lg" placeholder="Search...">
        <div class="flex space-x-4">
            <a href="#" class="text-gray-700 text-xl"><i class="fas fa-shopping-cart"></i></a>
            <a href="#" class="text-gray-700 text-xl"><i class="fas fa-user"></i></a>
        </div>
    </nav>

    <!-- 🔹 Hlavná sekcia -->
    <div class="w-full mt-24 border-b border-gray-400 shadow-md px-15  pt-15 pb-5 ">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-8">
                <h1 class="text-4xl font-bold">Prinášame budúcnosť technológií do vašich rúk.</h1>
                <p class="mt-2 text-gray-600 text-xl ">Najnovšie smartfóny a tablety za skvelé ceny. Rýchle doručenie, spoľahlivosť a odborné poradenstvo. Vyberte si to najlepšie ešte dnes.</p>
            </div>
            <div class="col-span-4 flex justify-center  bg-gray-300 h-40 w-40 rounded-lg">
                <img src="https://static.vecteezy.com/system/resources/previews/022/722/945/non_2x/samsung-galaxy-s23-ultra-transparent-image-free-png.png" alt="">
            </div>
        </div>
    </div>

    <div class="w-full max-w-[90%] mx-auto px-6 py-10 border-l border-r   border-gray-400 custom-shadow ">
        <h4 class="text-2xl font-bold mb-10">Telefóny</h4>
        <div class="flex flex-wrap justify-center gap-10">
            <a href="strankaProdukty" ><div class="bg-gray-200 p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[400px] h-40 ">
                <div class=" h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center"></div>
                <span class="text-2xl">iPhone</span>
            </div></a>
            <a href="strankaProdukty"><div class="bg-gray-200 p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[400px] h-40">
                <div class=" h-35 w-35 bg-[url('https://s7d1.scene7.com/is/image/dish/S25_Icyblue_Hero_P1?$ProductBase$&fmt=webp-alpha')] bg-contain bg-no-repeat bg-center"></div>

                <span class="text-2xl">Samsung</span>
            </div></a>
            <a href="strankaProdukty"><div class="bg-gray-200 p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[400px] h-40">
                <div class=" h-38 w-38 bg-[url('https://www.geekwills.com/media/catalog/product/cache/d368225e56c0af8fed569f12698f474d/x/i/xiaomi_15.png')] bg-contain bg-no-repeat bg-center"></div>

                <span class="text-2xl">Xiaomi</span>
            </div></a>
        </div>

        <h4 class="text-2xl font-bold mt-6 mb-10">Tablety</h4>
        <div class="flex flex-wrap justify-center gap-10">
            <a href="strankaProdukty"><div class="bg-gray-200 p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[400px] h-40">
                <div class=" h-40 w-40 bg-[url('https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/ipad-2022-hero-silver-wifi-select_FMT_WHH?wid=940&hei=1112&fmt=png-alpha&.v=1664387253605')] bg-contain bg-no-repeat bg-center"></div>
                <span class="text-2xl">iPad</span>
            </div></a>
            <a href="strankaProdukty"><div class="bg-gray-200 p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[400px] h-40">
                <div class=" h-38 w-38 bg-[url('https://crdms.images.consumerreports.org/prod/products/cr/models/415678-9-inch-screen-and-larger-tablets-samsung-galaxy-tab-s10-ultra-256gb-wifi-10041162.png')] bg-contain bg-no-repeat bg-center"></div>
                <span class="text-2xl">Galaxy Tab</span>
            </div></a>
            <a href="strankaProdukty"><div class="bg-gray-200 p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[400px] h-40">
                <div class=" h-38 w-38 bg-[url('https://i02.appmifile.com/73_operatorx_operatorx_opx/21/05/2024/9da572f0718c2baa9421143d9e848b48.png')] bg-contain bg-no-repeat bg-center"></div>

                <span class="text-2xl">Xiaomi Pad</span>
            </div></a>

        </div>
    </div>



</div>


    <footer class="text-center py-4 bg-gray-200 mt-6 border-t">
        <p>&copy; 2025 TechSphere. Všetky práva vyhradené.</p>
    </footer>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>

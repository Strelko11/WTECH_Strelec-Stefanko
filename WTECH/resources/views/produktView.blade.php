<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSphere</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ mix('resources/js/app.js') }}" defer></script>
    <script src="{{ mix('resources/js/produktCounter.js') }}" defer></script>


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

    <div class="w-full max-w-[90%] mx-auto px-4 py-10 border-l border-r border-gray-400 custom-shadow mt-22 rounded-md">
        <div class="flex flex-col md:flex-row gap-6 items-start">
            <div class="w-full md:w-1/2 flex flex-col items-center">
                <div class="cursor-pointer relative h-80 md:h-96 bg-white flex items-center justify-center rounded-lg border-2 overflow-hidden w-full">
                    <img id="main-image" src="https://image.alza.cz/products/RI051c4/RI051c4.jpg?width=2000&height=2000"
                        alt="Fotka produktu"
                        class="w-full h-full object-contain cursor-pointer fade-slide active"
                        onclick="openGallery()">
                </div>
                <div class="flex gap-2 md:gap-4 mt-4 justify-center">
                    <div class="w-16 md:w-20 h-12 md:h-16 bg-white rounded-lg flex items-center justify-center">
                        <img src="https://image.alza.cz/products/RI051c4/RI051c4.jpg?width=2000&height=2000"
                            class="max-w-full max-h-full cursor-pointer object-contain"
                            onclick="changeImage(0)">
                    </div>
                    <div class="w-16 md:w-20 h-12 md:h-16 bg-white rounded-lg flex items-center justify-center">
                        <img src="https://image.alza.cz/products/RI051c4/RI051c4-01.jpg?width=2000&height=2000"
                            class="max-w-full max-h-full cursor-pointer object-contain"
                            onclick="changeImage(1)">
                    </div>
                    <div class="w-16 md:w-20 h-12 md:h-16 bg-white rounded-lg flex items-center justify-center">
                        <img src="https://image.alza.cz/products/RI051c4/RI051c4-02.jpg?width=1400&height=1400"
                            class="max-w-full max-h-full cursor-pointer object-contain"
                            onclick="changeImage(2)">
                    </div>
                    <div class="w-16 md:w-20 h-12 md:h-16 bg-white rounded-lg flex items-center justify-center">
                        <img src="https://image.alza.cz/products/RI051c4/RI051c4-03.jpg?width=1400&height=1400"
                            class="max-w-full max-h-full cursor-pointer object-contain"
                            onclick="changeImage(3)">
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex flex-col gap-4 items-center text-center">
                <div class="bg-gray-300 rounded-lg p-4 text-2xl font-bold w-full">
                    iPhone 16 Pro 256 GB – Púštny Titán
                </div>

                <div class="bg-gray-300 rounded-lg p-4 text-lg w-full">
                    <p>Mobilný telefón – 6,3" Super Retina XDR OLED 2622 × 1206 (120 Hz), operačná pamäť 8 GB, vnútorná pamäť 256 GB, single SIM + eSIM, procesor Apple A18 Pro, fotoaparát: 48 Mpx (f/1,78) hlavný + 48 Mpx širokouhlý + 12 Mpx teleobjektív, predná kamera 12 Mpx, GPS, NFC, LTE, 5G, USB-C, vodoodolný podľa IP68, rýchle nabíjanie, bezdrôtové nabíjanie 25 W, batéria 3582 mAh, model 2024, iOS</p>
                </div>
                <div class="flex gap-4 w-full">
                    <div class="bg-gray-300 rounded-lg p-4 text-lg font-semibold w-1/3 md:w-1/4 text-center">
                        1 299 €
                    </div>
                    <div class="quantity-container ml-auto">
                        <button class="quantity-btn" id="decrease">−</button>
                        <input type="text" id="quantity" value="1" readonly>
                        <button class="quantity-btn" id="increase">+</button>
                    </div>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-lg font-semibold px-6 py-3 rounded-lg ml-auto w-2/3 md:w-1/4">
                        Do košíka
                    </button>

                </div>
                <div class="bg-gray-300 rounded-lg p-4 text-lg w-full">
                    <p>Na sklade > 5 ks</p>
                </div>
            </div>
        </div>
    </div>

    <div id="gallery-modal" class="fixed top-0 left-0 w-full h-full bg-gray-300 bg-opacity-80 flex items-center justify-center z-50 p-4">
        <div class="relative flex flex-col items-center max-w-[90%] max-h-[90vh]  bg-white p-4 rounded-lg shadow-lg w-[700px] md:w-[800px] lg:w-[900px]">
            <img id="gallery-image" src="" class="w-auto max-w-full max-h-[70vh] object-contain fade-slide active">
            <div id="image-counter" class="mt-2 bg-black text-white px-4 py-1 rounded-lg text-sm">
                1 / 4
            </div>
            <button onclick="prevImage()"
                class="absolute left-4 md:left-[5%] top-1/2 transform -translate-y-1/2 bg-gray-200 hover:bg-gray-300 text-black p-3 rounded-full shadow-lg z-50">
                <i class="fas fa-chevron-left"></i>
            </button>

            <button onclick="nextImage()"
                class="absolute right-4 md:right-[5%] top-1/2 transform -translate-y-1/2 bg-gray-200 hover:bg-gray-300 text-black p-3 rounded-full shadow-lg z-50">
                <i class="fas fa-chevron-right"></i>
            </button>
            <button onclick="closeGallery()"
                class="absolute top-2 right-2 bg-red-600 hover:bg-red-500 text-white p-2 rounded-full shadow-lg">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="w-full max-w-[90%] mx-auto px-4 py-6 border-l border-r border-gray-400 custom-shadow mt-6 rounded-md">
        <h2 class="text-2xl font-bold mb-4">Technické parametre</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Displej</h3>
                <p><strong>Uhlopriečka:</strong> 6,3" (16 cm)</p>
                <p><strong>Rozlíšenie:</strong> 2622 × 1206</p>
                <p><strong>Typ:</strong> Super Retina XDR OLED</p>
                <p><strong>Obnovovacia frekvencia:</strong> 120 Hz</p>
                <p><strong>Jemnosť displeja:</strong> 460 PPI</p>
                <p><strong>Svietivosť:</strong> 2 000 Nits</p>
                <p><strong>HDR:</strong> HDR 10+</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Fotoaparát</h3>
                <p><strong>Hlavný zadný fotoaparát:</strong> 48 Mpx (f/1,78)</p>
                <p><strong>Širokouhlý fotoaparát:</strong> 48 Mpx (f/2,2)</p>
                <p><strong>Teleobjektív:</strong> 12 Mpx (f/2,8)</p>
                <p><strong>Predný fotoaparát:</strong> 12 Mpx (f/1,9)</p>
                <p><strong>Optický zoom:</strong> 5×</p>
                <p><strong>Stabilizácia:</strong> Optická</p>
                <p><strong>Max. rozlíšenie videa:</strong> 4K (3840 × 2160)</p>
                <p><strong>Podporované FPS:</strong> 30/60/120 fps</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Výkon a pamäť</h3>
                <p><strong>Procesor:</strong> Apple A18 Pro</p>
                <p><strong>Počet jadier:</strong> 6×</p>
                <p><strong>Operačná pamäť (RAM):</strong> 8 GB</p>
                <p><strong>Vnútorná pamäť:</strong> 256 GB</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Batéria a nabíjanie</h3>
                <p><strong>Kapacita:</strong> 3 582 mAh</p>
                <p><strong>Bezdrôtové nabíjanie:</strong> 25 W</p>
                <p><strong>Rýchle nabíjanie:</strong> Áno</p>
                <p><strong>MagSafe:</strong> Podporované</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Odolnosť a konštrukcia</h3>
                <p><strong>Materiál:</strong> Titán</p>
                <p><strong>Vodoodolnosť:</strong> IP68</p>
                <p><strong>Rozmery:</strong> 149,6 × 71,5 × 8,25 mm</p>
                <p><strong>Hmotnosť:</strong> 199 g</p>
                <p><strong>Farba:</strong> Bronzová</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Konektivita a senzory</h3>
                <p><strong>SIM:</strong> Single SIM + eSIM</p>
                <p><strong>Bezdrôtové technológie:</strong> Bluetooth 5.3, GPS, NFC, WiFi</p>
                <p><strong>Mobilné siete:</strong> 5G, LTE (4G)</p>
                <p><strong>Konektory:</strong> USB-C</p>
                <p><strong>Senzory:</strong> Barometer, Gyroskop, Akcelerometer, Senzor priblíženia</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Softvér a funkcie</h3>
                <p><strong>Operačný systém:</strong> iOS 18</p>
                <p><strong>AI funkcie:</strong> Textový asistent, Tvorba poznámok, Vyhľadávanie podľa obrázka/textu</p>
                <p><strong>Funkcie:</strong> Odomykanie tvárou, Rýchle nabíjanie, MagSafe, Podpora MMS</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Obsah balenia</h3>
                <p><strong>Príslušenstvo:</strong> Nabíjací kábel USB-C na USB-C</p>
                <p><strong>Bez nabíjacieho adaptéra:</strong> Nutné dokúpiť zvlášť</p>
            </div>
        </div>
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

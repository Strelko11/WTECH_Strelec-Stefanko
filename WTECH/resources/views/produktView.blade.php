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
    <script src="{{mix('resources/js/produktCounter.js') }}" defer></script>



</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <div class="flex-grow">
       @include('navbar')

    <div class="w-full max-w-[90%] mx-auto px-4 py-10 border-l border-r border-gray-400 custom-shadow mt-22 rounded-md">
        <div class="flex flex-col md:flex-row gap-6 items-start">
            <div class="w-full md:w-1/2 flex flex-col items-center">
                <div class="cursor-pointer relative h-80 md:h-96 bg-white flex items-center justify-center rounded-lg  overflow-hidden w-full border border-gray-400" >
                    <img id="main-image" src="{{ $product->images->first()
                    ? Storage::url($product->images->first()->image_url)
                    : asset('default.jpg') }}"
                     alt="Fotka produktu" class="w-full h-full object-contain cursor-pointer fade-slide active" onclick="openGallery()">
                </div>
                <div class="flex gap-2 md:gap-4 mt-4 justify-center">
                    @foreach($product->images as $index => $image)
                    <div class="w-16 md:w-20 h-12 md:h-16 bg-white rounded-lg flex items-center justify-center border border-gray-400">
                        <img  src="{{ Storage::url($image->image_url) }}" class="max-w-full max-h-full cursor-pointer object-contain" onclick="changeImage({{ $index }})">
                    </div>
                @endforeach
                </div>
            </div>
            <div class="w-full md:w-1/2 flex flex-col gap-4 items-center text-center">
                <div class="bg-gray-200 rounded-lg border border-gray-400 p-4 text-2xl font-bold w-full">
                    {{ $product->name }}
                </div>

                <div class="bg-gray-200 rounded-lg p-4 border border-gray-400 text-lg w-full">
                    <p>{{ $product->description }}</p>
                </div>

                <div class="flex flex-wrap gap-4 w-full justify-center md:justify-start">

                    <div id="total-price"  class="bg-gray-200 rounded-lg p-4 text-lg border border-gray-400 font-semibold w-full sm:w-[350px] md:w-[300px] lg:w-[200px] text-center" data-unit-price="{{ $product->price }}">
                        {{ number_format($product->price, 2, ',', ' ') }} €
                    </div>


                    <div class="quantity-container flex items-center gap-4 w-full sm:w-[350px] md:w-[300px] lg:w-[200px]">
                        <button class="quantity-btn bg-gray-200 border-gray-400 p-2 rounded-full w-12 h-12 text-xl" id="decrease">−</button>
                        <input type="text" id="quantity" value="1" readonly class="text-center w-[50px] sm:w-[60px] bg-white border border-gray-400 rounded-lg text-lg font-semibold">
                        <button class="quantity-btn bg-gray-200 border-gray-400 p-2 rounded-full w-12 h-12 text-xl" id="increase">+</button>
                    </div>


                @auth
                        @if (Auth::user()->role === 'admin')
                        <div class="bg-gray-400 border border-gray-500 text-white text-lg font-semibold px-6 py-3 rounded-lg w-full sm:w-[250px] md:w-[300px] lg:w-[210px] text-center cursor-not-allowed">
                        Administrátor nemôže pridávať do košíka
                        </div>
                    @else
                <form method="POST" action="{{ route('cart.add', $product->id) }}">
                    @csrf
                    <input type="hidden" name="quantity" id="quantity-input" value="1">
                    <button type="submit" class="bg-gray-600 hover:bg-gray-800 border border-gray-400 text-white text-lg font-semibold px-6 py-3 rounded-lg w-full sm:w-[250px] md:w-[300px] lg:w-[210px]">
                    Do košíka
                    </button>
                    </form>
                    @endif
                @else
            <form method="POST" action="{{ route('cart.add', $product->id) }}">
        @csrf
        <input type="hidden" name="quantity" id="quantity-input" value="1">
        <button type="submit" class="bg-gray-600 hover:bg-gray-800 border border-gray-400 text-white text-lg font-semibold px-6 py-3 rounded-lg w-full sm:w-[250px] md:w-[300px] lg:w-[210px]">
            Do košíka
        </button>
        </form>
        @endauth



                    <div class="bg-gray-200 rounded-lg p-4 border border-gray-400 text-lg w-full text-center">
                        <p>Na sklade > 5 ks</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="gallery-modal"
     class="fixed inset-0 z-50 p-4 bg-gray-300 bg-opacity-80 items-center justify-center
            opacity-0 scale-95 pointer-events-none transition-all duration-300 flex">
    <div class="relative flex flex-col items-center max-w-[90%] max-h-[90vh] bg-white p-4 rounded-lg shadow-lg w-[700px] md:w-[800px] lg:w-[900px]">
        <img id="gallery-image" src="" class="w-auto max-w-full max-h-[70vh] object-contain fade-slide active">
        <div id="image-counter" class="mt-2 bg-black text-white px-4 py-1 rounded-lg text-sm">
            1 / 4
        </div>
        <button onclick="prevImage()"
                class="absolute left-4 md:left-[5%] top-1/2  bg-gray-200 hover:bg-gray-300 text-black p-3 rounded-full shadow-lg z-50">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button onclick="nextImage()"
                class="absolute right-4 md:right-[5%] top-1/2  bg-gray-200 hover:bg-gray-300 text-black p-3 rounded-full shadow-lg z-50">
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
                <p><strong>Uhlopriečka:</strong> {{ $product->display_size }}"</p>
                <p><strong>Rozlíšenie:</strong> {{ $product->display_resolution }}</p>
                <p><strong>Typ:</strong> {{ $product->display_type }}</p>
                <p><strong>Obnovovacia frekvencia:</strong> {{ $product->refresh_rate }} Hz</p>
            </div>

            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Fotoaparát</h3>
                <p><strong>Hlavný zadný fotoaparát:</strong> {{ $product->camera_main_mp }} Mpx</p>
                <p><strong>Širokouhlý fotoaparát:</strong> {{ $product->camera_ultrawide_mp }} Mpx</p>
                <p><strong>Teleobjektív:</strong> {{ $product->camera_telephoto_mp }} Mpx</p>
                <p><strong>Predný fotoaparát:</strong> {{ $product->camera_front_mp }} Mpx</p>
            </div>

            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Výkon a pamäť</h3>
                <p><strong>Procesor:</strong> {{ $product->processor }}</p>
                <p><strong>Operačná pamäť (RAM):</strong> {{ $product->ram }} GB</p>
                <p><strong>Vnútorná pamäť:</strong> {{ $product->storage }} GB</p>
            </div>

            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Batéria a nabíjanie</h3>
                <p><strong>Kapacita batérie:</strong> {{ $product->battery_mah }} mAh</p>
                <p><strong>Bezdrôtové nabíjanie:</strong> {{ $product->wireless_charging ? 'Áno' : 'Nie' }}</p>
                <p><strong>Výkon nabíjania:</strong> {{ $product->charging_power_watts }} W</p>
            </div>

            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Odolnosť a konštrukcia</h3>
                <p><strong>Vodoodolnosť:</strong> {{ $product->waterproof_rating ?? 'Neuvedené' }}</p>
                <p><strong>Hmotnosť:</strong> 200 g</p>
            </div>

            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Konektivita a senzory</h3>
                <p><strong>SIM typ:</strong> {{ $product->sim_type }}</p>
                <p><strong>5G:</strong> {{ $product->_5g ? 'Áno' : 'Nie' }}</p>
                <p><strong>LTE:</strong> {{ $product->lte ? 'Áno' : 'Nie' }}</p>
                <p><strong>GPS:</strong> {{ $product->gps ? 'Áno' : 'Nie' }}</p>
                <p><strong>NFC:</strong> {{ $product->nfc ? 'Áno' : 'Nie' }}</p>
                <p><strong>USB-C:</strong> {{ $product->usb_c ? 'Áno' : 'Nie' }}</p>
            </div>

            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Softvér a funkcie</h3>

                <p><strong>Operačný systém:</strong> {{ $product->os }}</p>
                <p><strong>Rok vydania:</strong> {{ $product->release_year }}</p>
            </div>

            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">Obsah balenia</h3>
                <p><strong>Príslušenstvo:</strong> Nabíjací kábel USB-C na USB-C</p>
                <p><strong>Nabíjací adaptér:</strong> Nie je súčasťou balenia</p>
            </div>
        </div>
    </div>
    </div>

    </div>


    @include('footer')

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        window.galleryImages = @json($product->images
          ->pluck('image_url')
          ->map(fn($path) => Storage::url($path)));
    </script>



</body>
</html>

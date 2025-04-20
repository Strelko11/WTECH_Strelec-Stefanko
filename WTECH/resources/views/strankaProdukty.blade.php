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

        <div class="flex flex-col items-center justify-center gap-6 my-6 bg-gray-100 p-6 border-0 rounded-lg shadow-none">
            <form method="GET" action="{{ route('zKategorie', ['category' => $category]) }}" class="w-full flex flex-col items-center gap-6 my-6 bg-gray-100 p-6 rounded-lg shadow-none">

                <div class="flex flex-col items-center w-full max-w-md">
                    <label class="text-lg font-semibold mb-2 text-gray-900">Cena:</label>

                    <div id="hs-pass-values-to-inputs" class="w-full" data-hs-range-slider='{
                        "start": [{{ request('min', default: 0) }}, {{ request('max', 1500) }}],
                        "range": { "min": 0, "max": 2000 },
                        "connect": true,
                        "tooltips": true,
                        "formatter": "integer"
                    }'></div>
                    <div class="flex flex-col sm:flex-row justify-center space-x-0 sm:space-x-4 mt-5 w-full">
                        <div class="w-full sm:w-40">
                            <label for="hs-pass-values-to-inputs-min-target" class="block text-sm font-medium mb-2 text-center text-gray-900">Min. cena:</label>
                            <input
                                name="min"
                                id="hs-pass-values-to-inputs-min-target"
                                type="number"
                                value="{{ request('min', 0) }}"
                                class="w-full border border-gray-400 rounded-lg px-4 py-2 text-center bg-white text-gray-900">
                        </div>
                        <div class="w-full sm:w-40">
                            <label for="hs-pass-values-to-inputs-max-target" class="block text-sm font-medium mb-2 text-center text-gray-900">Max. cena:</label>
                            <input
                                name="max"
                                id="hs-pass-values-to-inputs-max-target"
                                type="number"
                                value="{{ request('max', 1500) }}"
                                class="w-full border border-gray-400 rounded-lg px-4 py-2 text-center bg-white text-gray-900">
                        </div>
                    </div>
                </div>

                <button type="submit" class="bg-gray-600 hover:bg-gray-800 text-white px-6 py-2 rounded shadow mt-4">
                    Filtrovať
                </button>



            <div class="flex flex-wrap justify-center gap-6">
                <div class="flex flex-col items-center">
                    <label for="sort" class="text-lg font-semibold mb-2 text-gray-900">Podľa ceny:</label>
                    <select name="sort" id="sort" class="px-4 py-2 border border-gray-400 rounded-lg text-center bg-white text-gray-900 hover:bg-gray-300">
                        <option value="">Všetky ceny</option>
                        <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Ceny vzostupne</option>
                        <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Ceny zostupne</option>
                    </select>
                </div>
                <div class="flex flex-col items-center">
                    <label for="seriesFilter" class="text-lg font-semibold mb-2 text-gray-900">Séria:</label>
                    <select name="series" id="seriesFilter" class="px-4 py-2 border border-gray-400 rounded-lg text-center bg-white text-gray-900 hover:bg-gray-300">
                        <option value="">Všetky série</option>
                        @foreach ($seriesList as $series)
                            <option value="{{ $series }}" {{ request('series') == $series ? 'selected' : '' }}>
                                {{ $series }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col items-center">
                    <label for="storageFilter" class="text-lg font-semibold mb-2 text-gray-900">Úložisko:</label>
                    <select name="storage" id="storageFilter" class="px-4 py-2 border border-gray-400 rounded-lg text-center bg-white text-gray-900 hover:bg-gray-300">
                        <option value="">Všetky kapacity</option>
                        @foreach ($storageList as $storage)
                            <option value="{{ $storage }}" {{ request('storage') == $storage ? 'selected' : '' }}>
                                {{ $storage }} GB
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col items-center">
                    <label for="ramFilter" class="text-lg font-semibold mb-2 text-gray-900">RAM:</label>
                    <select name="ram" id="ramFilter" class="px-4 py-2 border border-gray-400 rounded-lg text-center bg-white text-gray-900 hover:bg-gray-300">
                        <option value="">Všetky veľkosti</option>
                        @foreach ($ramList as $ram)
                            <option value="{{ $ram }}" {{ request('ram') == $ram ? 'selected' : '' }}>
                                {{ $ram }} GB
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        </div>

        <div class="w-full max-w-[90%] mx-auto px-6 py-10 border-l border-r border-gray-400 custom-shadow rounded-md bg-gray-100">
            <h4 class="text-xl font-bold mb-10 text-gray-900">Produkty kategórie {{ ucfirst($category) }}</h4>
            <div class="flex flex-wrap justify-center gap-10">
                <!-- Product Card -->
                @foreach ($products as $product)
                <a href="{{ route('produktView', ['id' => $product->id]) }}" class="w-full sm:w-1/2 md:w-4/5">
                    <div class="bg-gray-300 p-4 rounded-lg flex flex-col md:flex-row items-center border border-gray-400 shadow-md w-full h-auto gap-4 hover:bg-gray-400 transition duration-300">
                        <div class="flex space-x-4">
                            <div class="h-38 w-38 bg-white border border-gray-400 rounded overflow-hidden p-2">
                                <div class="h-full w-full bg-[url('{{ $product->images->first()->image_url ?? 'https://via.placeholder.com/150' }}')] bg-contain bg-no-repeat bg-center transition-transform duration-300">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-center md:items-start text-center md:text-left text-gray-900 text-lg w-full">
                            <span class="font-bold">{{ $product->name }}</span>
                            <span>Séria: {{ $product->series }}</span>
                            <span>Cena: {{ $product->price }} €</span>
                            <div class="flex justify-center md:justify-start w-full">
                                <span>Pamäť: {{ $product->storage }}GB</span>
                                <span class="ml-4">RAM: {{ $product->ram }}GB</span>
                            </div>
                            <div class="w-full flex justify-center md:justify-end mt-4">
                                <button class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-800 flex justify-center w-full sm:w-[120px]">
                                    Kúpiť
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="mt-10 flex justify-center">
            {{ $products->links() }}
        </div>
    </div>

    @include('footer')

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>

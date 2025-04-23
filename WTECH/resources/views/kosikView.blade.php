<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Sphere</title>


    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ mix('resources/js/produktCounter.js') }}" defer></script>

</head>

<body class="flex-grow bg-gray-50">


    @include('navbar')



    <div class="max-w-4xl mx-auto mt-12 px-4">
        <h2 class="text-2xl font-bold mb-6">Košík</h2>

        @if($successMessage)
    <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">{{ $successMessage }}</div>
@endif

@forelse($cart as $id => $item)
    @if(isset($item['name'], $item['price'], $item['quantity'], $item['image']) &&
        !is_null($item['name']) && !is_null($item['price']) && !is_null($item['quantity'])))
        <div class="flex flex-col md:flex-row items-center border-b border-gray-300 py-4">
            <img src="{{ asset('storage/' . $item['image']) }}" alt="Produkt" class="w-24 h-24 object-contain rounded">
            <div class="md:ml-6 flex-grow text-center md:text-left">
                <h3 class="text-lg font-semibold">{{ $item['name'] }}</h3>
                <p class="text-gray-700">Cena: {{ number_format($item['price'], 2, ',', ' ') }} €</p>
                <p>Množstvo: {{ $item['quantity'] }}</p>
                <p>Spolu: {{ number_format($item['price'] * $item['quantity'], 2, ',', ' ') }} €</p>
            </div>
        </div>
    @endif
@empty
    <p>Košík je prázdny.</p>
@endforelse



        <div class="mt-6">
            <a href="{{ route('dorucenie&platba') }}"
                class="bg-gray-600 text-white px-6 py-3 rounded hover:bg-gray-800">
                Pokračovať k objednávke
            </a>
        </div>
    </div>



    <div class="flex items-center justify-center min-h-screen px-4">
        <div
            class="w-full max-w-4xl mx-auto py-10 px-6 bg-white rounded-lg custom-shadow mt-8 border-l border-r border-gray-500">
            <form action="{{ route('dorucenie&platba') }}" method="GET" class="space-y-6">
                <div class="flex items-center">
                    <label for="meno" class="w-32 text-sm font-medium text-gray-700">Meno</label>
                    <input type="text" id="meno" name="meno"
                        class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex items-center">
                    <label for="priezvisko" class="w-32 text-sm font-medium text-gray-700">Priezvisko</label>
                    <input type="text" id="priezvisko" name="priezvisko"
                        class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex items-center">
                    <label for="email" class="w-32 text-sm font-medium text-gray-700">E-mail</label>
                    <input type="email" id="email" name="email"
                        class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex items-center">
                    <label for="telefon" class="w-32 text-sm font-medium text-gray-700">Telefón</label>
                    <input type="tel" id="telefon" name="telefon"
                        class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex items-center">
                    <label for="ulica" class="w-32 text-sm font-medium text-gray-700">Ulica</label>
                    <input type="text" id="ulica" name="ulica"
                        class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex items-center">
                    <label for="cislo-domu" class="w-32 text-sm font-medium text-gray-700">Číslo domu</label>
                    <input type="text" id="cislo-domu" name="cislo-domu"
                        class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex items-center">
                    <label for="obec" class="w-32 text-sm font-medium text-gray-700">Obec</label>
                    <input type="text" id="obec" name="obec"
                        class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex items-center">
                    <label for="psc" class="w-32 text-sm font-medium text-gray-700">PSČ</label>
                    <input type="text" id="psc" name="psc"
                        class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <button type="submit"
                    class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-800 flex justify-center w-[120px] transition text-center">
                    Potvrdiť
                </button>
            </form>
        </div>
    </div>

</body>
@include('footer')

</html>
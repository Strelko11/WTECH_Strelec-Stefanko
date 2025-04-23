<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tech Sphere</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/updateSession.js'])
    <script src="{{ mix('resources/js/cart.js') }}" defer></script>
</head>

<body class="flex-grow bg-gray-50">

    @include('navbar')

    <div class="max-w-4xl mx-auto mt-40 px-4">
        <h2 class="text-2xl font-bold mb-6">Košík</h2>

        @if($successMessage)
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">{{ $successMessage }}</div>
        @endif

        @php
            $grandTotal = 0;
        @endphp

        @forelse($cart as $id => $item)
            @php
                $grandTotal += $item['price'] * $item['quantity'];
            @endphp
            <section data-id="{{ $id }}" data-unit-price="{{ $item['price'] }}"
                class="mt-8 w-full max-w-4xl mx-auto px-6 py-8 bg-white rounded-lg custom-shadow flex flex-col md:flex-row items-center justify-start gap-6 border-l border-r border-gray-500">

                {{-- Product Image --}}
                <div
                    class="h-36 w-36 bg-[url('{{ asset('storage/' . $item['image']) }}')] bg-contain bg-no-repeat bg-center rounded-md">
                </div>

                {{-- Quantity Controls --}}
                <div class="flex items-center space-x-4">
                    <button class="quantity-btn" id="decrease-{{ $id }}">−</button>
                    <input type="text" name="quantity[{{ $id }}]" value="{{ $item['quantity'] }}" readonly
                        class="w-16 text-center border border-gray-300 rounded-md py-2 px-4 text-xl">
                    <button class="quantity-btn" id="increase-{{ $id }}">+</button>
                </div>

                {{-- Product Details --}}
                <div class="ml-6 flex flex-col text-center md:text-left text-gray-900 text-lg w-full">
                    <span class="font-bold">{{ $item['name'] }}</span>
                    @if(!empty($item['series']))
                        <span>Séria: {{ $item['series'] }}</span>
                    @endif
                    <div class="flex justify-center md:justify-start w-full">
                        @if(!empty($item['memory']))
                            <span>Pamäť: {{ $item['memory'] }}</span>
                        @endif
                        @if(!empty($item['ram']))
                            <span class="ml-4">RAM: {{ $item['ram'] }}</span>
                        @endif
                    </div>
                </div>

                {{-- Total Price & Delete --}}
                <div class="flex items-center space-x-4">
                    <span class="font-semibold text-lg text-gray-700">Spolu:</span>
                    <div
                        class="bg-gradient-to-r from-blue-500 to-indigo-600 text-black p-3 rounded-lg shadow-md font-medium text-xl border border-gray-200 total-price">
                        {{ number_format($item['price'] * $item['quantity'], 2, ',', ' ') }} €
                    </div>

                    {{-- Delete button --}}
                    <form action="{{ route('cart.remove', ['id' => $id]) }}" method="POST"
                        onsubmit="return confirm('Naozaj chcete odstrániť tento produkt z košíka?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>

            </section>
        @empty
            <p class="text-center text-gray-600 mt-16">Košík je prázdny.</p>
        @endforelse

        <div class="mt-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <a href="{{ route('welcome') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-800">
                Pokračovať v nákupe
            </a>

            @if(count($cart) > 0)
                <div
                    class="bg-gradient-to-r from-green-400 to-blue-500 text-black px-6 py-3 rounded-lg shadow-md font-semibold text-lg border border-gray-300">
                    <span id="grand-total">{{ number_format($grandTotal, 2, ',', ' ') }} €</span>
                </div>
            @endif
        </div>
    </div>

    <div class="flex items-center justify-center mt-10 px-4">
        <div
            class="w-full max-w-4xl mx-auto py-10 px-6 bg-white rounded-lg custom-shadow border-l border-r border-gray-500">

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

    <!-- Include External Script -->

</body>

</html>

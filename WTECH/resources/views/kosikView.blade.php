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

    <div class="max-w-5xl mx-auto mt-40 px-4">
        <h2 class="text-2xl font-bold mb-6">Košík</h2>
        @php
            $grandTotal = 0;
        @endphp

        @foreach($cart as $id => $item)
            @php
                // Price and quantity extraction
                $price = is_array($item) ? ($item['price'] ?? 0) : ($item->product->price ?? 0);
                $quantity = is_array($item) ? ($item['quantity'] ?? 0) : ($item->quantity ?? 0);

                // Product ID extraction
                $product_id = is_array($item) ? ($item['product_id'] ?? null) : ($item->product_id ?? null);

                $grandTotal += $price * $quantity;
            @endphp

            @php
                // Log based on whether the item is an array or object
                if (is_object($item)) {
                    // If it's an object, log product_id along with other details
                    \Log::info('Cart Item Object:', [
                        'product_id' => $item->product_id,
                        'price' => $price,
                        'quantity' => $quantity
                    ]);
                } elseif (is_array($item)) {
                    // If it's an array, log product_id and the whole item array
                    \Log::info('Cart Item Array:', [
                        'product_id' => $product_id,
                        'item' => $item
                    ]);
                }
            @endphp

            <section data-id="{{ $product_id }}" data-unit-price="{{ $price }}"
                class="mt-8 w-full max-w-5xl mx-auto px-2 py-6 bg-white rounded-lg custom-shadow flex flex-col md:flex-row items-center justify-start gap-6 border-l border-r border-gray-500">

                {{-- Product Image --}}
                <div
                    class="h-36 w-40 bg-[url('{{ Storage::url($item['image'] ?? $item->product->images->first()->image_url) }}')] bg-contain bg-center rounded-md bg-no-repeat">
                </div>

                {{-- Quantity Controls & Product Details --}}
                <div class="ml-6 flex flex-col md:flex-row items-center space-x-3">
                    {{-- Quantity Controls --}}
                    <div class="flex items-center space-x-4">
                        <button class="quantity-btn" id="decrease-{{ $product_id }}">−</button>
                        <input type="text" name="quantity[{{ $product_id }}]" value="{{ $quantity }}"
                            class="w-16 text-center border border-gray-300 rounded-md py-2 px-4 text-xl">
                        <button class="quantity-btn" id="increase-{{ $product_id }}">+</button>
                    </div>

                    {{-- Product Details --}}
                    <div class="flex flex-col text-center md:text-left text-gray-900 text-lg w-full">
                        <span class="font-bold">{{ $item['name'] ?? $item->product->name }}</span>
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
                </div>

                {{-- Total Price & Delete --}}
                <div class="flex items-center space-x-2">
                    <span class="font-semibold text-lg text-gray-700">Spolu:</span>
                    <div
                        class="bg-gradient-to-r from-blue-500 to-indigo-600 text-black px-4 py-2 rounded-lg shadow-md font-medium text-xl border border-gray-200 total-price inline-block whitespace-nowrap">
                        {{ number_format($price * $quantity, 2, ',', ' ') }} €
                    </div>


                    {{-- Delete button --}}
                    <form action="{{ route('cart.remove', ['id' => $product_id]) }}" method="POST" class="pr-3 "
                        onsubmit="return confirm('Naozaj chcete odstrániť tento produkt z košíka?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </section>
        @endforeach

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
                        pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$"
                        class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div class="flex items-center">
                    <label for="telefon" class="w-32 text-sm font-medium text-gray-700">Telefón</label>
                    <input type="tel" id="telefon" name="telefon"
                        class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        pattern="[0-9]+"
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const quantityInputs = document.querySelectorAll("input[name^='quantity']");

            function updatePrices(input) {
                const section = input.closest("section");
                const unitPrice = parseFloat(section.dataset.unitPrice);
                const quantity = parseInt(input.value) || 0;

                // Update total price for the item
                const totalPriceElem = section.querySelector(".total-price");
                const total = (unitPrice * quantity).toFixed(2).replace('.', ',');
                totalPriceElem.textContent = `${total} €`;

                // Recalculate grand total
                let grandTotal = 0;
                document.querySelectorAll("section[data-unit-price]").forEach(sec => {
                    const unit = parseFloat(sec.dataset.unitPrice);
                    const qty = parseInt(sec.querySelector("input[name^='quantity']").value) || 0;
                    grandTotal += unit * qty;
                });

                const grandTotalElem = document.getElementById("grand-total");
                if (grandTotalElem) {
                    grandTotalElem.textContent = `${grandTotal.toFixed(2).replace('.', ',')} €`;
                }
            }

            quantityInputs.forEach(input => {
                input.addEventListener("keydown", function (event) {
                    if (event.key === "Enter") {
                        event.preventDefault();
                        updatePrices(input);
                    }
                });

                input.addEventListener("blur", function () {
                    updatePrices(input);
                });
            });
        });
    </script>


</body>

</html>


{{--@if(auth()->check())
@php
\Log::info('USER IS SIGNED IN');
\Log::info('User Cart:', ['user_id' => auth()->id(), 'cart' => $cart]);
\Log::info('Cart:', ['cart' => $cart]);

// Iterate over cart items and log product IDs
foreach ($cart as $item) {
\Log::info('Product ID in cart:', ['product_id' => $item->product_id]);
}
@endphp
@endif

@foreach($cart as $id => $item)
<p>{{ $item['name'] }} - {{ $item['quantity'] }} x {{ $item['price'] }} €</p>
@endforeach--}}






{{--@foreach($cart as $item)
@php
\Log::debug('Cart Itemsssss:', [
'id' => $item->id,
'product_id' => $item->product_id ?? null,
'name' => $item->product->name ?? 'no name',
'price' => $item->product->price ?? 'no price',
'quantity' => $item->quantity ?? 'no quantity'
]);
@endphp
<p>{{ $item->product->name }} - {{ $item->quantity }} x {{ $item->product->price }} €</p>
@endforeach--}}
{{--@if(auth()->check())
@php
\Log::info('USER IS SIGNED IN');
\Log::info('User ID:', ['user_id' => auth()->id()]); // Log user ID
\Log::info('User Cart:', ['user_id' => auth()->id(), 'cart' => $cart]);
\Log::info('Cart:', ['cart' => $cart]);

// Iterate over cart items and log product IDs
foreach ($cart as $item) {
\Log::info('Product ID in cart:', ['product_id' => $item->product_id]);
}
@endphp
@endif--}}

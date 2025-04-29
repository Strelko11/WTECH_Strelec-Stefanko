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

   @include('navbaradmin')




    <div class="flex flex-wrap justify-center gap-6 pt-28 pb-8 bg-gray-100 p-6 rounded-lg shadow-none">


        <form method="GET" action="{{ route('adminObrazovka') }}" class="flex flex-wrap justify-center gap-6 pt-28 pb-8 bg-gray-100 p-6 rounded-lg shadow-none">
            <div class="flex flex-col items-center">
                <label for="priceRange" class="text-lg font-semibold text-gray-900 mb-2">Cena</label>
                <select name="price" id="priceRange"
                        class="px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-900 hover:bg-gray-300 text-center">
                    <option value="">Všetky ceny</option>
                    <option value="low" {{ request('price') == 'low' ? 'selected' : '' }}>Najlacnejšie</option>
                    <option value="high" {{ request('price') == 'high' ? 'selected' : '' }}>Najdrahšie</option>
                    <option value="400" {{ request('price') == '400' ? 'selected' : '' }}>do 400 €</option>
                    <option value="700" {{ request('price') == '700' ? 'selected' : '' }}>do 700 €</option>
                    <option value="1000" {{ request('price') == '1000' ? 'selected' : '' }}>nad 1000 €</option>
                </select>
            </div>
            <div class="flex flex-col items-center">
                <label for="typeFilter" class="text-lg font-semibold text-gray-900 mb-2">Typ zariadenia</label>
                <select name="type" id="typeFilter" class="px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-900 hover:bg-gray-300">
                    <option value="all">Všetky typy</option>
                    @foreach ($types as $type)
                        <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col items-center">
                <label for="categoryFilter" class="text-lg font-semibold text-gray-900 mb-2">Značka</label>
                <select name="category" id="categoryFilter" class="px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-900 hover:bg-gray-300">
                    <option value="all">Všetky značky</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-end">
                <button type="submit" class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-800">
                    Filtrovať
                </button>
            </div>
        </form>


        <div class="w-full flex justify-center mt-4">
            <button id="addProduct"
                    class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-800 w-[150px]"
                    onclick="window.location.href='/pridajProdukt';">
                Pridať produkt
            </button>
        </div>

    </div>


    </div>

    <div class="w-full max-w-[90%] mx-auto px-6 py-10 border-l border-r border-gray-400 custom-shadow rounded-md bg-gray-100">
        <h4 class="text-xl font-bold mb-10 text-gray-900">Zoznam produktov</h4>
        <div class="flex flex-wrap justify-center gap-10">
            @foreach ($products as $product)
            <div onclick="window.location='{{ route('produktView', ['id' => $product->id]) }}'"
                 class="cursor-pointer bg-gray-300 p-4 rounded-lg flex flex-col md:flex-row items-center border border-gray-400 shadow-md gap-4 hover:bg-gray-400 transition duration-300 w-full sm:w-1/2 md:w-4/5 relative">

                <div class="flex space-x-4">
                    <div class="h-38 w-38 bg-white border border-gray-400 rounded overflow-hidden p-2">
                        <div class="h-full w-full bg-[url('{{ $product->images->first()
                    ? Storage::url($product->images->first()->image_url)
                : asset('default.jpg') }}')] bg-contain bg-no-repeat bg-center transition-transform duration-300 hover:scale-110"></div>
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

                    <div class="w-full flex justify-center md:justify-end mt-4 gap-2">
                        <a href="{{ route('upravProdukt', ['id' => $product->id]) }}"
                           onclick="event.stopPropagation();"
                           class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800 text-center w-[120px]">
                            Upraviť
                        </a>


                        <form
                        action="{{ route('products.destroy', $product->id) }}"
                        method="POST"
                        onsubmit="return confirm('Naozaj vymazať tento produkt?');"
                        class="inline"
                      >
                        @csrf
                        @method('DELETE')
                        <button
                          type="submit"
                          class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-800 w-[120px]"
                        >
                          Vymazať
                        </button>
                      </form>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10 flex justify-center">
            {{ $products->links() }}
        </div>
    </div>









    </div>


    @include('footer')
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>

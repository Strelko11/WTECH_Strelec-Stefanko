<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSphere</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        @vite(['resources/css/app.css'])


</head>
<body class="flex flex-col min-h-screen bg-gray-100">

    <div class="flex-grow">
       @include('footer')

        <div class="w-full max-w-[80%] h-auto mx-auto px-4 py-10 border-l border-r border-gray-400 custom-shadow mt-22 flex items-center justify-center rounded-md bg-gray-100">
            <form class="bg-gray-200 p-6 rounded-lg shadow-md w-full max-w-md border border-gray-400">
                <h2 class="text-2xl font-bold mb-4 text-center text-gray-900">Uprav produkt</h2>

                <div class="mb-4">
                    <label for="name" class="block text-gray-900 font-medium">Názov</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>


                <div class="mb-4">
                    <label for="description" class="block text-gray-900 font-medium">Popis</label>
                    <textarea id="description" name="description" rows="3" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required></textarea>
                </div>


                <div class="mb-4">
                    <label for="price" class="block text-gray-900 font-medium">Cena (€)</label>
                    <input type="number" id="price" name="price" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>


                <div class="mb-4 flex flex-col items-center">
                    <label for="fileInput" class="cursor-pointer">
                        <img id="previewImage" src="https://via.placeholder.com/150" alt="Klikni na nahranie" class="w-40 h-40 object-cover border border-gray-400 rounded-lg">
                    </label>
                    <input type="file" id="fileInput" class="hidden" accept="image/*">
                </div>


                <div class="flex justify-end">
                    <button class="w-10 h-10 bg-gray-600 text-white rounded-sm flex items-center justify-center hover:bg-gray-800 transition">
                        +
                    </button>
                </div>


                <button type="submit" class="w-3/5 bg-gray-600 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg mt-6 transition mx-auto block">
                    Potvrdiť
                </button>
            </form>
        </div>



    </div>


    @include('footer')

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



</body>
</html>

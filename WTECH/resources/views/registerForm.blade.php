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


</head>
<body class="flex flex-col min-h-screen bg-gray-100">

    <div class="flex-grow">
        @include('navbar')

        <div class="w-full max-w-[80%] h-auto mx-auto px-4 py-10 border-l border-r border-gray-400 custom-shadow mt-22 flex items-center justify-center rounded-md bg-gray-100">
            <form class="bg-gray-200 p-6 rounded-lg shadow-md w-full max-w-md border border-gray-400">
                <h2 class="text-2xl font-bold mb-4 text-center text-gray-900">Zaregistrovať sa</h2>


                <div class="mb-4">
                    <label for="name" class="block text-gray-900 font-medium">Meno</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>


                <div class="mb-4">
                    <label for="surname" class="block text-gray-900 font-medium">Priezvisko</label>
                    <input type="text" id="surname" name="surname" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>


                <div class="mb-4">
                    <label for="email" class="block text-gray-900 font-medium">E-mail</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>


                <div class="mb-4">
                    <label for="phone_number" class="block text-gray-900 font-medium">Telefónne číslo</label>
                    <input type="tel" id="phone_number" name="phone_number" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>


                <div class="mb-4">
                    <label for="password" class="block text-gray-900 font-medium">Heslo</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>


                <div class="mb-4">
                    <label for="password_confirm" class="block text-gray-900 font-medium">Potvrď heslo</label>
                    <input type="password" id="password_confirm" name="password_confirm" class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>


                <button type="submit" class="w-3/5 bg-gray-600 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg mt-6 transition mx-auto block">
                    Potvrdiť
                </button>
            </form>
        </div>



    </div>


    @include('footer')


    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



</body>
</html>

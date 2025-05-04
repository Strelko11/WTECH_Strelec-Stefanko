<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Tech Sphere</title>

    <!-- Tailwind CSS and other resources -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ mix('resources/js/produktCounter.js') }}" defer></script>

</head>

<body class="min-h-screen flex flex-col bg-gray-100">
    <div id="overlay" class="overlay hidden p-10">
        <div class="modal">
            <p>Objednávka bola úspešne odoslaná</p>
            <p>Budete presmerovany na hlavnu stranku</p>
        </div>
    </div>
    <!-- Navbar -->
    @include('navbar')

    <!-- Page Content Wrapper -->
    <div class="flex-grow flex flex-col items-center mt-24"> <!-- Added margin-top to push content down -->
        <!-- Single Form for Delivery and Payment -->
        <form action="{{ route('cart.clear') }}" method="POST" id="orderForm"
            class="w-full max-w-[80%] flex flex-col items-center space-y-8 mt-20">
            @csrf
            @method('DELETE')

            <!-- Delivery Method -->
            <div
        class="w-full md:max-w-[65%] px-4 md:px-8 py-6 md:py-10 shadow-xl flex flex-col gap-6 rounded-lg bg-white border border-gray-300">
        <h3 class="text-xl md:text-2xl font-semibold text-center text-gray-800">Spôsob doručenia</h3>
        <div class="space-y-4 md:space-y-6">
            <div class="flex items-center space-x-2 md:space-x-3">
                <input type="radio" id="adresa" name="shipping_method" value=1
                    class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                <label for="adresa" class="text-base md:text-lg font-medium text-gray-700">Na adresu</label>
            </div>
            <div class="flex items-center space-x-2 md:space-x-3">
                <input type="radio" id="balikobox" name="shipping_method" value="2"
                    class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                <label for="balikobox" class="text-base md:text-lg font-medium text-gray-700">Balikobox</label>
            </div>
            <div class="flex items-center space-x-2 md:space-x-3">
                <input type="radio" id="posta" name="shipping_method" value="3"
                    class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                <label for="posta" class="text-base md:text-lg font-medium text-gray-700">Na poštu</label>
            </div>
        </div>
    </div>

    <!-- Payment Method -->
    <div
        class="w-full md:max-w-[65%] px-4 md:px-8 py-6 md:py-10 mt-6 shadow-xl flex flex-col gap-6 rounded-lg bg-white border border-gray-300">
        <h3 class="text-xl md:text-2xl font-semibold text-center text-gray-800">Spôsob platby</h3>
        <div class="space-y-4 md:space-y-6">
            <div class="flex items-center space-x-2 md:space-x-3">
                <input type="radio" id="hotovost" name="payment_method" value="1"
                    class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                <label for="hotovost" class="text-base md:text-lg font-medium text-gray-700">Platba v
                    hotovosti</label>
            </div>
            <div class="flex items-center space-x-2 md:space-x-3">
                <input type="radio" id="prevod_ucet" name="payment_method" value="2"
                    class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                <label for="prevod_ucet" class="text-base md:text-lg font-medium text-gray-700">Prevod na
                    účet</label>
            </div>
            <div class="flex items-center space-x-2 md:space-x-3">
                <input type="radio" id="apple_pay" name="payment_method" value="3"
                    class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                <label for="apple_pay" class="text-base md:text-lg font-medium text-gray-700">Apple Pay</label>
            </div>
            <div class="flex items-center space-x-2 md:space-x-3">
                <input type="radio" id="google_pay" name="payment_method" value="4"
                    class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500" />
                <label for="google_pay" class="text-base md:text-lg font-medium text-gray-700">Google
                    Pay</label>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="w-auto p-4 flex justify-center">
        <button type="submit" id="potvrditButton"
            class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-800 w-[120px] transition">
            Potvrdiť objednávku
        </button>
    </div>
        </form>
    </div>

    <!-- Footer -->
    @include('footer')

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("orderForm");
  const overlay = document.getElementById("overlay");
  if (!form || !overlay) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Updated name attributes to match the ones in the HTML
    const delivery = document.querySelector('input[name="shipping_method"]:checked');
    const payment = document.querySelector('input[name="payment_method"]:checked');
    if (!delivery || !payment) {
      alert("Prosím vyplňte všetky povinné polia (doručenie a platba).");
      return;
    }

    const userId = @json(Auth::check() ? Auth::id() : null);

    const showOverlay = (event) => {
      overlay.classList.remove("hidden");
      setTimeout(() => {
        overlay.classList.add("hidden");
        window.location.href = "/";
      }, 3000);
      //event.target.submit();  // Submit the form after overlay
    };

    if (userId !== null) {
      fetch("{{ route('cart.clear') }}", {
        method: "DELETE",
        credentials: "same-origin",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json",
          "X-CSRF-TOKEN": document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content")
        },
        body: JSON.stringify({
      user_id:         userId,
      shipping_method: delivery.value,
      payment_method:  payment.value
    })
      })
        .then(response => {
          if (!response.ok) {
            console.error("Fetch response error:", response);
            throw new Error("Serverová chyba");
          }
          return response.json();
        })
        .then(() => {
          showOverlay(e);  // Pass the event here
        })
        .catch((err) => {
          console.error("Chyba pri požiadavke:", err);
          alert(err.message);
        });

    } else {
      showOverlay(e);
    }
  });
});

      </script>


    </body>

</html>

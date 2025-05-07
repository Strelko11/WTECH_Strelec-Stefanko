<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TechSphere</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  >
  @vite(['resources/css/app.css'])
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
  <div class="flex-grow">
    @include('navbaradmin')

    <div class="w-full max-w-[80%] mx-auto px-4 py-10 border-l border-r border-gray-400 custom-shadow mt-22 rounded-md bg-gray-100 flex justify-center">
      <form
        id="productForm"
        method="POST"
        action="{{ route('products.store') }}"
        enctype="multipart/form-data"
        class="bg-gray-200 p-6 rounded-lg shadow-md w-full max-w-md border border-gray-400"
      >
        @csrf
        <h2 class="text-2xl font-bold mb-4 text-center text-gray-900">Pridať nový produkt</h2>

        {{-- Názov --}}
        <div class="mb-4">
          <label for="name" class="block text-gray-900 font-medium">Názov</label>
          <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
          >
          @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Popis --}}
        <div class="mb-4">
          <label for="description" class="block text-gray-900 font-medium">Popis</label>
          <textarea
            id="description"
            name="description"
            rows="3"
            required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
          >{{ old('description') }}</textarea>
          @error('description')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Cena --}}
        <div class="mb-4">
          <label for="price" class="block text-gray-900 font-medium">Cena (€)</label>
          <input
            type="number"
            id="price"
            name="price"
            step="0.01"
            value="{{ old('price') }}"
            required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
          >
          @error('price')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Kategória --}}
        <div class="mb-4">
          <label for="category" class="block text-gray-900 font-medium">Kategória</label>
          <select
            id="category"
            name="category"
            required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
          >
            <option value="" disabled {{ old('category') ? '' : 'selected' }}>Vyberte kategóriu</option>
            @foreach(['iPhone','Samsung','Xiaomi','XiaomiPad','GalaxyTab','iPad'] as $cat)
              <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>
                {{ $cat }}
              </option>
            @endforeach
          </select>
          @error('category')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Séria --}}
        <div class="mb-4">
          <label for="series" class="block text-gray-900 font-medium">Séria</label>
          <input
            type="text"
            id="series"
            name="series"
            value="{{ old('series') }}"
            required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
          >
          @error('series')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-4">
            <label for="ram" class="block text-gray-900 font-medium">RAM (GB)</label>
            <input
              type="number"
              id="ram"
              name="ram"
              required
              value="{{ old('ram') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>

          <div class="mb-4">
            <label for="storage" class="block text-gray-900 font-medium">Storage (GB)</label>
            <input
              type="number"
              id="storage"
              name="storage"
              required
              value="{{ old('storage') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>
        {{-- Typ --}}
        <div class="mb-4">
          <label for="type" class="block text-gray-900 font-medium">Typ</label>
          <select
            id="type"
            name="type"
            required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
          >
            <option value="" disabled {{ old('type') ? '' : 'selected' }}>Vyberte typ</option>
            <option value="phone" {{ old('type') === 'phone' ? 'selected' : '' }}>Phone</option>
            <option value="tablet" {{ old('type') === 'tablet' ? 'selected' : '' }}>Tablet</option>
          </select>
          @error('type')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-4">
            <label for="sim_type" class="block text-gray-900 font-medium">SIM typ</label>
            <input
              type="text"
              id="sim_type"
              name="sim_type"
              value="{{ old('sim_type') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>
        <div class="mb-4">
            <label for="display_type" class="block text-gray-900 font-medium">Display Type</label>
            <input
              type="text"
              id="display_type"
              name="display_type"
              value="{{ old('display_type') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>

          <div class="mb-4">
            <label for="display_size" class="block text-gray-900 font-medium">Display Size (inches)</label>
            <input
              type="number"
              step="0.2"
              id="display_size"
              name="display_size"
              value="{{ old('display_size') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>

          <div class="mb-4">
            <label for="display_resolution" class="block text-gray-900 font-medium">Display Resolution</label>
            <input
              type="text"
              id="display_resolution"
              name="display_resolution"
              value="{{ old('display_resolution') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>

          <div class="mb-4">
            <label for="refresh_rate" class="block text-gray-900 font-medium">Refresh Rate (Hz)</label>
            <input
              type="number"
              id="refresh_rate"
              name="refresh_rate"
              value="{{ old('refresh_rate') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>
          <div class="mb-4">
            <label for="processor" class="block text-gray-900 font-medium">Processor</label>
            <input
              type="text"
              id="processor"
              name="processor"
              value="{{ old('processor') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>

          {{-- Polá fotek --}}
          <div class="mb-4">
            <label for="camera_main_mp" class="block text-gray-900 font-medium">
              Camera Main (Mpx)
            </label>
            <input
              type="number"
              id="camera_main_mp"
              name="camera_main_mp"
              value="{{ old('camera_main_mp') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>
          <div class="mb-4">
            <label for="camera_ultrawide_mp" class="block text-gray-900 font-medium">
              Camera Ultrawide (Mpx)
            </label>
            <input
              type="number"
              id="camera_ultrawide_mp"
              name="camera_ultrawide_mp"
              value="{{ old('camera_ultrawide_mp') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>
          <div class="mb-4">
            <label for="camera_telephoto_mp" class="block text-gray-900 font-medium">
              Camera Telephoto (Mpx)
            </label>
            <input
              type="number"
              id="camera_telephoto_mp"
              name="camera_telephoto_mp"
              value="{{ old('camera_telephoto_mp') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>
          <div class="mb-4">
            <label for="camera_front_mp" class="block text-gray-900 font-medium">
              Camera Front (Mpx)
            </label>
            <input
              type="number"
              id="camera_front_mp"
              name="camera_front_mp"
              value="{{ old('camera_front_mp') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>

          {{-- Boolean senzory --}}
          <div class="mb-4 flex gap-4">
            {{-- GPS --}}
            <input type="hidden" name="gps" value="0">
            <label class="inline-flex items-center">
                <input
                type="checkbox"
                name="gps"
                value="1"
                {{ old('gps', 0) ? 'checked' : '' }}
                class="form-checkbox"
                >
                <span class="ml-2">GPS</span>
            </label>

            {{-- NFC --}}
            <input type="hidden" name="nfc" value="0">
            <label class="inline-flex items-center">
                <input
                type="checkbox"
                name="nfc"
                value="1"
                {{ old('nfc', 0) ? 'checked' : '' }}
                class="form-checkbox"
                >
                <span class="ml-2">NFC</span>
            </label>

            {{-- LTE --}}
            <input type="hidden" name="lte" value="0">
            <label class="inline-flex items-center">
                <input
                type="checkbox"
                name="lte"
                value="1"
                {{ old('lte', 0) ? 'checked' : '' }}
                class="form-checkbox"
                >
                <span class="ml-2">LTE</span>
            </label>

            {{-- 5G --}}
            <input type="hidden" name="_5g" value="0">
            <label class="inline-flex items-center">
                <input
                type="checkbox"
                name="_5g"
                value="1"
                {{ old('_5g', 0) ? 'checked' : '' }}
                class="form-checkbox"
                >
                <span class="ml-2">5G</span>
            </label>

            {{-- USB-C --}}
            <input type="hidden" name="usb_c" value="0">
            <label class="inline-flex items-center">
                <input
                type="checkbox"
                name="usb_c"
                value="1"
                {{ old('usb_c', 0) ? 'checked' : '' }}
                class="form-checkbox"
                >
                <span class="ml-2">USB-C</span>
            </label>

            {{-- Wireless Charging --}}
            <input type="hidden" name="wireless_charging" value="0">
            <label class="inline-flex items-center">
                <input
                type="checkbox"
                name="wireless_charging"
                value="1"
                {{ old('wireless_charging', 0) ? 'checked' : '' }}
                class="form-checkbox"
                >
                <span class="ml-2">Wireless Charging</span>
            </label>
          </div>

          {{-- Ďalšie volitelné --}}
          <div class="mb-4">
            <label for="waterproof_rating" class="block text-gray-900 font-medium">Waterproof Rating</label>
            <input
              type="text"
              id="waterproof_rating"
              name="waterproof_rating"
              value="{{ old('waterproof_rating') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>

          <div class="mb-4">
            <label for="charging_power_watts" class="block text-gray-900 font-medium">Charging Power (W)</label>
            <input
              type="number"
              id="charging_power_watts"
              name="charging_power_watts"
              value="{{ old('charging_power_watts') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>
          <div class="mb-4">
            <label for="battery_mah" class="block text-gray-900 font-medium">Battery Capacity (mAh)</label>
            <input
              type="number"
              id="battery_mah"
              name="battery_mah"
              value="{{ old('battery_mah') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>
          <div class="mb-4">
            <label for="release_year" class="block text-gray-900 font-medium">Release Year</label>
            <input
              type="number"
              id="release_year"
              name="release_year"
              value="{{ old('release_year') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>
          <div class="mb-4">
            <label for="os" class="block text-gray-900 font-medium">OS</label>
            <input
              type="text"
              id="os"
              name="os"
              value="{{ old('os') }}"
              class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500"
            >
          </div>
        {{-- Obrázky (po jednom) --}}
        <div class="mb-4">
          <label class="block text-gray-900 font-medium mb-1">Obrázky (2–4)</label>
          <div id="previews" class="grid grid-cols-4 gap-2 mb-2">
            @for ($i = 0; $i < 4; $i++)
              <div class="relative">
                <label for="fileInput{{ $i }}" class="block cursor-pointer">
                  <img
                    id="preview{{ $i }}"
                    src="https://via.placeholder.com/100?text=+"
                    alt="Náhľad {{ $i + 1 }}"
                    class="w-full h-24 object-cover border border-gray-400 rounded"
                  >
                </label>
                <input
                  type="file"
                  id="fileInput{{ $i }}"
                  name="images[]"
                  accept="image/*"
                  class="hidden"
                >
              </div>
            @endfor
          </div>
          <p id="imageError" class="text-red-600 text-sm mt-1 hidden">
            Prosím vyberte aspoň 2 a najviac 4 obrázky.
          </p>
          @error('images')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
          @error('images.*')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Potvrdiť tlačidlo --}}
        <button
          type="submit"
          class="w-3/5 bg-gray-600 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg mx-auto block transition"
        >
          Potvrdiť
        </button>
      </form>
    </div>
  </div>

  @include('footer')
  <script>
    const inputs = [...document.querySelectorAll('[id^="fileInput"]')];
    const previews = inputs.map((_, i) => document.getElementById(`preview${i}`));
    const form = document.getElementById('productForm');
    const errorP = document.getElementById('imageError');


    inputs.forEach((input, idx) => {
      input.addEventListener('change', () => {
        const file = input.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = e => previews[idx].src = e.target.result;
          reader.readAsDataURL(file);
        } else {
          previews[idx].src = 'https://via.placeholder.com/100?text=+';
        }
      });
    });

   
    form.addEventListener('submit', e => {
      const selectedCount = inputs.filter(i => i.files.length > 0).length;
      if (selectedCount < 2 || selectedCount > 4) {
        e.preventDefault();
        errorP.classList.remove('hidden');
      }
    });
  </script>
</body>
</html>

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function showByCategory(Request $request, $category)
    {
        $query = Product::with('images')->where('category', $category);

        if ($request->filled('min')) {
            $query->where('price', '>=', $request->min);
        }

        if ($request->filled('max')) {
            $query->where('price', '<=', $request->max);
        }
        if ($request->filled('sort')) {
            $sortOrder = $request->get('sort') === 'desc' ? 'desc' : 'asc';
            $query->orderBy('price', $sortOrder);
        }
        if ($request->filled('series')) {
            $query->where('series', $request->series);
        }

        if ($request->filled('storage')) {
            $query->where('storage', $request->storage);
        }

        if ($request->filled('ram')) {
            $query->where('ram', $request->ram);
        }


        $ramList = Product::where('category', $category)->distinct()->pluck('ram');
        $storageList = Product::where('category', $category)->distinct()->pluck('storage');
        $seriesList = Product::where('category', $category)->distinct()->pluck('series');

        $products = $query->paginate(2)->withQueryString();

        return view('strankaProdukty', compact('products', 'category', 'seriesList', 'ramList', 'storageList'));
    }
    public function showProduct(Request $request)
    {
        $id = $request->query('id');

        $product = Product::with('images')->findOrFail($id);

        return view('produktView', compact('product'));
    }
    public function search(Request $request)
    {
        $queryBuilder = Product::with('images');

        if ($request->filled('query')) {
            $search = $request->input('query');
            $queryBuilder->where(function ($q) use ($search) {
                $q->where('name', 'ILIKE', "%{$search}%")
                    ->orWhere('description', 'ILIKE', "%{$search}%");
            });
        }
        if ($request->filled('min')) {
            $queryBuilder->where('price', '>=', $request->min);
        }

        if ($request->filled('max')) {
            $queryBuilder->where('price', '<=', $request->max);
        }

        if ($request->filled('series')) {
            $queryBuilder->where('series', $request->series);
        }

        if ($request->filled('storage')) {
            $queryBuilder->where('storage', $request->storage);
        }

        if ($request->filled('ram')) {
            $queryBuilder->where('ram', $request->ram);
        }

        if ($request->filled('sort')) {
            $sortOrder = $request->get('sort') === 'desc' ? 'desc' : 'asc';
            $queryBuilder->orderBy('price', $sortOrder);
        }

        $products = $queryBuilder->paginate(2)->withQueryString();

        $seriesList = Product::distinct()->pluck('series');
        $ramList = Product::distinct()->pluck('ram');
        $storageList = Product::distinct()->pluck('storage');

        return view('strankaProdukty', [
            'products' => $products,
            'category' => 'Vyhľadávanie',
            'seriesList' => $seriesList,
            'ramList' => $ramList,
            'storageList' => $storageList,
            'query' => $request->query('query')
        ]);
    }

    public function create()
    {
        return view('products.form');
    }

    // Uloženie nového produktu
    public function store(Request $request)
    {
        // 1) Validácia
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required|string|in:iPhone,Samsung,Xiaomi,XiaomiPad,GalaxyTab,iPad',
            'series'      => 'required|string|max:255',
            'type'        => 'required|string|in:phone,tablet',
            'images'      => 'required|array|min:2|max:4',
            'images.*'    => 'image|max:2048',
            'ram'                  => 'integer',
            'storage'              => 'integer',

            'display_type'         => 'nullable|string|max:100',
            'display_size'         => 'nullable|numeric',
            'display_resolution'   => 'nullable|string|max:50',
            'refresh_rate'         => 'nullable|integer',

            'sim_type'             => 'nullable|string|max:100',
            'processor'            => 'nullable|string|max:100',
            'camera_main_mp'       => 'nullable|integer',
            'camera_ultrawide_mp'  => 'nullable|integer',
            'camera_telephoto_mp'  => 'nullable|integer',
            'camera_front_mp'      => 'nullable|integer',
            'gps'               => 'required|boolean',
            'nfc'               => 'required|boolean',
            'lte'               => 'required|boolean',
            '_5g'               => 'required|boolean',
            'usb_c'             => 'required|boolean',
            'wireless_charging' => 'required|boolean',
            'waterproof_rating'    => 'nullable|string|max:10',

            'charging_power_watts' => 'nullable|integer',
            'battery_mah'          => 'nullable|integer',
            'release_year'         => 'nullable|integer',
            'os'                   => 'nullable|string|max:50',

        ]);


        $product = Product::create($data);


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {

                $path = $file->store("products/{$product->id}", 'public');

                $product->images()->create([
                    'image_url' => $path,
                ]);
            }
        }

        return redirect()
            ->route('adminObrazovka', $product)
            ->with('success', 'Produkt bol úspešne vytvorený.');
    }
    public function destroy(Product $product): RedirectResponse
    {

        Storage::disk('public')->deleteDirectory("products/{$product->id}");


        $product->images()->delete();


        $product->delete();


        return redirect()
            ->route('adminObrazovka')
            ->with('success', 'Produkt bol úspešne vymazaný.');
    }

    // In your controller (e.g., ProductController.php)
    public function edit($id)
    {
        // Pass the product ID to the view
        return view('upravProdukt')->with('id', $id); // Another way of passing the ID
    }

    public function update(Request $request, $id)
{
    // First, find the product
    $product = Product::findOrFail($id);

    // Count how many images are already associated with the product
    $existingImageCount = $product->images()->count();

    // Validate the basic input (skip image count rules here)
    $data = $request->validate([
        'name'                => 'required|string|max:255',
        'description'         => 'required|string',
        'price'               => 'required|numeric|min:0',
        'category'            => 'required|string|in:iPhone,Samsung,Xiaomi,XiaomiPad,GalaxyTab,iPad',
        'series'              => 'required|string|max:255',
        'type'                => 'required|string|in:phone,tablet',
        'images'              => 'nullable|array',
        'images.*'            => 'image|max:2048',
        'ram'                 => 'nullable|integer',
        'storage'             => 'nullable|integer',
        'display_type'        => 'nullable|string|max:100',
        'display_size'        => 'nullable|numeric',
        'display_resolution'  => 'nullable|string|max:50',
        'refresh_rate'        => 'nullable|integer',
        'sim_type'            => 'nullable|string|max:100',
        'processor'           => 'nullable|string|max:100',
        'camera_main_mp'      => 'nullable|integer',
        'camera_ultrawide_mp' => 'nullable|integer',
        'camera_telephoto_mp' => 'nullable|integer',
        'camera_front_mp'     => 'nullable|integer',
        'gps'                 => 'required|boolean',
        'nfc'                 => 'required|boolean',
        'lte'                 => 'required|boolean',
        '_5g'                 => 'required|boolean',
        'usb_c'               => 'required|boolean',
        'wireless_charging'   => 'required|boolean',
        'waterproof_rating'   => 'nullable|string|max:10',
        'charging_power_watts' => 'nullable|integer',
        'battery_mah'         => 'nullable|integer',
        'release_year'        => 'nullable|integer',
        'os'                  => 'nullable|string|max:50',
    ]);

    // Count newly uploaded images
    $newImages = $request->file('images', []);
    $newImageCount = is_array($newImages) ? count($newImages) : 0;

    // Total image count
    $totalImageCount = $existingImageCount + $newImageCount;

    if ($totalImageCount < 2 || $totalImageCount > 4) {
        return back()->withInput()->withErrors(['images' => 'Total number of images (existing + new) must be between 2 and 4.']);
    }

    // Update product data
    $product->update($data);

    // Save new images
    foreach ($newImages as $file) {
        $path = $file->store("products/{$product->id}", 'public');

        $product->images()->create([
            'image_url' => $path,
        ]);
    }

    return redirect()->route('adminObrazovka')->with('success', 'Product updated successfully!');
}

}

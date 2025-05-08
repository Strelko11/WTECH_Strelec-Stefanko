<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;


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

  
    public function store(Request $request)
    {

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


    public function edit($id)
    {
        // Pass the product ID to the view
        return view('upravProdukt')->with('id', $id); // Another way of passing the ID
    }

    public function update(Request $request, $id)
    {
        // Validate input
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
        $product = Product::findOrFail($id);
        // Get current number of images (not deleted)
        $existingCount = $product->images()->count();

        // Subtract any that are being deleted
        $deletingCount = is_array($request->images_to_delete) ? count($request->images_to_delete) : 0;

        // Add number of newly uploaded files
        $newCount = is_array($request->images) ? count($request->images) : 0;

        $totalCount = $existingCount - $deletingCount + $newCount;

        if ($totalCount < 2 || $totalCount > 4) {
            return back()
                ->withErrors(['images' => 'Total number of images must be between 2 and 4.'])
                ->withInput();
        }


        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update product data
        $product->update($data);

        // Handle image upload if any new images are uploaded
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store("products/{$product->id}", 'public');

                // Save the new image
                $product->images()->create([
                    'image_url' => $path,
                ]);
            }
        }

        // Handle image deletion if any images are deleted

        if ($request->has('images_to_delete')) {
            foreach ($request->images_to_delete as $imagePath) {
                // Ensure the image path is relative and matches your storage setup
                $imagePath = 'products/' . $product->id . '/' . basename($imagePath);

                // Check if the file exists before attempting to delete
                if (Storage::disk('public')->exists($imagePath)) {
                    // Delete the image from storage
                    Storage::disk('public')->delete($imagePath);
                } else {
                    // Log a warning if the file is not found
                    Log::warning("File not found: " . $imagePath);
                }

                // Delete image record from the database
                $product->images()->where('image_url', $imagePath)->delete();
            }
        }



        // Redirect to the admin page after update
        return redirect()->route('adminObrazovka')->with('success', 'Product updated successfully!');
    }
}

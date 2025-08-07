<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            // Mencari berdasarkan nama barang atau kode barang
            $query->where('nama_barang', 'like', "%{$searchTerm}%")
                  ->orWhere('kode_barang', 'like', "%{$searchTerm}%");
        }

        $products = $query->orderBy('kode_barang')->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|string|max:50|unique:products',
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok_saat_ini' => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'satuan' => 'required|string|max:20',
            'harga' => 'nullable|numeric|min:0',
        ], [
            'kode_barang.required' => 'Kode barang wajib diisi.',
            'kode_barang.unique' => 'Kode barang sudah digunakan.',
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'stok_saat_ini.required' => 'Stok saat ini wajib diisi.',
            'stok_saat_ini.min' => 'Stok saat ini minimal 0.',
            'stok_minimum.required' => 'Stok minimum wajib diisi.',
            'stok_minimum.min' => 'Stok minimum minimal 0.',
            'satuan.required' => 'Satuan wajib dipilih.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga minimal 0.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|string|max:50|unique:products,kode_barang,' . $product->id,
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok_saat_ini' => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:0',
            'satuan' => 'required|string|max:20',
            'harga' => 'nullable|numeric|min:0',
        ], [
            'kode_barang.required' => 'Kode barang wajib diisi.',
            'kode_barang.unique' => 'Kode barang sudah digunakan.',
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'stok_saat_ini.required' => 'Stok saat ini wajib diisi.',
            'stok_saat_ini.min' => 'Stok saat ini minimal 0.',
            'stok_minimum.required' => 'Stok minimum wajib diisi.',
            'stok_minimum.min' => 'Stok minimum minimal 0.',
            'satuan.required' => 'Satuan wajib dipilih.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga minimal 0.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Check if product has history
        if ($product->history()->count() > 0) {
            return redirect()->route('products.index')
                ->with('error', 'Produk tidak dapat dihapus karena memiliki riwayat transaksi.');
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}

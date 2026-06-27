<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsStoreRequest;
use App\Http\Requests\ProductsUpdateRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $query = Products::with('category');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', "%{$search}%")
                    ->orWhere('kode_produk', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->latest()->paginate(10)->withQueryString();
        $categories = Categories::orderBy('nama_kategori')->get();

        $stats = [
            'low_stok' => Products::whereBetween('stok', [1, 10])->count(),
            'out_stok' => Products::where('stok', 0)->count(),
        ];

        return view('produk.index', compact('products', 'categories', 'stats'));
    }

    public function create()
    {
        $categories = Categories::orderBy('nama_kategori')->get();
        $generatedCode = $this->generateCode();

        return view('produk.create', compact('categories', 'generatedCode'));
    }

    public function store(ProductsStoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('products', 'public');
        }

        Products::create($data);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Products $produk)
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(Products $produk)
    {
        $categories = Categories::orderBy('nama_kategori')->get();

        return view('produk.edit', compact('produk', 'categories'));
    }

    public function update(ProductsUpdateRequest $request, Products $produk)
    {
        $validated = $request->validated();

        if ($request->hasFile('gambar')) {

            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }

            $validated['gambar'] = $request
                ->file('gambar')
                ->store('products', 'public');
        }

        $produk->update($validated);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Products $produk)
    {
        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus!');
    }

    private function generateCode(): string
    {
        do {
            $code = 'PRD-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        } while (Products::where('kode_produk', $code)->exists());

        return $code;
    }

    private function parseCurrency($value): int
    {
        return (int) preg_replace('/\D/', '', $value);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesStoreRequest;
use App\Http\Requests\CategoriesUpdateRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $query = Categories::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama_kategori', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
        }

        $categories = $query->latest()->paginate(3)->withQueryString();

        return view('kategori.index', compact('categories'));
    }

    public function store(CategoriesStoreRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['nama_kategori']);

        Categories::create($data);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function update(CategoriesUpdateRequest $request, int $id)
    {
        $categories = Categories::findOrFail($id);

        $data = $request->validated();
        $data['slug'] = Str::slug($data['nama_kategori']);

        $categories->update($data);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(int $id)
    {
        $categories = Categories::findOrFail($id);

        $categories->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}

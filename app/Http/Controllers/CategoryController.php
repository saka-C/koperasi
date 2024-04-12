<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        return view('category.index', [
            'category' => Category::latest()->get()
        ]);
    }

    function store(Request $request)
    {
        $categoryData = $request->validate([
            'category' => ['required'],
            'type' => ['required'],
            'desc' => ['required'],
        ]);

        $category = Category::firstOrNew($categoryData);

        if ($category->exists) {
            return back()->with('error', 'Opps! Kategori Telah Tersedia');
        } else {
            Category::create($categoryData);
            return back()->with('success', 'Yay! Kategori Berhasil di Tambahkan');
        }
    }

    function show(Category $category)
    {
        return view('category.view', [
            'category' => $category
        ]);
    }

    function update(Request $request, Category $category)
    {
        $categoryData = $request->validate([
            'category' => ['required'],
            'type' => ['required'],
            'desc' => ['required'],
        ]);

        if ($request->category != $category->category || $request->type != $category->type || $request->desc != $category->desc) {
            $cek_category = Category::firstOrNew($categoryData);
            if ($cek_category->exists) {
                return back()->with('error', 'Opps! Kategori Telah Tersedia');
            }
        }
        $category->update($categoryData);
        return redirect("/category/show/$category->id")->with('success', 'Yay! Kategori Berhasil di Ubah');
    }

    function destroy(Category $category)
    {
        $cek_transaction = Transaction::where('category_id', $category->id)->first();
        if ($cek_transaction) {
            return back()->with('error', 'Opps! Kategori Exist di Menu Transaksi');
        } else {
            $category->delete();
            return redirect('/category/index')->with('success', 'Yay! Kategori Berhasil di Hapus');
        }
    }
}

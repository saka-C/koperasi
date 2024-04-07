<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        return view('category.index',[
            'category' => Category::latest()->get()
        ]);
    }

    function store(Request $request){
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
}

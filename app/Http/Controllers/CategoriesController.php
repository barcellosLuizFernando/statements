<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {

        $categories = Categories::all();

        return view('reg.categories.show', ['categories' => $categories]);
    }

    public function create()
    {

        return view('reg.categories.create');
    }

    public function show($id)
    {

        $category = Categories::findOrFail($id);

        return view('reg.categories.create', ['category' => $category]);
    }

    public function store(Request $request)
    {

        $category = new Categories;

        $category->name = $request->categoryName;
        $category->description = $request->categoryDescription;

        $category->save();

        return redirect('/reg/categories');
    }

    public function destroy($id)
    {
        Categories::findOrFail($id)->delete();

        return redirect('/reg/categories')->with('msg', 'Categoria excluída com sucesso');
    }

    public function update(Request $request)
    {
        $category = Categories::findOrFail($request->id);

        $category->name = $request->categoryName;
        $category->description = $request->categoryDescription;

        $category->save();

        return redirect('/reg/categories')->with('msg', 'Categoria editada com sucesso');
    }
}

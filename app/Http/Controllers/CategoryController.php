<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::get()->toTree();
    }

    public function store(Request $request)
    {
        return Category::create($request->toArray());
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
        if ($request->get('parent_id') && $request->get('parent_id') !== $category->parent_id) {
            $parent = Category::findOrFail($request->get('parent_id'));
            $category->appendToNode($parent);
        }
        $category->save();
        return $category;
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return $category;
    }
}

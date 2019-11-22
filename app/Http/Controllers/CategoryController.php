<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $parent = Category::findOrFail($request->input('parent_id'));
        return Category::create(['name' => $request->input('name')], $parent);
    }

    public function show($id)
    {
        $image = new Image();
        $image->extension = '';
        $image->save();
        Storage::move($request->image->path, storage_path() . '/image/' . $image->id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
    }
}

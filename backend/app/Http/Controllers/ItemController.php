<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        return Item::get();
    }

    public function store(Request $request)
    {
        $item = new Item();
        $item->uuid = Str::uuid();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->image = $request->file('image')->path();
        $item->category_id = $request->category_id;
        $item->save();
        return $item;
    }

    public function show($id)
    {
        return Item::findOrFail($id);
    }

    public function update(Request $request, $uuid)
    {
        $item = Item::findOrFail($uuid);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->image = $request->file('image')->path();
        $item->category_id = $request->category_id;
        $item->save();
        return $item;
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return $item;
    }
}

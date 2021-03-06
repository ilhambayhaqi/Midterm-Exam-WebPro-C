<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCondition;
use App\Models\ItemCategory;
use App\Models\Shop;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where('shop_id', auth()->user()->shop_id)->get();
        return view('items/index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ItemCategory::all();
        $conditions = ItemCondition::all();
        return view('items.create', ['categories' => $categories, 'conditions' => $conditions ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $request->validate([
            'item_name' => 'required',
            'category_id' => 'required',
            'condition_id' => 'required',
            'item_stock' => 'required',
            'price' => 'required',
        ]);
        
        $current_user = auth()->user();
        $data = $request->all();
        $data['shop_id'] = $current_user->shop_id;

        Item::create($data);
        return redirect('/items')->with('status','Item has been added');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'item_name' => 'required',
            'price' => 'required',
            'item_stock' => 'required'
        ]);
        
        Item::where('id',$item->id)
            ->update([
                'item_name' => $request->item_name,
                'price' => $request->price,
                'item_stock' => $request->item_stock,
                'item_description' => $request->item_description
            ]);

        return redirect('/items')->with('status','Item Detail Has Changes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Item::destroy($item->id);
        return redirect('/items')->with('status','Item Has Been Deleted!');
    }
}

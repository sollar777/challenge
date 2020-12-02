<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Group;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        
        return view('ListProducts', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $groups = Group::all();

        return view('creatProduct', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $group = Group::find($data['group']);

        $products = $group->products()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price_cost' => (double)$data['price_cost'],
            'price' => (double)$data['price'],
            'amount' => (double)$data['amount']
        ])->all();

        return view('ListProducts', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();

        $groups = Group::all();

        return view('editProduct', compact('product', 'groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $data = $request->all();

        $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price_cost' => (double)$data['price_cost'],
            'price' => (double)$data['price'],
            'amount' => (double)$data['amount'],
            'group_id' => (int)$data['group']
        ]);

        return redirect(route('produto.exibir'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $id)
    {
        $id->delete();

        return redirect(route('produto.exibir'));
    }
}

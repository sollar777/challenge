<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Group;
use Exception;

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

        try {
            $data = $request->all();
            $group = Group::find($data['group']);

            $group->products()->create([
                'name' => $data['name'],
                'description' => $data['description'],
                'price_cost' => (float)$data['price_cost'],
                'price' => (float)$data['price'],
                'amount' => (float)$data['amount']
            ])->all();


            return response()->json([
                'success' => true,
                'message' => "produto cadastrado com sucesso!"

            ], 200);
        } catch (Exception $e) {
            return response()->json(['erro: ' => $e->getMessage()], 401);
        }
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
        try {
            $product = Product::where('id', $id)->first();
            $data = $request->all();

            $product->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'price_cost' => (float)$data['price_cost'],
                'price' => (float)$data['price'],
                'amount' => (float)$data['amount'],
                'group_id' => (int)$data['group']
            ]);

            return response()->json([
                'success' => true,
                'message' => "produto atualizado com sucesso!"
            ], 200);

        } catch (Exception $e) {
            return response()->json(['erro' => $e->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $id)
    {
        try{

        $id->delete();

        return response()->json([
                'success' => true,
                'message' => "produto removido com sucesso!"
            ], 200);

        }
        catch(Exception $e){
            return response()->json([
                'erro' => $e->getMessage()
            ], 401);
        }
    }
}

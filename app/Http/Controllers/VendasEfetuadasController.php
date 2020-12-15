<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Sale_iten;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\Process\ExecutableFinder;

class VendasEfetuadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $dados = $request->all();
            $sale = Sale::where('id', $dados['venda_id'])->first();
            $product = Product::where('id', $dados['product_id'])->first();
            $sale->sales_items()->create([
                'product_id'    => $dados['product_id'],
                'name_product'  => $product['name'],
                'price'         => $dados['price'],
                'amount'        => $dados['amount']
            ]);
            $result = $sale->sales_items()->get();
            //$result['success'] = true;
            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json([
                'erro' => $e->getMessage()
            ], 401);
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
        try {
            $dados = Sale_iten::where("id", $id)->first();
            $dados["success"] = true;
            return response()->json($dados, 200);
        } catch (Exception $e) {
            return response()->json([
                'erro' => $e->getMessage()
            ], 401);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale_iten $id)
    {
        try{
            $dados = $id;
            $venda = Sale::where("id", $id['sales_id'])->first();
            $dados->delete();
            $result = $venda->sales_items()->get();
            return response()->json([$result], 200);     
        }catch(Exception $e){
            return response()->json([
                "erro: " => $e
            ], 403);
        }
    }
}

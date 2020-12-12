<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Exception;
use Illuminate\Http\Request;

class VendasController extends Controller
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
        $users = User::all(['id', 'name']);
        $stores = Store::all();
        $clients = Client::all();
        $products = Product::all();
        $data_atual = CarbonImmutable::now()->isoFormat('DD/MM/YYYY');

        return view('cadastro_vendas', compact('users', 'stores', 'clients', 'data_atual', 'products'));
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
            $client = Client::find($dados['clients_id']);

            $result = $client->sales()->create([
                'store_id' => $dados['store_id'],
                'user_id' => $dados['user_id'],
                'obs' => $dados['obs'],
                'date' => $dados['date'],
                'discount' => 0,
            ]);

            $result['success'] = true;

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json([
                'erro' => $e->getMessage()
            ], 401);
        }
    }

    public function store_product(Request $request)
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
    public function destroy($id)
    {
        //
    }
}

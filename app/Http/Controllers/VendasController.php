<?php

namespace App\Http\Controllers;

use App\Models\Bloquete;
use App\Models\Client;
use App\Models\Pagamento;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Sale_iten;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendasController extends Controller
{

    public function index()
    {
        $vendas = DB::table('sales')
            ->join('sales_items', 'sales.id', '=', 'sales_items.sales_id')
            ->join('stores', 'sales.store_id', '=', 'stores.id')
            ->join('clients', 'sales.clients_id', '=', 'clients.id')
            ->join('users', 'sales.user_id', '=', 'users.id')
            ->select(
                'sales.id as id',
                'sales.discount as discount',
                DB::raw("DATE_FORMAT(sales.date, '%d/%m/%Y') as date"),
                'clients.name as cliente',
                'users.name as vendedor',
                'stores.name as loja',
                DB::raw('SUM((sales_items.amount * sales_items.price) - sales.discount) as total_venda')
            )
            ->groupBy('sales.id', 'sales.discount', 'users.name', 'sales.date', 'clients.name', 'stores.name')
            ->simplePaginate(10);


        return view('cadastro_vendas_listagem', compact('vendas'));
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
        $pagamentos = Pagamento::all();
        $data_atual = CarbonImmutable::now()->isoFormat('DD/MM/YYYY');

        return view('cadastro_vendas', compact(
            'users',
            'stores',
            'clients',
            'data_atual',
            'products',
            'pagamentos'
        ));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venda = Sale::find($id)->first();
        $vendas_itens = $venda->sales_items()->get();
        $bloquetes_venda = Bloquete::where('sales_id', $id)->first();
        $cliente_vendas = $venda->client()->get();
        $produtos = Product::all();
        $stores = Store::all();
        $pagamentos = Pagamento::all();
        $clientes = Client::all();

        return view('cadastro_vendas_editar', compact(
            'venda',
            'vendas_itens',
            'cliente_vendas',
            'produtos',
            'stores',
            'pagamentos',
            'clientes',
            'bloquetes_venda'
        ));
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

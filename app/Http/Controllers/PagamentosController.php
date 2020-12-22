<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Exception;
use Illuminate\Http\Request;

class PagamentosController extends Controller
{
    private $pagamentos;

    public function __construct(Pagamento $pagamento)
    {
        $this->pagamentos = $pagamento;
        $this->middleware('auth');
    }

    public function buscarPagamento()
    {
        try{
            $pagamentos = $this->pagamentos->all();
            return response()->json([$pagamentos], 200);
        }catch(Exception $e){
            return response()->json([
                'erro: ' => $e
            ], 403);
        }
    }
}

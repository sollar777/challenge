<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $empresas = Store::all();
        return view('empresa_listagem', compact('empresas'));
    }

    public function create()
    {
        return view('cadastro_empresa');
    }

    public function store(Request $request)
    {
        $dados = $request->all();


        Store::create([
            "name" => $dados["name"],
            "description" => $dados["description"],
            "phone" => $dados["phone"],
            "cgc" => $dados["cgc"]
        ]);

        return redirect()->route('empresa.listar');
    }
}

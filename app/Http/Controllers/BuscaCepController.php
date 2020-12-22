<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscaCepController extends Controller
{
    public function buscarCep($cep)
    {
        $cep_tratado = $cep;

        $url = "http://viacep.com.br/ws/$cep_tratado/xml/";

        $retorno = simplexml_load_file($url);

        return response()->json([$retorno], 200);
    }
}

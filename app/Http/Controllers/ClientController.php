<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;

class ClientController extends Controller
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->client->all();

        return view('listClients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('createClient', compact('users'));
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

        $user = User::find($data['user']);

        $client = $user->clients()->create($data);

        $client->address()->create([
            'street' => $data['street'],
            'number' => $data['number'],
            'city' => $data['city'],
            'state' => $data['state']
        ]);

        return redirect()->route('cliente.exibir');
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
        $client = $this->client->find($id); 
        $users = User::all();
        $address = $client->address()->first();

        return view('editClient', compact(['address', 'users', 'client']));
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
        $client = $this->client->find($id);
        $data = $request->all();

        $client->update($data);
        $client->address()->update([
            'street' => $data['street'],
            'number' => $data['number'],
            'city' => $data['city'],
            'state' => $data['state']
        ]);

        return redirect()->route('cliente.exibir');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = $this->client->find($id);

        $client->destroy();

        return redirect()->route('cliente.exibir');
    }

}

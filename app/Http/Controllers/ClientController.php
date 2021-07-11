<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

class ClientController extends Controller
{
    public function index() {

        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    public function detail($id)
    {

        $client = Client::findOrFail($id);

        return view('clients.show', compact('client'));
    }

    public function create()
    {
        return view('clients.create');
    }


    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'dni' => ['required', 'numeric']
        ],
        [
            'name.required' => 'El campo nombre es obligatorio',
            'dni.required' => 'El campo dni es obligatorio'
        ]);


        Client::create([
            'name' => $data['name'],
            'dni' => strval($data['dni']),
        ]);

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    public function update(Client $client)
    {

        $data = request()->validate([
            'name' => 'required',
            'dni' => ['required', 'numeric'],
        ]);
        // ,
        // [
        //     'name.required' => 'El campo nombre es obligatorio',
        //     'email.required' => 'El campo email es obligatorio',
        //     'email.email' => 'El campo email debe ser válido',
        // ]

        $client->update($data);
        return redirect()->route('clients.index', ['client' => $client]);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}

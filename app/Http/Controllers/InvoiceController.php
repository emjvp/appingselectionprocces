<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();

        return view('invoices.index', ['invoices' => $invoices]);
    }

    public function detail($id)
    {

        $client = Client::findOrFail($id);

        return view('clients.show', compact('client'));
    }

    public function create()
    {
        $invoices = Invoice::all();
        $products = Product::all();
        $lastInvoice = Invoice::latest()->first();
        $year = substr(date('Y'), 2);
        $title = "FV-{$year}-0001";

        if(isset($lastInvoice))
        {
            $titleExploded = explode('-', $lastInvoice);
            $cons = intval($titleExploded[2]) + 1;
            $titleExploded[2] = $cons;
            $title = implode('-', $titleExploded);
        }

        return view('invoices.create', ['title' => $title, 'products' => $products]);
    }


    public function store()
    {


        $data = request()->validate([
            'product' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'products' => 'required',
            'finished' => ''
        ],
        [
            'product.required' => 'El campo producto es obligatorio',
            'quantity.required' => 'El campo cantidad es obligatorio',
            'price.required' => 'El campo precio es obligatorio',
        ]);


        // Client::create([
        //     'name' => $data['name'],
        //     'dni' => strval($data['dni']),
        // ]);

        // return redirect()->route('clients.index');
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

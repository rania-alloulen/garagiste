<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use App\Models\Client;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{

    public function index(): View
    {
        $clients = Client::latest()->paginate(5);

        return view('clients.index',compact('clients'))->
            with('i', (request()->input('page', 1) - 1) * 5);;

    }


    public function create()
    {
        return view('clients.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required|max:10',
            'adresse' => 'required',
            "email"=>"required",
            'password'=>'required'
        ]);
        $user=User::create([
            'name' => $request->input('nom') . ' ' . $request->input('prenom'),
            'role' => 'client',
            'email'=>$request->input('email'),
            'password' => $request->input('password')
        ]);
        Client::create([
            'nom'=>$request->input('nom'),
            'prenom'=>$request->input('prenom'),
            'telephone'=>$request->input('telephone'),
            'adresse'=>$request->input('adresse'),
            'user_id'=>$user->id
        ]);
        return redirect()->route('clients.index')
                        ->with('success','client creer avec success.');
    }

    public function show()
    {
     $client_id = request('client_id');
     $client = Client::find($client_id);
     return view ('clients.show',compact('client'));
    }


    public function search()
    {
         $word = request('search');
         $clients = Client::where('nom','like','%'. $word .'%')
         ->orWhere ('prenom','like','%'. $word .'%')
         ->get();
         return view('clients.search', compact('clients'));

    }


    public function edit($id)
    {
        $clt = Client::findOrFail($id);
        $users=User::whereIn('role',['client'])->get();
        return view('clients.edit', compact('clt','users'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required|max:10',
        ]);

        $client = Client::findOrFail($id);
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->adresse = $request->input('adresse');
        $client->telephone = $request->input('telephone');
        $client->save();

        return redirect()->route('clients.index')
                        ->with('success', 'Client mis à jour avec succès');
    }


    public function delete(){
        $client_id=request('txtId');

        $client=Client::find($client_id);
        try{
           $client->delete();
           return "ok";
        } catch(\Exception $e){
           return "error";
        }

     }


     public function export()
     {
         return Excel::download(new ClientsExport, 'clients.xlsx');
     }

     public function import()
    {
        Excel::import(new ClientsImport,request()->file('file'));

        return back();
    }



}

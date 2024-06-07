<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Exports\MecaniciensExport;
use App\Imports\ClientsImport;
use App\Imports\MecaniciensImport;
use App\Models\Client;
use App\Models\Mecanicien as ModelsMecanicien;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Mecanicien extends Controller
{
   
    public function index(): View
    {
        $mecaniciens = ModelsMecanicien::latest()->paginate(5); 
        return view('mecaniciens.index',compact('mecaniciens'))->
            with('i', (request()->input('page', 1) - 1) * 5);;
                   
    }
  
 
    public function create(): View
    {
        $users=User::whereIn('role',['mecaniciens'])->get();
        return view('mecaniciens.create',compact('users'));
    }
  

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            "email"=>"required",
            'password'=>'required'
        ]);
        $user=User::create([
            'name' => $request->input('nom') . ' ' . $request->input('prenom'),
            'role' => 'mecanicien',
            'email'=>$request->input('email'),
            'password' => $request->input('password')
        ]);
        ModelsMecanicien::create([
            'nom'=>$request->input('nom'),
            'prenom'=>$request->input('prenom'),
            'telephone'=>$request->input('telephone'),
            'adresse'=>$request->input('adresse'),
            'user_id'=>$user->id
        ]);
        return redirect()->route('mecaniciens.index')
                        ->with('success','mecaniciens creer avec success.');
    }
 
    public function show()
    {
     $mecanicien_id = request('mecanicien_id');
     $mecanicien = ModelsMecanicien::find($mecanicien_id);
     return view ('mecaniciens.show',compact('mecanicien'));
    }
 
 
    public function search()
    {
         $word = request('search');
         $mecaniciens = ModelsMecanicien::where('nom','like','%'. $word .'%')
         ->orWhere ('prenom','like','%'. $word .'%')
         ->get();
         return view('mecaniciens.search', compact('mecaniciens'));
 
    }


    public function edit($id)
    {
        $meca = ModelsMecanicien::findOrFail($id);
        $users=User::whereIn('role',['mecanicien'])->get();
        return view('mecaniciens.edit', compact('meca','users'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
        ]);
        
        $mecanicien = ModelsMecanicien::findOrFail($id);
        $mecanicien->nom = $request->input('nom');
        $mecanicien->prenom = $request->input('prenom');
        $mecanicien->adresse = $request->input('adresse');
        $mecanicien->telephone = $request->input('telephone');
        $mecanicien->save();
    
        return redirect()->route('mecaniciens.index')
                        ->with('success', 'mecanicien mis à jour avec succès');
    }


    public function delete(){
        $mecanicien_id=request('txtId');
     
        $mecanicien=ModelsMecanicien::find($mecanicien_id);
        try{
           $mecanicien->delete();
           return "ok";
        } catch(\Exception $e){
           return "error";
        }
  
     }


     public function export() 
     {
         return Excel::download(new MecaniciensExport, 'clients.xlsx');
     }

     public function import()
    {
        Excel::import(new MecaniciensImport,request()->file('file'));

        return back();
    }

    

}

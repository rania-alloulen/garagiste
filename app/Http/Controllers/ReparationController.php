<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicule;
use App\Models\Reparation;
use App\Models\Mecanicien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ReparationController extends Controller
{
  // ReparationController.php
  public function index()
  {
      // Récupérer tous les véhicules avec le nom du client associé
      $reparations = Reparation::leftJoin('mecaniciens', 'reparations.mecanic_id', '=', 'mecaniciens.id')
                            ->select('reparations.*', 'mecaniciens.nom AS nom_mecaniciens')
                            ->get();

      // Passer les données à la vue
      return view('reparations.index', compact('reparations'));
  }
  public function create()
    {
        $mecaniciens = Mecanicien::all(); // Récupérer tous les mécaniciens
        $vehicules = Vehicule::all(); // Récupérer tous les véhicules
        $statusOptions = ['En cours', 'Terminé', 'En attente']; // Options de statut pour la réparation

        // Définir les valeurs par défaut pour startDate et endDate
        $defaultStartDate = now()->toDateString(); // Date actuelle
        $defaultEndDate = now()->addWeek()->toDateString(); // Une semaine après la date actuelle

        return view('reparations.create', compact('mecaniciens', 'vehicules', 'statusOptions', 'defaultStartDate', 'defaultEndDate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'mecanicien_id' => 'required',
            'status' => 'required',
            'vehicule_id' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ]);

        // Création de la réparation
        Reparation::create([
            'description' => $request->input('description'),
            'mecanic_id' => $request->input('mecanicien_id'),
            'status' => $request->input('status'),
            'vehicule_id' => $request->input('vehicule_id'),
            'startDate' => $request->input('startDate'),
            'endDate' => $request->input('endDate'),
            'mechanicNotes' => $request->input('mechanicNotes', null), // Valeur par défaut null
            'clientNotes' => $request->input('clientNotes', null), // Valeur par défaut null
        ]);

        return redirect()->route('reparations.index')
                         ->with('success', 'Réparation créée avec succès.');
    }

    public function show()
    {
     $reparation_id= request('reparation_id');
     $reparation = Reparation::find($reparation_id);
     return view ('reparations.show',compact('reparation'));
    }

    public function edit($id)
    {
        $rep = Reparation::findOrFail($id);
        $mecaniciens = Mecanicien::all(); // Récupérer tous les mécaniciens
        $vehicules = Vehicule::all(); // Récupérer tous les véhicules
        $statusOptions = ['En cours', 'terminer', 'En attente'];
        return view('reparations.edit', compact('rep','mecaniciens','vehicules','statusOptions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'status' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'mechanicNotes' => 'required',
            'clientNotes' => 'required'

        ]);

        $reparation = Reparation::findOrFail($id);
        $reparation->status = $request->input('status');
        $reparation->startDate = $request->input('startDate');
        $reparation->endDate = $request->input('endDate');
        $reparation->mechanicNotes = $request->input('mechanicNotes');
        $reparation->clientNotes = $request->input('clientNotes');


        $reparation->save();

        return redirect()->route('reparations.liste')
                        ->with('success', 'reparations mis à jour avec succès');
    }


    public function delete(){
        $reparation_id=request('txtId');

        $reparation=Reparation::find($reparation_id);
        try{
           $reparation->delete();
           return "ok";
        } catch(\Exception $e){
           return "error";
        }

     }

     public function liste()
  {
    $user = Auth::user();

    // Trouver le client correspondant à l'utilisateur
    $mecanicien = Mecanicien::where('user_id', $user->id)->first();
    $mecanicien_id = $mecanicien->id;
    $reparations = Reparation::leftJoin('mecaniciens', 'reparations.mecanic_id', '=', 'mecaniciens.id')
                            ->select('reparations.*', 'mecaniciens.nom AS nom_mecaniciens')
                           -> where('mecanic_id',  $mecanicien_id)
                            ->get();

      // Passer les données à la vue
      return view('reparations.liste', compact('reparations'));
  }





}





<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use App\Models\Reparation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Mecanicien;

class FactureController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $mecanicien = Mecanicien::where('user_id', $user->id)->first();

    // Vérifier si le mécanicien existe
    if (!$mecanicien) {
        return redirect()->route('home')->with('error', 'Mécanicien non trouvé.');
    }

    $mecanicien_id = $mecanicien->id;

    // Récupérer les factures avec les informations des réparations, des véhicules et des clients
    $factures = Facture::leftJoin('reparations', 'factures.reparation_id', '=', 'reparations.id')
                       ->leftJoin('vehicules', 'reparations.vehicule_id', '=', 'vehicules.id')
                       ->leftJoin('clients', 'vehicules.client_id', '=', 'clients.id')
                       ->select('factures.*', 'clients.nom as client_nom', 'clients.prenom as client_prenom')
                       ->where('reparations.mecanic_id', $mecanicien_id)
                       ->get();

    return view('factures.index', compact('factures'));
}

    public function create()
    {
        $user = Auth::user();
        $mecanicien = Mecanicien::where('user_id', $user->id)->first();
        $reparations = Reparation::where('mecanic_id', $mecanicien->id)->get();
        return view('factures.create', compact('reparations'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'chargeSupp' => 'required', // Assurez-vous que 'chargeSupp' est un nombre si nécessaire
            'montant' => 'required', // Assurez-vous que 'montant' est un nombre
            'reparation_id' => 'required|exists:reparations,id' // Assurez-vous que 'reparation_id' existe dans la table 'reparations'
        ]);

        // Créer la facture
        Facture::create([
            'chargeSupp' => $request->input('chargeSupp'),
            'montant' => $request->input('montant'),
            'reparation_id' => $request->input('reparation_id')
        ]);

        // Rediriger vers la liste des factures avec un message de succès
        return redirect()->route('factures.index')
                         ->with('success', 'Facture créée avec succès.');
    }


    public function edit($id)
    {
        $fc = Facture::findOrFail($id);
        $user = Auth::user();
        $mecanicien = Mecanicien::where('user_id', $user->id)->first();
        $reparations = Reparation::where('mecanic_id', $mecanicien->id)->get();
        return view('factures.edit', compact('fc','reparations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'chargeSupp' => 'required',
            'montant' => 'required',
            'reparation_id' => 'required',

        ]);

        $facture = Facture::findOrFail($id);
        $facture->chargeSupp = $request->input('chargeSupp');
        $facture->montant = $request->input('montant');
        $facture->reparation_id = $request->input('reparation_id');
        $facture->save();


        return redirect()->route('factures.index')
                        ->with('success', 'facture mis à jour avec succès');
    }

    public function listec()
    {
        $user = Auth::user();
        $clients = Client::where('user_id', $user->id)->first();



        $client_id = $clients->id;

        // Récupérer les factures avec les informations des réparations, des véhicules et des clients
        $factures = Facture::leftJoin('reparations', 'factures.reparation_id', '=', 'reparations.id')
                           ->leftJoin('vehicules', 'reparations.vehicule_id', '=', 'vehicules.id')
                           ->leftJoin('clients', 'vehicules.client_id', '=', 'clients.id')
                           ->select('factures.*', 'clients.nom as client_nom', 'clients.prenom as client_prenom')
                           ->where('reparations.mecanic_id', $client_id)
                           ->get();

        return view('factures.listec', compact('factures'));
    }
    public function listea()
    {

        $factures = Facture::leftJoin('reparations', 'factures.reparation_id', '=', 'reparations.id')
                           ->leftJoin('vehicules', 'reparations.vehicule_id', '=', 'vehicules.id')
                           ->leftJoin('clients', 'vehicules.client_id', '=', 'clients.id')
                           ->select('factures.*', 'clients.nom as client_nom', 'clients.prenom as client_prenom')
                           ->get();
        return view('factures.listea', compact('factures'));
    }

}




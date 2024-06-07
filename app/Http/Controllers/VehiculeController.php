<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Reparation;
use App\Models\Mecanicien;
class VehiculeController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // Trouver le client correspondant à l'utilisateur
        $client = Client::where('user_id', $user->id)->first();
        $client_id = $client->id;
        $vehicules = Vehicule::where('client_id', $client_id)->get();
        return view('vehicules.index', compact('vehicules'));
    }

        public function create()
        {

            return view('vehicules.create');
        }


        public function store(Request $request)
        {
            $request->validate([
                'marque' => 'required',
                'modele' => 'required',
                'typeFuel' => 'required',
                'registration' => 'required',
                "image"=>"required",
            ]);

            $user = Auth::user();

            // Trouver le client correspondant à l'utilisateur
            $client = Client::where('user_id', $user->id)->first();

            if (!$client) {
                return redirect()->route('vehicules.create')->withErrors('Aucun client trouvé pour cet utilisateur.');
            }

            // Traiter l'image
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imageName);


            Vehicule::create([
                'marque'=>$request->input('marque'),
                'modele'=>$request->input('modele'),
                'typeFuel'=>$request->input('typeFuel'),
                'registration'=>$request->input('registration'),
                'image'=> $imageName, // Enregistrer le nom de l'image
                'client_id' => $client->id,


            ]);
            return redirect()->route('vehicules.index')
                            ->with('success','vehicule creer avec success.');
        }

        public function show()
        {
         $vehicule_id = request('vehicule_id');
         $vehicule = Vehicule::find($vehicule_id);
         return view ('vehicules.show',compact('vehicule'));
        }


        public function search()
        {
             $word = request('search');
             $vehicules = Vehicule::where('marque','like','%'. $word .'%')
             ->orWhere ('model','like','%'. $word .'%')
             ->get();
             return view('vehicules.search', compact('vehicules'));

        }



        public function liste()
        {
            // Récupérer tous les véhicules avec le nom du client associé
            $vehicules = Vehicule::leftJoin('clients', 'vehicules.client_id', '=', 'clients.id')
                                  ->select('vehicules.*', 'clients.nom AS nom_client','clients.prenom')
                                  ->get();

            // Passer les données à la vue
            return view('vehicules.liste', compact('vehicules'));
        }


        public function edit($id)
        {
            $vc = Vehicule::findOrFail($id);
            return view('vehicules.edit', compact('vc'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'marque' => 'required',
                'modele' => 'required',
                'typeFuel' => 'required',
                'registration' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Créez le dossier 'public/images' s'il n'existe pas
            $imagePath = public_path('images');
            if (!File::isDirectory($imagePath)) {
                File::makeDirectory($imagePath, 0777, true, true);
            }

            $vehicule = Vehicule::findOrFail($id);

            if ($request->hasFile('image')) {
                // Supprimez l'ancienne image si elle existe
                if ($vehicule->image && file_exists(public_path('images/' . $vehicule->image))) {
                    unlink(public_path('images/' . $vehicule->image));
                }

                // Enregistrez la nouvelle image
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);

                // Mettez à jour le nom de l'image dans la base de données
                $vehicule->image = $imageName;
            }

            $vehicule->marque = $request->input('marque');
            $vehicule->modele = $request->input('modele');
            $vehicule->typeFuel = $request->input('typeFuel');
            $vehicule->registration = $request->input('registration');
            $vehicule->save();

            return redirect()->route('vehicules.index')->with('success', 'Véhicule mis à jour avec succès');
        }

        public function edit2($id)
        {
            $vc = Vehicule::findOrFail($id);
            return view('vehicules.edit2', compact('vc'));
        }

        public function update2(Request $request, $id)
        {
            $request->validate([
                'marque' => 'required',
                'modele' => 'required',
                'typeFuel' => 'required',
                'registration' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Créez le dossier 'public/images' s'il n'existe pas
            $imagePath = public_path('images');
            if (!File::isDirectory($imagePath)) {
                File::makeDirectory($imagePath, 0777, true, true);
            }

            $vehicule = Vehicule::findOrFail($id);

            if ($request->hasFile('image')) {
                // Supprimez l'ancienne image si elle existe
                if ($vehicule->image && file_exists(public_path('images/' . $vehicule->image))) {
                    unlink(public_path('images/' . $vehicule->image));
                }

                // Enregistrez la nouvelle image
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);

                // Mettez à jour le nom de l'image dans la base de données
                $vehicule->image = $imageName;
            }

            $vehicule->marque = $request->input('marque');
            $vehicule->modele = $request->input('modele');
            $vehicule->typeFuel = $request->input('typeFuel');
            $vehicule->registration = $request->input('registration');
            $vehicule->save();

            return redirect()->route('vehicules.liste')->with('success', 'Véhicule mis à jour avec succès');
        }

        public function delete(){
            $vehicule_id=request('txtId');

            $vehicule=Vehicule::find($vehicule_id);
            try{
               $vehicule->delete();
               return "ok";
            } catch(\Exception $e){
               return "error";
            }

         }
         public function listem()
         {
             $user = Auth::user();
             $mecanicien = Mecanicien::where('user_id', $user->id)->first();

             $mecanicien_id = $mecanicien->id;

             // Récupérer les réparations du mécanicien
             $reparations = Reparation::leftJoin('vehicules', 'reparations.vehicule_id', '=', 'vehicules.id')
                                      ->leftJoin('clients', 'vehicules.client_id', '=', 'clients.id')
                                      ->select( 'vehicules.*', 'clients.nom AS client_nom', 'clients.prenom AS client_prenom')
                                      ->where('reparations.mecanic_id', $mecanicien_id)
                                      ->get();

             // Passer les données à la vue
             return view('vehicules.listem', compact('reparations'));


}}

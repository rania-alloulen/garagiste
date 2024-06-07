<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Mecanicien;
use App\Models\Piece;
use Illuminate\Support\Facades\Auth;
use PDF;

class PDFController extends Controller
{
    public function generatePdfc()
    {
        $logo = 'storage/logos/logo.png';
        $clients=Client::all();
        $data =
        [
            'title' => 'Liste des clients',
            'clients'=>$clients,
            'logo'=>$logo
        ];
        $pdf = PDF::loadView('pdf.clientpdf', $data)->setPaper('a4','landscape');
        return $pdf->download('document.pdf');
    }

    public function generatePdfm()
    {
        $logo = 'storage/logos/logo.png';
        $mecaniciens=Mecanicien::all();
        $data =
        [
            'title' => 'Liste des mecaniciens',
            'mecaniciens'=>$mecaniciens,
            'logo'=>$logo
        ];
        $pdf = PDF::loadView('pdf.mecanicienspdf', $data)->setPaper('a4','landscape');
        return $pdf->download('document.pdf');
    }
    public function generatePdfp()
    {
        $logo = 'storage/logos/logo.png';
        $pieces=Piece::all();
        $data =
        [
            'title' => 'Liste des pieces',
            'pieces'=>$pieces,
            'logo'=>$logo
        ];
        $pdf = PDF::loadView('pdf.piecespdf', $data)->setPaper('a4','landscape');
        return $pdf->download('document.pdf');
    }

    public function generatePdff()
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

        $data =
        [
            'title' => 'Facture',
            'factures'=>$factures,

        ];
        $pdf = PDF::loadView('pdf.facturepdf', $data)->setPaper('a4','landscape');
        return $pdf->download('document.pdf');
    }
}

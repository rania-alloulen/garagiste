<?php

// app/Http/Controllers/EmailController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Mail\DemoMail;

class SendController extends Controller
{
    public function showForm()
    {
        return view('emails.sendEmail');
    }

    public function sendEmail(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'title' => $request->input('subject'),
            'body' => $request->input('content'),
        ];

        // Envoyer l'e-mail
        Mail::to('raniaalloulen@gmail.com')->send(new sendEmail($data));
           
        dd("Email is sent successfully.");
    }
}
         

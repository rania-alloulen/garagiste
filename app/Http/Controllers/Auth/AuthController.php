<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserVerify;
use Session ;
use Hash ;
class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


    public function registration()
    {
        return view('auth.registration');
    }


    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user=Auth::user();
            if($user->role=='admin'){
                 return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
            }elseif($user->role=='client'){
                return redirect()->intended('clientPage')
                        ->withSuccess('You have Successfully loggedin');
            }elseif($user->role=='mecanicien'){
                return redirect()->intended('mecanicien')
                        ->withSuccess('You have Successfully loggedin');
            }

        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }


    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();

        $check = $this->create($data);

        return redirect("login")->withSuccess('Great! You have Successfully loggedin');
    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }


    public function create(array $data)
{
    // Créer l'utilisateur
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
    ]);

    // Ajouter l'entrée dans la table clients
    Client::create([
        'nom' => $data['nom'],
        'prenom' => $data['prenom'],
        'telephone' => $data['telephone'],
        'adresse' => $data['adresse'],
        'user_id' => $user->id
    ]);

    return $user;
}



    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

      return redirect()->route('login')->with('message', $message);
    }
}

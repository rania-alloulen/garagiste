<?php

use App\Http\Controllers\Mecanicien;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Symfony\Component\VarDumper\Command\Descriptor\CliDescriptor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/clientPage',function(){
    return view('clientPage');
})->name('clientPage');

Route::get('/mecanicien',function(){
    return view('mecanicien');
})->name('mecanicien');


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//crud client

Route::middleware(['auth'])->group(function () {
    Route::get('/clients/index', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients/show', [ClientController::class, 'show'])->name('clients.show');
    Route::post('/clients/search', [ClientController::class, 'search'])->name('clients.search');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
    Route::post('/clients/delete', [ClientController::class, 'delete'])->name('clients.delete');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']);
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::get('/generate-pdfc', [PDFController::class, 'generatePDFc'])->name('generate-pdfc');
    Route::controller(ClientController::class)->group(function(){
        Route::get('clients', 'index')->name('clients.index');
        Route::get('clients-export', 'export')->name('clients.export');
        Route::post('clients-import', 'import')->name('clients.import');
    });

// mecanciens
    Route::get('/mecaniciens/index',[Mecanicien::class,'index'])->name('mecaniciens.index');
    Route::get('/mecaniciens/create',[Mecanicien::class,'create'])->name('mecaniciens.create');
    Route::post('/mecaniciens/show',[Mecanicien::class,'show'])->name('mecaniciens.show');
    Route::post('/mecaniciens/search',[Mecanicien::class,'search'])->name('mecaniciens.search');
    Route::post('/mecaniciens/store',[Mecanicien::class,'store'])->name('mecaniciens.store');
    Route::post('/mecaniciens/delete',[Mecanicien::class,'delete'])->name('mecaniciens.delete');


    Route::controller(Mecanicien::class)->group(function(){
        Route::get('mecaniciens', 'index')->name('mecaniciens.index');
        Route::get('mecaniciens-export', 'export')->name('mecaniciens.export');
        Route::post('mecaniciens-import', 'import')->name('mecaniciens.import');
    });

    Route::get('/mecaniciens/{id}/edit', [Mecanicien::class, 'edit'])->name('mecaniciens.edit');
    Route::put('/mecaniciens/{id}', [Mecanicien::class, 'update'])->name('mecaniciens.update');
    Route::get('/generate-pdfm', [PDFController::class, 'generatePDFm'])->name('generate-pdfm');

    //pieces

    Route::get('/pieces/index',[PieceController::class,'index'])->name('pieces.index');
    Route::get('/pieces/create',[PieceController::class,'create'])->name('pieces.create');
    Route::post('/pieces/show',[PieceController::class,'show'])->name('pieces.show');
    Route::post('/pieces/search',[PieceController::class,'search'])->name('pieces.search');
    Route::post('/pieces/store',[PieceController::class,'store'])->name('pieces.store');
    Route::post('/pieces/delete',[PieceController::class,'delete'])->name('pieces.delete');
    Route::get('/pieces/{id}/edit', [PieceController::class, 'edit'])->name('pieces.edit');
    Route::put('/pieces/{id}', [PieceController::class, 'update'])->name('pieces.update');
    Route::get('/generate-pdfp', [PDFController::class, 'generatePDFp'])->name('generate-pdfp');
    //vehicules
    Route::get('/vehicules/index',[VehiculeController::class,'index'])->name('vehicules.index');
    Route::get('/vehicules/liste',[VehiculeController::class,'liste'])->name('vehicules.liste');
    Route::get('/vehicules/listem',[VehiculeController::class,'listem'])->name('vehicules.listem');

    Route::get('/vehicules/search',[VehiculeController::class,'search'])->name('vehicules.search');
    Route::get('/vehicules/create',[VehiculeController::class,'create'])->name('vehicules.create');
    Route::post('/vehicules/store',[VehiculeController::class,'store'])->name('vehicules.store');
    Route::get('/vehicules/{id}/edit', [VehiculeController::class, 'edit'])->name('vehicules.edit');
    Route::put('/vehicules/{id}', [VehiculeController::class, 'update'])->name('vehicules.update');
    Route::post('/vehicules/show',[VehiculeController::class,'show'])->name('vehicules.show');
    Route::post('/vehicules/delete',[VehiculeController::class,'delete'])->name('vehicules.delete');
    Route::get('/vehicules/{id}/edit2', [VehiculeController::class, 'edit2'])->name('vehicules.edit2');
    Route::post('/vehicules/{id}', [VehiculeController::class, 'update2'])->name('vehicules.update2');
    //reparations
    Route::get('/reparations/index',[ReparationController::class,'index'])->name('reparations.index');
    Route::get('/reparations/create',[ReparationController::class,'create'])->name('reparations.create');
    Route::post('/reparations/store',[ReparationController::class,'store'])->name('reparations.store');
    Route::get('/reparations/liste',[ReparationController::class,'liste'])->name('reparations.liste');
    Route::post('/reparations/show',[ReparationController::class,'show'])->name('reparations.show');
    Route::get('/reparations/{id}/edit',[ReparationController::class,'edit'])->name('reparations.edit');
    Route::post('/reparations/{id}',[ReparationController::class,'update'])->name('reparations.update');

    //factures

    Route::get('/factures/index',[FactureController::class,'index'])->name('factures.index');
    Route::get('/factures/create',[FactureController::class,'create'])->name('factures.create');
    Route::post('/factures/store',[FactureController::class,'store'])->name('factures.store');
    Route::get('/factures/liste',[FactureController::class,'liste'])->name('factures.liste');
    Route::get('/factures/listem',[FactureController::class,'listem'])->name('factures.listem');
    Route::post('/factures/show',[FactureController::class,'show'])->name('factures.show');
    Route::get('/factures/listec',[FactureController::class,'listec'])->name('factures.listec');
    Route::get('/factures/{id}/edit',[FactureController::class,'edit'])->name('factures.edit');
    Route::post('/factures/{id}',[FactureController::class,'update'])->name('factures.update');
    Route::get('/generate-pdff', [PDFController::class, 'generatePDFf'])->name('generate-pdff');
    Route::get('/factures/listea',[FactureController::class,'listea'])->name('factures.listea');
});



Route::get('/admin/send-notification', function () {
    return view('admin.send-notification');
})->name('admin.sendNotificationForm');
Route::get('/admin/send-notification', [AdminController::class, 'showSendNotificationForm'])->name('admin.sendNotificationForm');
Route::post('/admin/send-notification', [AdminController::class, 'sendNotification'])->name('admin.sendNotification');
//
Route::get('send-mail', [MailController::class, 'index']);
Route::get('/send-email', [SendController::class, 'showForm'])->name('send.email.form');
Route::post('/send-email', [SendController::class, 'sendEmail'])->name('send.email');

//

Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');

Route::get('/changeLocale/{locale}',function($locale){
    session()->put('locale',$locale);
    return redirect()->back();
})->name('clients.changeLocale');


<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Access Admin
Route::group(['middleware' => ['admin']], function () {
    

    Route::get('dashbord_admin', [App\Http\Controllers\AdminController::class, 'dashbord_admin'])->name('dashbord_admin');
    Route::get('/getClientsXPOKJDUEDDJH', [App\Http\Controllers\ClientDashbordController::class, 'getClients'])->name('getClientsXPOKJDUEDDJH');

    Route::get('/getEnquetesXPOKJDUEDDJH', [App\Http\Controllers\EnqueteDashbordController::class, 'getEnquetes'])->name('getEnquetesXPOKJDUEDDJH');

    Route::get('/createEnqueteXPEJJDZK89', [App\Http\Controllers\EnqueteDashbordController::class, 'create_enquete'])->name('createEnqueteXPEJJDZK89');

    Route::post('/saveEnqueteXPEJJDZK89', [App\Http\Controllers\EnqueteDashbordController::class, 'save_enquete'])->name('saveEnqueteXPEJJDZK89');

    Route::get('/getEnquetesSubmit', [App\Http\Controllers\EnqueteDashbordController::class, 'getEnquetesSubmit'])->name('getEnquetesSubmit');
    
});

 
// Access Usser

// Access User
Route::group(['middleware' => ['user_midle']], function () {

    Route::get('/enquetes', [App\Http\Controllers\EnqueteController::class, 'get_enquetes'])->name('get_enquete');
    Route::get('/recompenses', [App\Http\Controllers\RecompenseController::class, 'get_recompenses'])->name('get_recompenses');
    Route::get('/paiement', [App\Http\Controllers\PaiementController::class, 'get_paiement'])->name('get_paiement');
    
    // Create et get profilage
    Route::get('/profilage', [App\Http\Controllers\ProfilageController::class, 'get_profilage'])->name('get_profilage');
    //Route::get('/create_profilage', [App\Http\Controllers\ProfilageController::class, 'create_profilage'])->name('create_profilage');

    Route::post('/create_profilage', [App\Http\Controllers\ProfilageController::class, 'create_profilage'])->name('save_profilage');


    Route::get('/securite', [App\Http\Controllers\SecuriteController::class, 'get_securite'])->name('get_securite');
    Route::get('/dashbord_user', [App\Http\Controllers\HomeController::class, 'dashbord_user'])->name('dashbord_user')->middleware('auth');
    Route::get('/get_info_profil', [App\Http\Controllers\ClientController::class, 'get_info_profil'])->name('get_info_profil');
    Route::patch('/update_profile/{id}', [App\Http\Controllers\ClientController::class, 'update_profile'])->name('update_profile');

});

Auth::routes();


Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('/registere', [App\Http\Controllers\ClientController::class, 'createClient'])->name('registere');

Route::post('/logoute', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logoute');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/verify', [App\Http\Controllers\ClientController::class, 'verify'])->name('verify');

Route::get('send-mail', function () {
    $message = 'Bonjour <b> Cheikh </b>';
    $message.='Merci pour votre inscription, nous vous demandons de verifier votre adresse mail pour completer votre inscription.';

    $email_data = [
        'recipient'=>'gaye95cheikh@gmail.com',
        'fromEmail'=>'gaye95cheikh@gmail.com',
        'fromName'=>'Cheikh',
        'subject'=>'Email verification',
        'body'=>$message,
        'actionLink'=>'localhost:8000/register',
    ];
    
    Mail::send('email_template', $email_data, function($message) use ($email_data)
            {
                $message->to($email_data['recipient'])
                        ->from($email_data['fromEmail'], $email_data['fromName'])
                        ->subject($email_data['subject']);
            });
    dd("Email is Sent.");
});
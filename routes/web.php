<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
Route::group(['middleware' => ['admin','superuser']], function () {
    

    Route::get('dashbord_admin', [App\Http\Controllers\AdminController::class, 'dashbord_admin'])->name('dashbord_admin');
    Route::get('/getClientsXPOKJDUEDDJH', [App\Http\Controllers\ClientDashbordController::class, 'getClients'])->name('getClientsXPOKJDUEDDJH');

    Route::get('/getEnquetesXPOKJDUEDDJH', [App\Http\Controllers\EnqueteDashbordController::class, 'getEnquetes'])->name('getEnquetesXPOKJDUEDDJH');

    Route::get('/createEnqueteXPEJJDZK89', [App\Http\Controllers\EnqueteDashbordController::class, 'create_enquete'])->name('createEnqueteXPEJJDZK89');

    Route::post('/saveEnqueteXPEJJDZK89', [App\Http\Controllers\EnqueteDashbordController::class, 'save_enquete'])->name('saveEnqueteXPEJJDZK89');

    Route::get('/getEnquetesSubmit', [App\Http\Controllers\EnqueteDashbordController::class, 'getEnquetesSubmit'])->name('getEnquetesSubmit');

    Route::get('/info_detail_enquete/{slug}', [App\Http\Controllers\EnqueteDashbordController::class, 'info_detail_enquete'])->name('info_detail_enquete');

    Route::get('/messagesend', [App\Http\Controllers\EnqueteDashbordController::class, 'messagesend'])->name('messagesend');
    Route::post('/sendmail_user', [App\Http\Controllers\SendMailController::class, 'sendmail_user'])->name('sendmail_user');
    Route::get('/info_detail_client/{slug}', [App\Http\Controllers\EnqueteDashbordController::class, 'info_detail_client'])->name('info_detail_client');
    Route::get('/getValidateurKKJHGFG', [App\Http\Controllers\ValidateurController::class, 'get_validateur'])->name('get_validateur');

    Route::post('/saveValidateur', [App\Http\Controllers\ValidateurController::class, 'create_validateur'])->name('create_validateur');
    Route::get('/info_detail_validateur/{slug}', [App\Http\Controllers\ValidateurController::class, 'info_detail_validateur'])->name('info_detail_validateur');

    Route::get('/enable/{slug}', [App\Http\Controllers\AdminController::class, 'enable_user'])->name('enable_user');
    Route::get('/disable/{slug}', [App\Http\Controllers\AdminController::class, 'disable_user'])->name('disable_user');

    Route::get('/securite_admin', [App\Http\Controllers\SecuriteController::class, 'get_securite_admin'])->name('get_securite_admin');

    Route::get('/get_info_profile', [App\Http\Controllers\AdminController::class, 'get_info_profile'])->name('get_info_profile');
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
    Route::patch('/update_user_email', [App\Http\Controllers\ClientController::class, 'update_user_email'])->name('update_user_email');
    Route::post('/update_user_password', [App\Http\Controllers\ClientController::class, 'update_user_password'])->name('update_user_password');


    Route::post('/delete_account', [App\Http\Controllers\ClientController::class, 'delete_account'])->name('delete_account');
});

Auth::routes();


Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('/registere', [App\Http\Controllers\ClientController::class, 'createClient'])->name('registere');

Route::get('/registered-activation', [App\Http\Controllers\HomeController::class, 'registered_activation'])->name('registered_activation');

Route::post('/logoute', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logoute');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/verify/{token}', [App\Http\Controllers\ClientController::class, 'verify'])->name('verify');

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

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/get_info_profil');
})->middleware(['auth', 'signed'])->name('verification.verify');
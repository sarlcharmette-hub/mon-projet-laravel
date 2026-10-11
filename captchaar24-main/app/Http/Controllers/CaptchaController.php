<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function show()
    {
        $a = random_int(1, 9);
        $b = random_int(1, 9);

        session([
            'captcha_question' => "$a + $b",
            'captcha_answer' => $a + $b,
        ]);

        return view('captcha');
    }

    public function verify(Request $request)
{
    $request->validate([
        'captcha' => [
            'required',
            'numeric',
        ],
    ], [
        'captcha.required' => 'Veuillez répondre à la question.',
        'captcha.numeric' => 'Veuillez saisir un nombre.',
    ]);

    if ((int) $request->captcha !== (int) session('captcha_answer')) {

        return back()
            ->withErrors([
                'captcha' => 'Réponse incorrecte. Veuillez réessayer.',
            ])
            ->withInput();
    }

    // CAPTCHA validé
    session([
        'captcha_verified' => true,
    ]);

    // Supprimer les données temporaires
    session()->forget([
        'captcha_question',
        'captcha_answer',
    ]);

    // Rester sur captcha.blade.php
    return view('captcha');
}
}
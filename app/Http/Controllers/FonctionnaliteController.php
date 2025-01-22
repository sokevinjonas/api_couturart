<?php

namespace App\Http\Controllers;

use Log;
use Exception;
use App\Models\SmsLog;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Models\SmsManagement;
use App\Models\Fonctionnalite;
use Illuminate\Http\JsonResponse;

class FonctionnaliteController extends Controller
{
    
     /**
     * Met à jour les paramètres d'une fonctionnalité pour un utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        // Valider les données d'entrée
        $validatedData = $request->validate([
            'cacher_chiffres_affaires' => 'required|boolean', 
            'activer_sms' => 'required|boolean', 
            'mode_sms' => 'required|in:auto,manuel', 
            'user_id' => 'required|string',
            'messages' => 'required|array', 
            'messages.nouvelleCommande' => 'required|string', 
            'messages.avanceVersee' => 'required|string', 
            'messages.commandePrete' => 'required|string', 
            'messages.retardRecuperation' => 'required|string', 
        ]);
    
        // Récupérer l'utilisateur authentifie
        $userId = auth()->id();
    
        // Trouver les paramètres existants de l'utilisateur
        $fonctionnalite = Fonctionnalite::where('user_id', $userId)->first();
    
        // Si aucune fonctionnalité n'existe, on retourne une erreur
        if (!$fonctionnalite) {
            // Convertir les messages en JSON avant la création

            $validatedData['messages'] = json_encode($validatedData['messages']);
            $newF = Fonctionnalite::create($validatedData);
            return response()->json([
                'success' => true,
                'data' => $newF,
                'message' => 'Paramètres creer avec succès',
            ], 200);
        }
    
        // Mettre à jour les champs uniquement si des données sont présentes dans la requête
        $fonctionnalite->cacher_chiffres_affaires = $validatedData['cacher_chiffres_affaires'];
        $fonctionnalite->activer_sms = $validatedData['activer_sms'];
        $fonctionnalite->mode_sms = $validatedData['mode_sms'];
    
        // Mise à jour des messages
        $fonctionnalite->messages = json_encode($validatedData['messages']);
    
        // Sauvegarder les modifications
        $fonctionnalite->save();
    
        // Réponse avec les données mises à jour
        return response()->json([
            'success' => true,
            'data' => $fonctionnalite,
            'message' => 'Paramètres mis à jour avec succès.',
        ], 200);
    }

    public function sendSms(Request $request)
{
    $validated = $request->validate([
        'nameClient' => 'required|string',
        'message' => 'required|string',
        'number' => 'required|string',
    ]);

    try {    
        // Vérification du plan
        $abonnement = Abonnement::with('licence')
            ->where('user_id', auth()->user()->id)
            ->first();
            
        if ($abonnement->licence->plan === 'Essentiel') {
            return response()->json([
                'success' => false,
                'message' => "Votre plan d'abonnement ne permet pas l'envoi de SMS."
            ], 403);
        }            
        
        // Vérification des crédits SMS
        $smsManagement = SmsManagement::where('user_id', auth()->user()->id)->first();
        $sms_restants = $smsManagement->total_sms_inclus - $smsManagement->sms_utilises;
        
        if ($sms_restants <= 0) {
            return response()->json([
                'success' => false,
                'message' => "Vous n'avez pas suffisamment de crédits SMS."
            ], 403);
        }

        // Préparation des données SMS
        $smsContent = [
            "from" => "Couturart",
            "to" => [$validated['number']],
            "text" => "Bonjour {$validated['nameClient']}! {$validated['message']}"
        ];

        // Configuration cURL selon la documentation
        $ch = curl_init("https://www.aqilas.com/api/v1/sms");
        $headers = [
            'Content-Type: application/json',
            'X-AUTH-TOKEN:' .env('API_AUTH_TOKEN')
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($smsContent));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json_response = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $response = json_decode($json_response, true);

        // En cas d'erreur cURL
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }

        curl_close($ch);

        // Création du log
        $smsLog = new SmsLog();
        $smsLog->user_id = auth()->user()->id;
        $smsLog->recipient_number = $validated['number'];
        $smsLog->message = $validated['message'];
        $smsLog->sent_at = now();

        // Traitement de la réponse
        if ($status == 200 || $status == 201) {
            // Mise à jour des crédits SMS
            $smsManagement->total_sms_inclus -= 1;
            $smsManagement->sms_utilises += 1;
            $smsLog->status = true;
            $smsLog->save();
            $smsManagement->save();

            return response()->json([
                "success" => true,
                "message" => "SMS envoyé avec succès",
                "bulk_id" => $response['bulk_id'] ?? null
            ]);
        } else {
            $smsLog->status = false;
            $smsLog->error_message = $response['message'] ?? "Erreur API SMS : Code HTTP $status";
            $smsLog->save();

            return response()->json([
                "success" => false,
                "message" => $response['message'] ?? "Erreur lors de l'envoi du SMS",
                "httpCode" => $status
            ], $status);
        }

    } catch (Exception $e) {
        Log::error("Failed to send SMS: " . $e->getMessage());
        return response()->json([
            "success" => false,
            "message" => "Erreur interne lors de l'envoi du SMS : " . $e->getMessage()
        ], 500);
    }
}
    
}

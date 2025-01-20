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
            'couture_mixte' => 'required|boolean', 
            'type_couture' => 'required|in:homme,femme,mixte', 
            'messages' => 'required|array', 
            'messages.nouvelleCommande' => 'required|string', 
            'messages.avanceVersee' => 'required|string', 
            'messages.commandePrete' => 'required|string', 
            'messages.retardRecuperation' => 'required|string', 
        ]);
    
        // Récupérer l'utilisateur authentifié
        $userId = auth()->id();
    
        // Trouver les paramètres existants de l'utilisateur
        $fonctionnalite = Fonctionnalite::where('user_id', $userId)->first();
    
        // Si aucune fonctionnalité n'existe, on retourne une erreur
        if (!$fonctionnalite) {
            return response()->json([
                'success' => false,
                'message' => 'Aucune fonctionnalité trouvée pour cet utilisateur.',
            ], 404);
        }
    
        // Mettre à jour les champs uniquement si des données sont présentes dans la requête
        $fonctionnalite->cacher_chiffres_affaires = $validatedData['cacher_chiffres_affaires'];
        $fonctionnalite->activer_sms = $validatedData['activer_sms'];
        $fonctionnalite->mode_sms = $validatedData['mode_sms'];
        $fonctionnalite->couture_mixte = $validatedData['couture_mixte'];
        $fonctionnalite->type_couture = $validatedData['type_couture'];
    
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

    public function sendSms(Request $request): string
    {
        // Valider les données envoyées par l'utilisateur
        $validated = $request->validate([
            'message' => 'required|string',
            'nameClient' => 'required|string',
            'number' => 'required|string',
        ]);

        $message = $validated['message'];
        $nameClient = $validated['nameClient'];
        $number = $validated['number'];

        try {    
            
            $abonnement = Abonnement::with('licence')->where('user_id', auth()->user()->id) 
            ->first();
            // dd($abonnement->licence);
            if ($abonnement->licence->plan === 'Essentiel') {
                return "Votre plan d'abonnement ne permet pas l'envoi de SMS.";
            }            
            
             // Vérification du crédit SMS
            $smsManagement = SmsManagement::where('user_id', auth()->user()->id)->first();
            // dd($smsManagement->sms_restants);
            $sms_restants = $smsManagement->total_sms_inclus - $smsManagement->sms_utilises;
            if ($sms_restants <= 0) {
                return "Vous n'avez pas suffisamment de crédits SMS.";
            }
               
               // Préparation des paramètres pour l'API
            $apiUrl = "https://www.aqilas.com/api/v1/sms";
            $authToken = 'd5431acf-3181-4bca-8cfe-28c8b5a8d8b4'; 
            $from = "Couturart";
            $payload = [
                "from" => $from,
                "text" => "$nameClient : $message",
                "to" => [$number]
            ];
    
            // Initialisation de cURL
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Content-Type: application/json",
                "X-AUTH-TOKEN: $authToken"
            ]);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
            // Envoi de la requête et récupération de la réponse
            $response = curl_exec($ch);

            // Vérification des erreurs cURL
            if (curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }

            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

             // Log du SMS envoyé
            $smsLog = new SmsLog();
            $smsLog->user_id = auth()->user()->id;
            $smsLog->recipient_number = $number;
            $smsLog->message = $message;
            $smsLog->sent_at = now();

            // Vérification du succès de la requête (HTTP 200-299)
            if ($httpCode >= 200 && $httpCode < 300) {
                // Décrémenter le crédit SMS
                $smsManagement->total_sms_inclus -=1;
                $smsManagement->sms_utilises +=1;
                $smsLog->status = true;
                $smsLog->save();
                $smsManagement->save();

                return "SMS envoyé avec succès.";
            }else {
                $smsLog->status = false;
               $smsLog->error_message = "Erreur API SMS : Code HTTP $httpCode";
               $smsLog->save();
            }

            throw new Exception("Erreur API SMS : Code HTTP $httpCode");
        } catch (Exception $e) {
            // Retourner l'erreur spécifique
            Log::error("Failed to send SMS: " . $e->getMessage());
            return $e->getMessage(); // Retourne le message d'erreur
        }
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateAtelier(Request $request)
    {
        // Validation des données envoyées par le client
        $validatedData = $request->all();
    
        // Récupérer l'ID de l'utilisateur connecté
        $id = auth()->user()->id;
    
        // Recherche de l'utilisateur à mettre à jour
        $user = User::find($id); // Recherche l'utilisateur par son ID
    
        if (!$user) {
            // Si l'utilisateur n'est pas trouvé, retourner une réponse d'erreur
            return response()->json([
                'status' => 404,
                'message' => 'Atelier non trouvé'
            ], 404);
        }
    
        // Mise à jour des données de l'utilisateur
        $user->update($validatedData);
    
        // Retourner une réponse JSON avec les données mises à jour
        return response()->json([
            'status' => 200,
            'message' => 'Atelier mis à jour avec succès', 
            'data' => $user
        ],200);
    }
    
}

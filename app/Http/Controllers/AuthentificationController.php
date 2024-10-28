<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthentificationController extends Controller
{
    public function register(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'telephone' => [
                'required',
                'string',
                'max:15',
                function ($attribute, $value, $fail) use ($request) {
                    // Vérifier que la combinaison pays + téléphone est unique
                    if (User::where('pays', $request->pays)->where('telephone', $value)->exists()) {
                        $fail('Ce numéro de téléphone est déjà enregistré pour cet indicatif.');
                    }
                },
            ],
            'password' => 'required|string', // "confirmed" s'assure qu'il existe un champ "password_confirmation" qui correspond
        ]);

        // Si la validation échoue, retourner les erreurs
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Création de l'utilisateur
        $user = User::create([
            'id' => $request->id,
            'etablissement' => $request->etablissement,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'logo' => $request->logo,
            'nom' => $request->nom,
            'pays' => $request->pays,
            'telephone' => $request->telephone,
            'role' => $request->role,
            'password' => Hash::make($request->password), // Hachage du mot de passe pour la sécurité
            'terms' => $request->terms,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
           // Générer un token pour l'utilisateur
           $token = $user->createToken('auth_token')->plainTextToken;
        // Retourner les données de l'utilisateur et le jeton
        return response()->json([
            'message' => 'Utilisateur créé avec succès',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    // Méthode pour le login de l'utilisateur
    public function login(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'pays' => 'required|string',
            'telephone' => 'required|string',
            'password' => 'required|string',
        ]);

        // Vérifier si un utilisateur existe avec le pays et le téléphone
        $user = User::where('pays', $validatedData['pays'])
                    ->where('telephone', $validatedData['telephone'])
                    ->first();

        // Vérifier si les informations de connexion sont correctes
        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Générer un token pour l'utilisateur
        $token = $user->createToken('auth_token')->plainTextToken;

        // Retourner la réponse avec le token
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token,
        ]);
    }

}

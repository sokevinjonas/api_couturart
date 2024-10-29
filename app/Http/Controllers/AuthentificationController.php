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
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|unique:users', // Ajouter la validation de l'ID
            'etablissement' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'logo' => 'nullable|string',
            'nom' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'telephone' => [
                'required',
                'string',
                'max:15',
                function ($attribute, $value, $fail) use ($request) {
                    if (User::where('pays', $request->pays)
                            ->where('telephone', $value)
                            ->exists()) {
                        $fail('Ce numéro de téléphone est déjà enregistré pour cet indicatif.');
                    }
                },
            ],
            'role' => 'required|string|in:proprietaire,user',
            'password' => 'required|string|min:8',
            'terms' => 'required|boolean|accepted',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $userData = $request->all();

        // Si les dates ne sont pas fournies, utiliser la date actuelle au format string
        if (!$request->created_at) {
            $userData['created_at'] = now()->format('Y-m-d H:i:s');
        }
        if (!$request->updated_at) {
            $userData['updated_at'] = now()->format('Y-m-d H:i:s');
        }

        // Hasher le mot de passe
        $userData['password'] = Hash::make($request->password);

        $user = User::create($userData);

        $token = $user->createToken('auth_token')->plainTextToken;

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

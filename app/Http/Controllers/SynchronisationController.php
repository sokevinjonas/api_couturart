<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Client;
use App\Models\Category;
use App\Models\Commande;
use App\Models\Measurement;
use App\Models\MesureClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SynchronisationController extends Controller
{
    /**
     * Fonction pour gérer l'insertion de nouvelles données.
     */
    public function store(Request $request)
    {
        // Valider la requête
        $request->validate([
            'entity' => 'required|string',
            'data' => 'required|array',
            'user_id' => 'required|string', // Ajouter la validation pour user_id
        ]);

        $entity = $request->input('entity');
        $data = $request->input('data');
        $user = $request->input('user_id');

        // Mapper l'entité à son modèle
        $model = $this->getModel($entity);

        if (!$model) {
            return response()->json(['error' => 'Entity non trouvée'], 404);
        }

        // Traitement spécial pour les commandes, vérifier si 'photos' est présent
        if ($entity === 'commandes' && array_key_exists('photos', $data)) {
            $data['photos'] = json_encode($data['photos']); // Encoder en JSON si 'photos' existe
        }
        // Traitement spécial pour les commandes, vérifier si 'mesures' est présent
        if ($entity === 'mesures_clients' && array_key_exists('mesures', $data)) {
            $data['mesures'] = json_encode($data['mesures']); // Encoder en JSON si 'mesures' existe
        }

        try {
            if ($user === Auth::user()->id) {
                if ($model::where('id', $data['id'])->exists()) {
                    // Mettre à jour l'enregistrement existant
                    $record = $model::where('id', $data['id'])->update($data);
                    return response()->json([
                        'success' => true,
                        'data' => $record,
                        'message' => "{$entity} mis à jour avec succès"
                    ], 200);
                } else {
                    // Créer un nouvel enregistrement
                    $record = $model::create($data);
                    return response()->json([
                        'success' => true,
                        'data' => $record,
                        'message' => "{$entity} créé avec succès"
                    ], 201);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Échec de la création de l\'enregistrement',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request)
    {
        // Valider la requête
        $request->validate([
            'entity' => 'required|string',
            'data' => 'required|array',
            'user_id' => 'required|string', // Ajouter la validation pour user_id
        ]);

        $entity = $request->input('entity');
        $data = $request->input('data');
        $user = $request->input('user_id');

        // Mapper l'entité à son modèle
        $model = $this->getModel($entity);

        if (!$model) {
            return response()->json(['error' => 'Entity non trouvée'], 404);
        }

        try {
            // Vérifier si l'utilisateur a le droit de mettre à jour
            if ($user === Auth::user()->id) {
                // Vérifier si l'enregistrement existe
                if ($model::where('id', $data['id'])->exists()) {
                    // Mettre à jour l'enregistrement existant
                    $record = $model::where('id', $data['id'])->update($data);
                    return response()->json([
                        'success' => true,
                        'data' => $record,
                        'message' => "{$entity} mis à jour avec succès"
                    ], 200);
                } else {
                    return response()->json(['error' => 'Enregistrement non trouvé'], 404);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Échec de la mise à jour de l\'enregistrement',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function destroy(Request $request)
    {
        // Valider la requête
        $request->validate([
            'entity' => 'required|string',
            'data' => 'required|array',
            'user_id' => 'required|string', // Ajouter la validation pour user_id
        ]);

        $entity = $request->input('entity');
        $data = $request->input('data');
        $user = $request->input('user_id');

        // Vérifier que l'ID est bien présent dans le tableau 'data'
        if (!isset($data['id'])) {
            return response()->json(['error' => 'ID manquant dans les données'], 400);
        }

        $id = $data['id'];

        // Mapper l'entité à son modèle
        $model = $this->getModel($entity);

        if (!$model) {
            return response()->json(['error' => 'Entity non trouvée'], 404);
        }

        try {
            // Vérifier si l'utilisateur a le droit de supprimer
            if ($user === Auth::user()->id) {
                // Vérifier si l'enregistrement existe
                if ($model::where('id', $id)->exists()) {
                    // Supprimer l'enregistrement
                    $model::destroy($id);
                    return response()->json([
                        'success' => true,
                        'message' => "{$entity} supprimé avec succès"
                    ], 200);
                } else {
                    return response()->json(['error' => 'Enregistrement non trouvé'], 404);
                }
            } else {
                return response()->json(['error' => 'Non autorisé'], 403);
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Échec de la suppression de l\'enregistrement',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mapper le nom de l'entité à son modèle.
     */
    private function getModel($entity)
    {
        return match ($entity) {
            'categories' => Category::class,
            'measurements' => Measurement::class,
            'clients' => Client::class,
            'commandes' => Commande::class,
            'mesures_clients' => MesureClient::class,
            default => null, // Si l'entité n'est pas trouvée
        };
    }
}

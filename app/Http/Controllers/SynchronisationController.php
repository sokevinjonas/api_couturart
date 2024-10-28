<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;

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
        ]);

        $entity = $request->input('entity');
        $data = $request->input('data');

        // Mapper l'entité à son modèle
        $model = $this->getModel($entity);

        if (!$model) {
            return response()->json(['error' => 'Entity non trouvée'], 404);
        }

        // Traitement spécial pour les commandes, vérifier si 'photos' est présent
        if ($entity === 'commandes' && array_key_exists('photos', $data)) {
            $data['photos'] = json_encode($data['photos']); // Encoder en JSON si 'photos' existe
        }

        try {
            // Créer une nouvelle instance du modèle et la remplir avec les données
            $record = $model::create($data);
            return response()->json([
                'success' => true,
                'data' => $record,
                'message' => "{$entity} créé avec succès"
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Échec de la création de l\'enregistrement',
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
            'commandes' => Commande::class,
            'clients' => Client::class,
            default => null, // Si l'entité n'est pas trouvée
        };
    }
}

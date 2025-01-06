<?php

namespace App\Http\Controllers\panel;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Licence;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LicenceController extends Controller
{
    public function index()
    {
        $abonnement = Abonnement::with('user')->get();
        return view('admin.licences.index', compact('abonnement'));
    }
    public function create(Request $request)
    {
         // Recherche d'utilisateurs si une requête est faite
         $search = $request->input('search');

         $users = User::when($search, function ($query) use ($search) {
             $query->where('nom', 'LIKE', "%{$search}%")
             ->orWhere('id', 'LIKE', "%{$search}%")
             ->orWhere('telephone', 'LIKE', "%{$search}%");
            })
            ->get();
            // dd($users);

             $licences = Licence::all();
        return view('admin.licences.create', compact('users', 'search', 'licences'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'plan' => 'required|string|max:255',
            'prix_mensuel' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        // Création de la licence
        Licence::create([
            'plan' => $request->input('plan'),
            'prix_mensuel' => $request->input('prix_mensuel'),
            'description' => $request->input('description'),
        ]);

        // Redirection ou réponse
        return redirect()->back()->with('success', 'Licence créée avec succès.');
    }
    public function newLicence(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan' => 'required|exists:licences,id',
            'duration' => 'required|integer|min:1',
        ]);
        // dd($validatedData);
        $userId = $validatedData['user_id'];
        $plan = $validatedData['plan'];
        $duration = filter_var($validatedData['duration'], FILTER_VALIDATE_INT);

        // Vérifie si un abonnement existe déjà pour l'utilisateur
        $abonnement = Abonnement::where('user_id', $userId)->first();

        if ($abonnement) {
            // Mise à jour de l'abonnement existant
            $abonnement->licence_id = $plan;
            $abonnement->duration = $duration;
            $abonnement->status = 'active';
            $abonnement->starts_at = Carbon::now(); // Date du jour
            $abonnement->ends_at = Carbon::now()->addMonths($duration);
            $abonnement->save();

            return redirect()->back()->with('success', 'La licence a été mise à jour avec succès.');
        } else {
            // Création d'un nouvel abonnement
            Abonnement::create([
                'user_id' => $userId,
                'licence_id' => $plan,
                'duration' => $duration,
                'amount' => Licence::find($plan)->prix_mensuel * $duration,
                'status' => 'active',
                'status' => 'active',
                'starts_at' => Carbon::now(), // Date du jour
                'ends_at' => Carbon::now()->addMonths($duration),
            ]);

            return redirect()->back()->with('success', 'La licence a été créée avec succès.');
        }
    }

}

<?php

namespace App\Http\Controllers\panel;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Licence;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Models\SmsManagement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LicenceController extends Controller
{
    public function index()
    {
        $abonnement = Abonnement::with(['user', 'sms_management'])->latest('created_at')->get();
        return view('admin.licences.index', compact('abonnement'));
    }
    public function create(Request $request)
    {
         // Recherche d'utilisateurs si une requête est faite
         $search = $request->input('search');

         $users = User::where('id', '!=', Auth::user()->id)->when($search, function ($query) use ($search) {
             $query->where('etablissement', 'LIKE', "%{$search}%")
             ->orWhere('id', 'LIKE', "%{$search}%")
             ->orWhere('telephone', 'LIKE', "%{$search}%");
            })->latest('created_at')
            ->get();
            // dd($users);

             $licences = Licence::all();
        return view('admin.licences.create', compact('users', 'search', 'licences'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'plan' => 'required|string|max:50',
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
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan' => 'required|exists:licences,id',
            'duration' => 'required|integer|min:1',
        ]);
    
        $userId = $validatedData['user_id'];
        $plan = $validatedData['plan'];
        $duration = (int)$validatedData['duration'];
    
        // Vérifie si un abonnement existe déjà pour l'utilisateur
        $abonnement = Abonnement::where('user_id', $userId)->first();
    
        if ($abonnement) {
            // Mise à jour de l'abonnement existant
            $abonnement->licence_id = $plan;
            $abonnement->duration = $duration;
            $abonnement->status = 'active';
            $abonnement->starts_at = Carbon::now();
            $abonnement->ends_at = Carbon::now()->addMonths($duration);
            $abonnement->save();
    
            // Gestion des SMS gratuits
            if ($abonnement->licence && $abonnement->licence->plan === 'Standard') {
                $aboUpdate = SmsManagement::firstOrCreate(
                    ['abonnement_id' => $abonnement->id],
                    ['user_id' => $userId, 'total_sms_inclus' => 0, 'sms_utilises' => 0]
                );
    
                if ($duration >= 6 && $duration < 12) {
                    $aboUpdate->total_sms_inclus += 50;
                } elseif ($duration >= 12) {
                    $aboUpdate->total_sms_inclus += 100;
                }
                $aboUpdate->save();
            }
    
            return redirect()->back()->with('success', 'La licence a été mise à jour avec succès.');
        } else {
            // Création d'un nouvel abonnement
            $licence = Licence::find($plan);
            if (!$licence) {
                return redirect()->back()->withErrors('Licence introuvable.');
            }
    
            $aboNew = Abonnement::create([
                'user_id' => $userId,
                'licence_id' => $plan,
                'duration' => $duration,
                'amount' => $licence->prix_mensuel * $duration,
                'status' => 'active',
                'starts_at' => Carbon::now(),
                'ends_at' => Carbon::now()->addMonths($duration),
            ]);
    
            // Gestion des SMS gratuits
            if ($licence->plan === 'Standard') {
                $totalSms = 0;
                if ($duration >= 6 && $duration < 12) {
                    $totalSms = 50;
                } elseif ($duration >= 12) {
                    $totalSms = 100;
                }
    
                SmsManagement::create([
                    'abonnement_id' => $aboNew->id,
                    'user_id' => $userId,
                    'total_sms_inclus' => $totalSms,
                    'sms_utilises' => 0,
                ]);
            } else {
                SmsManagement::create([
                    'abonnement_id' => $aboNew->id,
                    'user_id' => $userId,
                    'total_sms_inclus' => 0,
                    'sms_utilises' => 0,
                ]);
            }
    
            return redirect()->back()->with('success', 'La licence a été créée avec succès.');
        }
    }
    

    public function update(Request $request, Licence $licence )
    {
        try {
            // $licence = Licence::findOrFail($id);
            // dd($licence);
            $validated = $request->validate([
                'plan' => 'required|string|max:50|unique:licences,plan,' . $licence->id,
                'prix_mensuel' => 'required|numeric|min:0',
                'description' => 'nullable|string'
            ]);
            
            $licence->update($validated);
    
            return redirect()->back()
                ->with('success', 'Forfait modifié avec succès');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Erreur lors de la modification: ' . $e->getMessage());
        }
    }
}

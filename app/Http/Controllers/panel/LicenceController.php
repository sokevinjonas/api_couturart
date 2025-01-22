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

class LicenceController extends Controller
{
    public function index()
    {
        $abonnement = Abonnement::with(['user', 'sms_management'])->get();
        return view('admin.licences.index', compact('abonnement'));
    }
    public function create(Request $request)
    {
         // Recherche d'utilisateurs si une requête est faite
         $search = $request->input('search');

         $users = User::where('id', '!=', auth()->user()->id)->when($search, function ($query) use ($search) {
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
            $aboUpdate = SmsManagement::where('abonnement_id', $abonnement->id)->first();
            // Mise à jour de l'abonnement existant
            $abonnement->licence_id = $plan;
            $abonnement->duration = $duration;
            $abonnement->status = 'active';
            $abonnement->starts_at = Carbon::now(); // Date du jour
            $abonnement->ends_at = Carbon::now()->addMonths($duration);
            $abonnement->save();
            
            if ($abonnement->licence->plan === 'Standard') {
                if ($abonnement->duration >=6) {
                    $aboUpdate->total_sms_inclus += 50;
                }else if($abonnement->duration >=12)
                {
                    $aboUpdate->total_sms_inclus += 100;
                }
                $aboUpdate->save();
            }
            return redirect()->back()->with('success', 'La licence a été mise à jour avec succès et vous beneficer de 100sms gratuit.');
        } else {
            // Création d'un nouvel abonnement
          $aboNew = Abonnement::create([
                'user_id' => $userId,
                'licence_id' => $plan,
                'duration' => $duration,
                'amount' => Licence::find($plan)->prix_mensuel * $duration,
                'status' => 'active',
                'status' => 'active',
                'starts_at' => Carbon::now(), // Date du jour
                'ends_at' => Carbon::now()->addMonths($duration),
            ]);

            if ($aboNew->licence->plan === 'Standard') {
                // Si la durée est entre 6 et 11 inclus
                if ($aboNew->duration >= 6 && $aboNew->duration < 12) {
                    $total = 50;
                }
                // Si la durée est supérieure ou égale à 12
                elseif ($aboNew->duration >= 12) {
                    $total = 100;
                }
            } elseif ($aboNew->licence->plan === 'Essentiel') {
                $total = 0;
            }

            SmsManagement::create([
                'abonnement_id' => $aboNew->id,
                'user_id' => $userId,
                'total_sms_inclus' => $total,
                'sms_utilises' => 0,
            ]);


            return redirect()->back()->with('success', 'La licence a été créée avec succès et vous beneficer de 100 sms gratuit.');
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

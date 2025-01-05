<?php

namespace App\Http\Controllers\panel;

use App\Models\Licence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LicenceController extends Controller
{
    public function create()
    {
        return view('admin.licences.create');
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
}

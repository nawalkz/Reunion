<?php
namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    // Afficher la liste des salles
    public function index()
    {
        $salles = Salle::all();
        return view('admin.salles.index', compact('salles'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('admin.salles.create');
    }

    // Enregistrer une nouvelle salle
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'capacite' => 'required|integer|min:1',
            'localisation' => 'required|string|max:255',
        ]);

        Salle::create($request->all());

        return redirect()->route('salles.index')->with('success', 'Salle ajoutée avec succès.');
    }

    // Afficher une salle
    public function show(Salle $salle)
    {
        return view('salles.show', compact('salle'));
    }

    // Formulaire d'édition
    public function edit(Salle $salle)
    {
        return view('admin.salles.edit', compact('salle'));
    }

    // Mise à jour
    public function update(Request $request, Salle $salle)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'capacite' => 'required|integer|min:1',
            'localisation' => 'required|string|max:255',
        ]);

        $salle->update($request->all());

        return redirect()->route('salles.index')->with('success', 'Salle mise à jour.');
    }

    // Supprimer
    public function destroy(Salle $salle)
    {
        $salle->delete();
        return redirect()->route('salles.index')->with('success', 'Salle supprimée.');
    }
}

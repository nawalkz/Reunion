<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Reunion;
use App\Models\Salle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReunionController extends Controller
{
   
    // Afficher la liste des réunions
    public function index()
    {
        $reunions = Reunion::with(['user', 'salle'])->latest()->get();
        return view('admin.reunions.index', compact('reunions'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $users = User::all();
        $salles = Salle::all();
        return view('admin.reunions.create', compact('users', 'salles'));
    }

    // Enregistrer une nouvelle réunion
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'titre' => 'required|string|max:255',
                'date' => 'required|date',
                'lieu' => 'required|string|max:255',
                'create_by' => 'required|string|max:255',
                'importance' => 'required|boolean',
                'user_id' => 'required|exists:users,id',
                'salle_id' => 'required|exists:salles,id',
            ]);

            Reunion::create($validated);

            return redirect()->route('reunions.index')->with('success', 'Réunion ajoutée avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'enregistrement de la réunion : ' . $e->getMessage());
            return back()->withErrors(['error' => 'Erreur lors de l\'enregistrement. Vérifiez les données saisies.'])->withInput();
        }
    }

    // Afficher le formulaire d’édition
    public function edit(Reunion $reunion)
    {
        $users = User::all();
        $salles = Salle::all();
        return view('admin.reunions.edit', compact('reunion', 'users', 'salles'));
    }

    // Mettre à jour une réunion
    public function update(Request $request, Reunion $reunion)
    {
        try {
            $validated = $request->validate([
                'titre' => 'required|string|max:255',
                'date' => 'required|date',
                'lieu' => 'required|string|max:255',
                'create_by' => 'required|string|max:255',
                'importance' => 'required|boolean',
                'user_id' => 'required|exists:users,id',
                'salle_id' => 'required|exists:salles,id',
            ]);

            $reunion->update($validated);

            return redirect()->route('reunions.index')->with('success', 'Réunion mise à jour avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de la réunion : ' . $e->getMessage());
            return back()->withErrors(['error' => 'Erreur lors de la mise à jour. Vérifiez les données saisies.'])->withInput();
        }
    }

    // Supprimer une réunion
    public function destroy(Reunion $reunion)
    {
        try {
            $reunion->delete();
            return redirect()->route('reunions.index')->with('success', 'Réunion supprimée avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de la réunion : ' . $e->getMessage());
            return back()->withErrors(['error' => 'Erreur lors de la suppression.']);
        }
    }



    public function reunionsSemaine()
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user();

        // Début et fin de la semaine actuelle
        $startOfWeek = Carbon::now()->startOfWeek(); // Lundi
        $endOfWeek = Carbon::now()->endOfWeek();     // Dimanche

        // Obtenir les réunions où l'utilisateur est participant, durant cette semaine
        $reunions = $user->reunions()
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->with('salle') // Charger la relation salle
            ->orderBy('date')
            ->get();

        // Afficher la vue avec les réunions
        return view('users.reunions.semaine', compact('reunions'));
    }

    public function reunionsSemaineProchaine()
    {
        // Utilisateur connecté
        $user = auth()->user();

        // Déterminer le début et la fin de la semaine prochaine
        $startOfNextWeek = Carbon::now()->addWeek()->startOfWeek(); // Lundi prochain
        $endOfNextWeek = Carbon::now()->addWeek()->endOfWeek();     // Dimanche prochain

        // Récupérer les réunions de la semaine prochaine où l'utilisateur est participant
        $reunions = $user->reunions()
            ->whereBetween('date', [$startOfNextWeek, $endOfNextWeek])
            ->with('salle')
            ->orderBy('date')
            ->get();

        return view('users.reunions.semaine_prochaine', compact('reunions'));
    }
public function reunionsImportantes()
{
    $user = auth()->user();

    // Récupérer les réunions importantes (importance = 1)
    $reunions = $user->reunions()
        ->where('importance', 1)
        ->with('salle')
        ->orderBy('date')
        ->get();

    return view('users.reunions.importantes', compact('reunions'));
}


    public function search(Request $request)
{
    $query = Reunion::query();

    if ($request->has('user_id') && !empty($request->user_id)) {
        $query->where('user_id', $request->user_id);
    }

    if ($request->has('titre') && !empty($request->titre)) {
        $query->where('titre', 'like', '%' . $request->titre . '%');
    }

    $reunions = $query->paginate(10)->appends($request->query());

    return response()->json([
        'reunions' => view('users.reunions.reunion_partial', compact('reunions'))->render()
    ]);
}
}


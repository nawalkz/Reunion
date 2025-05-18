<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Reunion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;

class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reunion $reunion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reunion $reunion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reunion $reunion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reunion $reunion)
    {
        //
    }


    public function reunionsSemaine()
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user();

        // Début et fin de la semaine actuelle
        $startOfWeek = Carbon::now()->startOfWeek(); // Lundi
        $endOfWeek = Carbon::now()->endOfWeek();     // Dimanche

        // Obtenir les réunions où l'utilisateur est participant, durant cette semaine
        $reunions = $user->participations()
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
        $reunions = $user->participations()
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
    $reunions = $user->participations()
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


<?php

namespace App\Http\Controllers;

use App\Models\Notification;
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
    // Valider les données
   

    $request->validate([
        'titre' => 'required|string|max:255',
        'date' => 'required|date',
        'salle_id' => 'required|exists:salles,id',
        'participants' => 'required|array',
        'participants.*' => 'exists:users,id',
        'importance' => 'nullable|boolean',
        'lieu' => 'required|string|max:255',
    'create_by' => 'required|string|max:255',
    ]);

    // Créer la réunion
    $reunion = Reunion::create([
        'titre' => $request->titre,
        'date' => $request->date,
        'salle_id' => $request->salle_id,
        'user_id' => auth()->id(), // admin créateur
        'importance' => $request->importance ?? 0,
        'lieu' => $request->lieu,
        'create_by' => $request->create_by, 
    ]);

    // Ajouter les participants
    foreach ($request->participants as $userId) {
        $reunion->participants()->create([
            'user_id' => $userId,
            'status' => 'attended',
        ]);

        // Créer une notification
        Notification::create([
            'user_id' => $userId,
            'reunion_id' => $reunion->id,
            'message' => "Nouvelle réunion '{$reunion->titre}' prévue le {$reunion->date->format('d/m/Y H:i')}",
            'lu' => 0,
        ]);
    }

    return redirect()->route('admin.reunions.index')->with('success', 'Réunion créée avec succès.');
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
    
    // Valider les données
    $request->validate([
        'titre' => 'required|string|max:255',
        'date' => 'required|date',
        'salle_id' => 'required|exists:salles,id',
        'participants' => 'required|array',
        'participants.*' => 'exists:users,id',
        'importance' => 'nullable|boolean',
         'lieu' => 'required|string|max:255',
    'create_by' => 'required|string|max:255',
    ]);

    // Mettre à jour les informations de la réunion
    $reunion->update([
        'titre' => $request->titre,
        'date' => $request->date,
        'salle_id' => $request->salle_id,
        'importance' => $request->importance ?? 0,
        'lieu' => $request->lieu,
        'create_by' => $request->create_by,
    ]);

    // Supprimer les anciens participants et notifications
    $reunion->participants()->delete();
    $reunion->notifications()->delete();

    // Réassocier les nouveaux participants et recréer les notifications
    foreach ($request->participants as $userId) {
        $reunion->participants()->create([
            'user_id' => $userId,
            'status' => 'attended',
        ]);

        Notification::create([
            'user_id' => $userId,
            'reunion_id' => $reunion->id,
            'message' => "La réunion '{$reunion->titre}' a été modifiée. Nouvelle date : {$reunion->date->format('d/m/Y H:i')}",
            'lu' => 0,
        ]);
    }

    return redirect()->route('admin.reunions.index')->with('success', 'Réunion mise à jour avec succès.');
}

    // Supprimer une réunion
   public function destroy(Reunion $reunion)
{
    try {
        // رسالة الإشعار قبل الحذف
        $message = "L'événement '{$reunion->titre}' a été supprimé.";

        // إرسال إشعار لكل مشارك
        foreach ($reunion->participants as $participant) {
    Notification::create([
        'user_id' => $participant->user_id,
        // نحيدو الربط بـ reunion_id
        'message' => $message,
        'lu' => 0,
    ]);
}
        // حذف المشاركين فقط (مش الحذف كامل مع الإشعارات)
        $reunion->participants()->delete();

        // **ما تمسحش الإشعارات** باش تبقى ظاهرة

        // حذف الاجتماع نفسه
        $reunion->delete();

        return redirect()->route('admin.reunions.index')->with('success', 'Réunion supprimée avec succès.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Erreur lors de la suppression : ' . $e->getMessage()]);
    }
}






   private function sendNotifications(Reunion $reunion, string $message)
{
    // نجيب جميع المستخدمين المرتبطين بهاد الاجتماع
    $users = $reunion->users; // العلاقة many-to-many

    foreach ($users as $user) {
        Notification::create([
            'user_id' => $user->id,
            'reunion_id' => $reunion->id,
            'message' => $message,
            'lu' => 0,
        ]);
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
    $query = $request->input('query');

    $reunions = Reunion::where('titre', 'like', '%' . $query . '%')->get();

    return view('users.reunions.search', compact('reunions', 'query'));
}


    
}

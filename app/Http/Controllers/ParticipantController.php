<?php
namespace App\Http\Controllers;

use App\Models\Reunion;
use App\Models\User;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::with(['user', 'reunion'])->get();
        return view('admin.participants.index', compact('participants'));
    }

   public function create($reunion_id)
    {
        // جيب بيانات الاجتماع بناءً على reunion_id
        $reunion = Reunion::findOrFail($reunion_id);
        // جيب كل المستخدمين لعرضهم في القائمة المنسدلة
        $users = User::all();
        // مرر $reunion و $users إلى الواجهة
        return view('admin.participants.create', compact('reunion', 'users'));
    }

    public function store(Request $request)
    {
        try {
            \Log::info('البيانات المستلمة في store participant:', $request->all());

            $validated = $request->validate([
                'reunion_id' => 'required|exists:reunions,id',
                'user_id' => 'required|exists:users,id',
                'status' => 'required|in:confirmed,pending,declined,attended',            ]);

            Participant::create($validated);

            return redirect()->route('participants.index')->with('success', 'Participant ajouté avec succès.');
        } catch (\Exception $e) {
            \Log::error('خطأ أثناء إضافة المشارك:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'فشل إضافة المشارك: ' . $e->getMessage());
        }
    }

    public function edit(Participant $participant)
    {
        $users = User::all();
        return view('admin.participants.edit', compact('participant', 'users'));
    }

    public function update(Request $request, Participant $participant)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:confirmed,pending,declined,attended',        ]);

        $participant->update($validated);

        return redirect()->route('participants.index')->with('success', 'Participant mis à jour.');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();
        return redirect()->route('participants.index')->with('success', 'Participant supprimé.');
    }
}
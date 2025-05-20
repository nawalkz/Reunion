<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function create()
    {
        // إذا كان كاين Admin واحد على الأقل، منمنع الدخول
        if (User::where('isadmin', 1)->exists()) {
            abort(403, 'Accès refusé');
        }

        return view('auth.register-admin');
    }

    public function store(Request $request)
    {
        if (User::where('isadmin', 1)->exists()) {
            abort(403, 'Accès refusé');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
       

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isadmin' => 1,
        ]);

        return redirect('/login')->with('message', 'Admin enregistré avec succès.');
    }
}

<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class PreventIfAdminExists
{
    public function handle(Request $request, Closure $next)
    {
        if (User::where('isadmin', 1)->exists()) {
            abort(403, 'Admin déjà enregistré.');
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
   
// NotificationController@index
public function index()
{
    $notifications = Notification::where('user_id', auth()->id())
    ->latest()
    ->get();

    return view('users.notifications.index', compact('notifications'));
}


public function markAsRead($id)
{
    $notification = Notification::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    $notification->update(['lu' => 1]);

    return back()->with('success', 'Notification marquée comme lue.');
}

public function markAllAsRead()
{
    auth()->user()->notifications()->where('lu', 0)->update(['lu' => 1]);

    return back()->with('success', 'Toutes les notifications ont été marquées comme lues.');
}

}

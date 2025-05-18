<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
   

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

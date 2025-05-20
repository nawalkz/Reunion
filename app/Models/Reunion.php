<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // 🔗 Créateur (admin)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Salle
    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    // 🔗 Liaisons de participation (pivot)
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    // 🔗 Utilisateurs participants (many-to-many)
    public function users()
    {
        return $this->belongsToMany(User::class, 'participants');
    }

    // 🔔 Notifications liées à la réunion
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}

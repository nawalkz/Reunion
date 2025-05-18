<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    use HasFactory;
        protected $guarded = ['id'];


        
    // 🔗 Relation avec l'utilisateur créateur (admin)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Relation avec la salle
    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    // 🔗 Participants de cette réunion (relation many-to-many via Participant)
   public function participants()
{
    return $this->hasMany(Participant::class);
}

    // 🔔 Notifications associées à cette réunion
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}



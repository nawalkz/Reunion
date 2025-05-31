<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;


    protected $guarded = ['id'];
 
     // Relations
    public function reunions()
{
    return $this->belyongsToMany(Reunion::class, 'participants');
}


    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
   
}
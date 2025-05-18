<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;


    protected $guarded = ['id'];
 
     // Relations
    public function reunions()
    {
        return $this->hasMany(Reunion::class);
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
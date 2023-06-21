<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validateur extends Model
{
    use HasFactory;
    public function user() 
    {
        return $this->belongsTo(User::class, 'validateur_id');
    }

    public function role()
    {
        return $this->hasOne(Roles::class, 'validateur_id');
    }
}

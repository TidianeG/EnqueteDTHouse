<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    use HasFactory;
    public function pays()
    {
        return $this->belongsTo('App\Models\Pays');
    }
    public function profession()
    {
        return $this->belongsTo('App\Models\Profession');
    }
}

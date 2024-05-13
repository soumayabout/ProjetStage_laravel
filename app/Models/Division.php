<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $table = 'divisions';
    public function reunions()
    {
        return $this->hasMany(Reunion::class, 'divisions_id');
    }
}

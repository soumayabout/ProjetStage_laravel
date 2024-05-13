<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;
    protected $table = 'partenaires';
    public function reunion()
    {
        return $this->hasMany(Reunion::class, 'partenaires_id');
    }
}

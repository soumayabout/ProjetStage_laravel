<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    use HasFactory;
    protected $table = 'secteurs';
    public function reunion()
    {
        return $this->hasMany(Reunion::class, 'secteurs_id');
    }
}

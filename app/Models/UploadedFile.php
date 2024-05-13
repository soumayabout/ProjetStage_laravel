<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    use HasFactory;
    protected $table = 'uploaded_files';
    protected $fillable = [
        'file_name',
        'file_content',
        'reunions_id'
        // Autres attributs fillable
    ];

    // Ajout de la relation avec la réunion
    public function reunion()
    {
        return $this->belongsTo(Reunion::class);
    }
}

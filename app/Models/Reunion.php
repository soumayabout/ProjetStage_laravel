<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Reunion extends Model
{
    use HasFactory;
    protected $table = 'reunions';
    protected $fillable = [
        'date_reunion',
        'sujet_reunion',
        'divisions_id',
        'suggestion',
        'prochaine_reunion',
        'cadre',
        'cout_cadre',
        'secteurs_id',
        'partenaires_id',
        'contribution_partenaire',
        'statuts_id',
        'etat_avancement',
        'file_path', 
    ];

    // Ajout des relations avec d'autres tables
        public function division()
        {
            return $this->belongsTo(Division::class, 'divisions_id')->withDefault();
        }
    
        public function partenaire()
        {
            return $this->belongsTo(Partenaire::class, 'partenaires_id')->withDefault();
        }
    
        public function statut()
        {
            return $this->belongsTo(Statut::class, 'statuts_id')->withDefault();
        }
    
        public function secteur()
        {
            return $this->belongsTo(Secteur::class, 'secteurs_id')->withDefault();
        }
  

        public function uploadedFiles()
        {
            return $this->hasMany(UploadedFile::class)->withDefault();
        }
        

}

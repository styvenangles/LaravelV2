<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $table = 'bien';
    protected $primaryKey = 'id_bien';

    protected $fillable =  [
        'titre_bien',
        'descr_bien',
        'superficie_bien',
        'nbr_piece_bien',
        'prix_bien',
        'frais_agence_bien',
        'id_vendeur',
        'dependance_bien',
        'image_bien',
        'type_bien',
        'region_bien',
    ];
    
    public function type_bien()
    {
        return $this->belongsTo('App\TypeBien', 'type_bien');
    }
    
    public function region_bien()
    {
        return $this->belongsTo('App\RegionBien', 'region_bien');
    }
}

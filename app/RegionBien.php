<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionBien extends Model
{
    protected $table = 'region_bien';
    protected $primaryKey = 'id_region';

    protected $fillable =  [
        'nom_region',
    ];
    
    public function bien()
    {
        return $this->hasMany('App\Bien', 'region_bien', 'nom_region');
    }
    
    public function agence()
    {
        return $this->hasMany('App\Agence', 'region_agence', 'nom_region');
    }
}

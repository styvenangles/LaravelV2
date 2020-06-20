<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $table = 'agences';
    protected $primaryKey = 'id_agence';

    protected $fillable =  [
        'nom_agence',
        'email_agence',
        'tel_agence',
        'nbr_agent_agence',
        'region_agence',
    ];
    
    public function region_agence()
    {
        return $this->belongsTo('App\RegionBien', 'region_agence');
    }
}

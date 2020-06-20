<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeBien extends Model
{
    protected $table = 'type_bien';
    protected $primaryKey = 'id_type';

    protected $fillable =  [
        'nom_type',
    ];
    
    public function bien()
    {
        return $this->hasMany('App\Bien', 'type_bien', 'nom_type');
    }
}

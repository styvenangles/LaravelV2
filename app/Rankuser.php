<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rankuser extends Model
{
    protected $table = 'ranks';
    protected $primaryKey = 'id_rank';

    protected $fillable =  [
        'nom_rank',
    ];
    
    public function user()
    {
        return $this->hasMany('App\User', 'rank', 'nom_rank');
    }
}

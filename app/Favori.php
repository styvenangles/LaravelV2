<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    protected $table = 'favori';
    protected $primaryKey = 'id_favori';

    protected $fillable =  [
        'id_bien',
        'id_user',
    ];
}

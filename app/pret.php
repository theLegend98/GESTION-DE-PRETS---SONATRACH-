<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pret extends Model
{
    protected $table = 'pret';

    protected $fillable = [
        'id_demande'
    ];
}

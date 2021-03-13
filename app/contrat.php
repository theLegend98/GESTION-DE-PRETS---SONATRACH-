<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contrat extends Model
{
    protected $table = 'contrat';
    protected $fillable = [
        'frais_mensuel', 'Duré', 'somme_totale','id_pret','id_user','date'
    ];
}

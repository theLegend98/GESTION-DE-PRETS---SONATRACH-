<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agent extends Model
{
    protected $table = 'agent';
    protected $fillable = ['nom','prenom','ddn','tel','id_departement','statut','grade','salaire'];
}

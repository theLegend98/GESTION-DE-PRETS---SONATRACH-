<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
    protected $table = 'departement';
    protected $fillable = [
        'nom'
    ];
}

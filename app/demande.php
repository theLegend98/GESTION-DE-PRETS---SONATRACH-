<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class demande extends Model
{
    protected $table = 'demande';
    protected $fillable = [
        'id','id_users', 'date','statut','type','valid_cu','valid_fin','valid_cl','documents'
    ];

}

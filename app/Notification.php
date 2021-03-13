<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'id','notifiable_type', 'notifiable_id','data','read_at','created_at','updated_at'
    ];
}

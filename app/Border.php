<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Border extends Model
{
    protected $fillable=[
        'name',
        'your_phone',
        'father_name',
        'father_phone',
        'email',
        'address',
        'photo',
        'nid_number',
        'room_id',  

    ];
}

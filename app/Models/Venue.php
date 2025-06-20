<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class venue extends Model
{
    protected $fillable = [
        'venuename',
        'location',
        'phone',
        'contact_person_name'

    ];
}   

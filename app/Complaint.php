<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'type_id', 'state_id', 'city_id', 'name', 'school_name', 'reason'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $casts = [
        'created_at'  => 'date:Y-m-d',
    ];
    protected $fillable = [
        'staff_name', 'staff_id', 'staff_temp',
    ];
}

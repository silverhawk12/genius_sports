<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;
    
    const PAST = 1;
    const FUTURE = 2;
    
}

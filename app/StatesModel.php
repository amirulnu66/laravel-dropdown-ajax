<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatesModel extends Model
{
    
    protected $table="states";

 	protected $fillable = [
        'name','country_id'
    ];
}

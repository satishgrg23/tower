<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    //
    protected $fillable=[
    	'name',
    	'file'
    ];

    public $timestamps=false;

    protected $table='downloads';

}

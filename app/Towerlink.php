<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Towerlink extends Model
{
    protected $fillable=[
    	'tower_link',
    	'user_id'
    ];

    public $timestamps=false;

    protected $table='towerlinks';

    //
    public function user(){
        return $this->belongsTo('App\User');
    }
}

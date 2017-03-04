<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $fillable=[
    	'title',
    	'created_at'
    ];

    public $timestamps=false;

    protected $table='notifications';

    public function user(){
    	return $this->belongsToMany('Cartalyst\Sentinel\Users\EloquentUser', 'user_notifications');
    }
}

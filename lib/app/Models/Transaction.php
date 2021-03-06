<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $primaryKey = "id";
    protected $guarded = [];


    public function sender(){
    	return $this->belongsTo('App\Models\Account','sender_id');
    }
    public function receiver(){
    	return $this->belongsTo('App\Models\Account','receiver_id');
    }
}

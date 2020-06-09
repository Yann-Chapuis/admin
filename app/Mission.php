<?php

namespace App;
use App\Client;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
	public function client()
	{
	    return $this->belongsTo('App\Client', 'clients_id');
	}
	public function getTotalAmountAttribute()
	{
	    return $this->adr * $this->ct_days;
	}
}

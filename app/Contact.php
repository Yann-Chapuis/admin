<?php

namespace App;
use App\Client;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	public function client()
	{
	    return $this->belongsTo('App\Client', 'clients_id');
	}
}

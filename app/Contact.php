<?php

namespace App;
use App\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'fullname','poste', 'telephone', 'email', 'clients_id'
    ];

	public function client()
	{
	    return $this->belongsTo('App\Client', 'clients_id');
	}
}

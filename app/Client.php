<?php

namespace App;
use App\Contact;
use App\Mission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'enseigne','note', 'telephone', 'email', 'ville', 'cp', 'etat', 'picture'
    ];


    public function missions()
    {
        return $this->hasMany('App\Mission', 'clients_id');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contact', 'clients_id');
    }

    public function scopeOrderByUpdate($query) {
    	return $query->orderBy('enseigne', 'desc');
    }

    public function scopeById($query, $id) {
        return $query->where('id', $id);
    }



}

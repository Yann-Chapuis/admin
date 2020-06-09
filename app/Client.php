<?php

namespace App;
use App\Contact;
use App\Mission;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

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

	 /**
     * Trie par date d'update, plus récent au plus ancien.
     *
     * @param $query
     * @return mixed
     */
    public function scopeOrderByUpdate($query) {
    	return $query->orderBy('enseigne', 'desc');
    }



}

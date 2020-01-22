<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    // Fazendo a associação das tabelas para cruzar dados.
    public function professionals(){
        return $this->belongsToMany('App\Professional','professionals_has_technologies','technologies_id','professionals_id');
    }
}

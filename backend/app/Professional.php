<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Professional extends Model
{
    // Fazendo a associação das tabelas para cruzar dados.
    public function technologies(){
        return $this->belongsToMany('App\Technology','professionals_has_technologies','professionals_id','technologies_id');
    }
}

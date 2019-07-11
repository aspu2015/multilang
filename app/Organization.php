<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public $timestamps = false;
    
    public function university(){
        return $this->belongsTo('\App\University');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public function university(){
        return $this->belongsTo('\App\University');
    }

    public function Language(){
        return $this->belongsTo('\App\Language');
    }
}

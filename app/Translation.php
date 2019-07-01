<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public function university(){
        return $this->hasOne('\App\University');
    }

    public function Language(){
        return $this->hasOne('\App\Language');
    }
}

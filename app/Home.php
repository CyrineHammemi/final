<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //
    public $table ="homes";

    public function photos()
    {
        return $this->hasMany(Photo ::class);
    }
}

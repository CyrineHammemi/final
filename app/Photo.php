<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    public $table ="photos";

    public function home()
    {
        return $this->belongsTo(Home::class,'home_id');
    }
}

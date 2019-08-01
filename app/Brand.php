<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'type'];    

    public function tablets()
    {
        return $this->hasMany('App\Tablet');
    }

    public function notebooks()
    {
        return $this->hasMany('App\Notebook');
    }

    public function phones()
    {
        return $this->hasMany('App\Phone');
    }
}

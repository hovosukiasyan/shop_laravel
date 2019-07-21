<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $fillable = ['title', 'picture', 'price', 'screen_size','screen_resolution','cpu','ram','hard_drive','graphic_card','touch_screen' ,'os'];
    //
}

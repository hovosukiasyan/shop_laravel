<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['brand_id','title', 'picture', 'price', 'launch_status', 'screen_size','screen_resolution','ram','memory','main_camera','front_camera', 'battery', 'sim_card_quantity', 'os'];

    public function brand()
    {
        return $this->hasOne('App\Brand');
    }
}

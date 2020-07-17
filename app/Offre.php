<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = ['adrese', 'prix','capacite','image'];
    
    public function getPrice()
    {
        $price = $this->prix / 100;

        return number_format($price, 2, ',', ' ') . ' €';
    }
}

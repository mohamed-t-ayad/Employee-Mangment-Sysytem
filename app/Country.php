<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'country_code'];


    // Relation with states
    public function states()
    {
        return $this->hasMany(State::class);
    }


}

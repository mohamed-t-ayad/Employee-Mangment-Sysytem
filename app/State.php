<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name','country_id'];

    /**
     * Get the country that owns the State
    */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     *    Relation with cities
     * Get all of the cities for the State
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}

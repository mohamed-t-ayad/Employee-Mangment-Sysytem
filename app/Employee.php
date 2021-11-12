<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name' ,
        'last_name',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'department_id',
        'birthdate',
        'date_hired',
        'zip_code',
    ];

    /**
     * Get the user that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department() {
        return $this->belongsTo(Department::class);
    }
}

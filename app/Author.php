<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Author extends Model
{
    //protected $guarded = [];

    protected $fillable = [
        'name', 'dob'
    ]; 

    protected $dates = [
        'dob'
    ];

    public function setDobAttribute($dob)
    {
        $this->attributes['dob'] = Carbon::parse($dob);
    }

}

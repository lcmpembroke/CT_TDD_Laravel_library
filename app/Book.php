<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Book extends Model
{
    protected $guarded = [];

    public function path()
    {
        return '/books/' . $this->id . '-' . Str::slug($this->title);
    }

    public function checkout($user)
    {
        $this->reservations()->create([
            'user_id' => $user->id,
            'checked_out_at' => now(),
        ]);
    }    

    public function checkin($user)
    {
        $reservation = $this->reservations()->where('user_id',$user->id)
                        ->whereNotNull('checked_out_at')
                        ->whereNull('checked_in_at')                                
                        ->first();

        if (is_null($reservation)) {
            throw new Exception("A book that has not been checkout out cannot be checked in.");
        }
        $reservation->update([
            'checked_in_at' => now()
        ]);    
    }  

    protected function reservations()
    {
        return $this->hasMany(Reservation::class);
    }      

    public function setAuthorIdAttribute($author)
    {
        $this->attributes['author_id'] = (Author::firstOrCreate([
            'name' => $author
        ]))->id;
    }        
}

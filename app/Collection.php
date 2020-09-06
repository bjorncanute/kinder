<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //
    // protected $fillable = [
    //     'name', 'public', 'order',
    // ];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sketches()
    {
        // return $this->belongsToMany(Sketch::class);
        // return $this->belongsToMany('App\Sketch')->withPivot('order')->withTimestamps();
        return $this->belongsToMany(Sketch::class)->withPivot('order');


    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sketch extends Model
{
    protected $fillable = ['title', 'image', 'description', 'thumbnail'];
    // protected $guarded = [];

    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class);
        // return $this->belongsToMany('App\Collection')->withTimestamps();

    }
}

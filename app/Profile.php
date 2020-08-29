<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     */

    protected $fillable = [
        'tagline', 'bio', 'pronouns', 'image',
    ];
    
    public function profileImage()
    {
        // return ($this->image) ?? "/storage/{$this->image}" : 
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

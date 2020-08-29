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
        'avatar', 'banner', 'tagline', 'bio', 'pronouns', 'image',
    ];
    
    public function profileImage()
    {
        $imagePath = ($this->avatar) ? $this->avatar : 'avatars/default_avatar.svg';
        return '/storage/' . $imagePath;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description', 'website',
    ];

    public function profileImage($image)
    {
        $imagePath = ($this->image) ? $this->image : '/uploads/default-image.jpg';

        return '/storage/'.$imagePath;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function followers()
    {
        return $this->belongsToMany('App\User');
    }
}

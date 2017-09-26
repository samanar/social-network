<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['description', 'phone', 'location', 'user_id'];

    public function user()
    {
        return $this->$this->belongsTo('App\User');
    }
}


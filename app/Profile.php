<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    
    public function profileImage(){

        $imagePath = ($this->image) ? '/storage/' . $this->image : 'https://i.imgur.com/XyT4vI9.png';
        return $imagePath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}

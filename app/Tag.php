<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Meme;

class Tag extends Model
{
    //

    public function memes(){
    	
    	return $this->belongsToMany(Meme::class);
    
    }
    
    
}

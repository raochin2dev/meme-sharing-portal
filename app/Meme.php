<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Tag;
use App\User;

class Meme extends Model
{
    //

	protected $guarded = [];

    public function tags(){
        
        return $this->belongsToMany(Tag::class);
    
    }

    public function user(){
        
        return $this->belongsTo(User::class);
    
    }


    public function saveTags($tags){
	   
        $this->tags()->detach();
    	$tagArr = explode(',', $tags);
    	foreach ($tagArr as $t => $tName) {
    		$tag = Tag::where('name',$tName)->first();
    		
    		if(is_null($tag)){
    			$tag = new Tag;
    			$tag->name = $tName;
    			$tag->save();
			}

            // if(!($this->tags->where('name',$tName)))
		    $this->tags()->attach($tag);
    	}
    
    }
    
    
}

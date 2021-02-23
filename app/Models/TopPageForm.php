<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopPageForm extends Model
{
    
    public static function youtubeConvert($link){

        $tag = '<iframe width="320" height="180" src="https://www.youtube.com/embed/';

        preg_match('/\?v=([^&]+)/',$link,$match);
        $movieId = $match[1];
        
        $tag .= $movieId;
        
        $tag .=
        '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

        //dd($tag);
        return strval($tag);
    }

}

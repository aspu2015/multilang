<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;

class ImageService 
{

    public static $imageDir = "/images";
    public static function saveImage(Request $request, string $key){

        $image = $request[$key]; 
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        return ImageService::$imageDir.'/'.$name;

    }

    
}

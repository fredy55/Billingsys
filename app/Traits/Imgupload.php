<?php

namespace App\Traits;

trait Imgupload{

    public function getSingleImg($request, $filename){
        $imageArr = $request->file($filename);
        
        $img_url = 'nil';

        if($request->hasFile($filename) && $imageArr->isValid()){
            
            $img_extension = $imageArr->getClientOriginalExtension();
            $img_name = 'img_'.date('Gis').'.'.$img_extension;
             $img_url='storage/profile/'.$img_name;

            //store image file
            $imageArr->storeAs('/profile', $img_name, 'public'); 
        }else{
            $img_url = 'nil';
        } 

        return $img_url;
    }
}
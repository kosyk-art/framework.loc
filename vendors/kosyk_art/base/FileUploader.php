<?php

namespace vendors\kosyk_art\base;

class FileUploader {
    public static function image($input, $dir, $name, $maxWidth=false, $maxHeight=false, $compression=100){
        if($_FILES[$input]["type"] == 'image/gif') {
            $format = ".gif";
        }
        elseif($_FILES[$input]["type"] == 'image/png') {
            $format = ".png";
        }
        elseif($_FILES[$input]["type"] == 'image/jpeg') {
            $format = ".jpg";
        }
        $image = date("YmdHis").'-'.$name;
        if(move_uploaded_file($_FILES[$input]['tmp_name'], ROOT.'/'.$dir.'/'.$image.$format)){
            if($maxWidth || $maxHeight || $compression){
                $imageObj = new Image();
                $imageObj->load(ROOT.'/'.$dir.'/'.$image.$format);
                if($maxWidth){
                    $imageObj->resizeToWidth($maxWidth);
                }
                if($maxHeight){
                    $imageObj->resizeToHeight($maxHeight);
                }
                $imageObj->save(ROOT.'/'.$dir.'/'.$image.'.jpg', $compression, IMAGETYPE_JPEG);                
            }
            return $image.'.jpg';
        }else{
            return FALSE;
        }
    }
    
    public static function images($input, $dir, $name, $maxWidth=false, $maxHeight=false, $compression=100){
        $images = [];
        foreach ($_FILES[$input]["error"] as $key => $error){
            if($_FILES[$input]["type"][$key] == 'image/gif') {
                $format = ".gif";
            }
            elseif($_FILES[$input]["type"][$key] == 'image/png') {
                $format = ".png";
            }
            elseif($_FILES[$input]["type"][$key] == 'image/jpeg') {
                $format = ".jpg";
            }
            $image = date("YmdHis").'-'.$name.'-'.$key;
            if(move_uploaded_file($_FILES[$input]['tmp_name']['key'], ROOT.'/'.$dir.'/'.$image.$format)){
                if($maxWidth || $maxHeight || $compression){
                    $imageObj = new Image();
                    $imageObj->load(ROOT.'/'.$dir.'/'.$image.$format);
                    if($maxWidth){
                        $imageObj->resizeToWidth($maxWidth);
                    }
                    if($maxHeight){
                        $imageObj->resizeToHeight($maxHeight);
                    }
                    $imageObj->save(ROOT.'/'.$dir.'/'.$image.'.jpg', $compression, IMAGETYPE_JPEG);                
                }
                $images[] = $image.'.jpg';
            }    
        }
        return $images;
    }
    
}

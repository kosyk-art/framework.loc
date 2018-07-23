<?php

namespace vendors\kosyk_art\base;

class Image {
    var $image;
    var $image_type;
    
    public function load($filename){
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if( $this->image_type == IMAGETYPE_JPEG ) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif( $this->image_type == IMAGETYPE_GIF ) {
            $this->image = imagecreatefromgif($filename);
        } elseif( $this->image_type == IMAGETYPE_PNG ) {
            $this->image = imagecreatefrompng($filename);
        }
    }
    
    public function save($filename, $compression = 100, $image_type = false){
        if(!$image_type) {
            $image_type = $this->image_type;
        }
        if($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image,$filename,$compression);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image,$filename);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image,$filename);
        }
    }
    
    public function getWidth(){
        return imagesx($this->image);
    }
    
    public function getHeight(){
        return imagesy($this->image);
    }
    
    public function resizeToWidth($width){
        if($width<$this->getWidth()){ 
            $ratio = $width / $this->getWidth();
            $height = $this->getheight() * $ratio;
            $this->resize($width,$height);
        }
    }
    
    public function resizeToHeight($height){
        if($height<$this->getHeight()){
            $ratio = $height / $this->getHeight();
            $width = $this->getWidth() * $ratio;
            $this->resize($width,$height);
        }
    }
    
    public function resizeBoth($width, $height){
        if($width<$this->getWidth()){
            $this->resizeToWidth($width);
        }
        if($height<$this->getHeight()){
            $this->resizeToHeight($height);
        }
    }
    
    function resize($width,$height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
    
    function scale($scale) {
        $width = $this->getWidth() * $scale/100;
        $height = $this->getheight() * $scale/100;
        $this->resize($width,$height);
    }
}

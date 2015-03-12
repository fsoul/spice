<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Image
{
    //@todo только jpeg(доделать остальные по возможности)
    function add_watermark($dir){
        $img_info = getimagesize('.'.$dir);
        if($img_info['mime'] == 'image/jpeg'){
            $watermark = imagecreatefrompng('./assets/images/site/watermark.png');
            $im = imagecreatefromjpeg($dir);
            $marge_right = 0;
            $marge_bottom = 0;
            $sx = imagesx($watermark);
            $sy = imagesy($watermark);
            imagecopy($im, $watermark, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermark), imagesy($watermark));

            imagejpeg($im, $dir, 100);
            imagedestroy($im);
        }else{
            return false;
        }
    }
}
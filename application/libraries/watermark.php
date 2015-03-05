<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Watermark
{
    function add_watermark($url){

        $CI =& get_instance();

        $config['source_image']	= '.'.$url;
        $config['wm_overlay_path'] = './assets/images/site/watermark.png';
        $config['wm_type'] = 'overlay';
        $config['quality'] = '100';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'right';
        $CI->load->library('image_lib', $config);
        $CI->image_lib->watermark();
        //$CI->image_lib->clear();
    }
}
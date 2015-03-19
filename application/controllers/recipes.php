<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipes extends CI_Controller {
    function index(){

        $data['ru'] = $this->tmdb->movie_info(550, $append=null, $language='ru');
        $data['en'] = $this->tmdb->movie_info(550, $append=null, $language='en');
        $data['de'] = $this->tmdb->movie_info(550, $append=null, $language='de');

       echo '<pre>';
        print_r($data);
        echo '</pre>';

       // $this->load->view('welcome_message');
    }
}
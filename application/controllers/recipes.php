<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipes extends CI_Controller {
    function index(){
        $this->load->view('welcome_message');
    }
}
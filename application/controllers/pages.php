<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller
{
    function index()
    {
        $this->load->model('pages_model');
        $data['pages'] = $this->pages_model->get_pages();
        $data['preview'] = $this->pages_model->get_recipes();
        $data['title'] = 'Home';
        // default main page view
        $this->template->page_view('main', $data);
    }

    function view()
    {

    }
}
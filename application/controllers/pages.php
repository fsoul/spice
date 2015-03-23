<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller
{
    function index()
    {
        redirect(base_url('pages/view/main'));
    }

    function view($name)
    {

        $this->load->model('pages_model');
        $data['pages'] = $this->pages_model->get_pages();
        $data['preview'] = $this->pages_model->get_recipes();
        $data['title'] = $name;

        $this->template->page_view($name, $data);
    }
}
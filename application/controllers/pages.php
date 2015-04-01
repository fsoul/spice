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
        if($name == 'recipes' || $name == 'ideas' || $name == 'movies'){
            $data[$name] = $this->pages_model->get_items($name, null, null);
        }elseif($name == 'main'){
            $data['recipes'] = $this->pages_model->get_items('recipes', null, null);
        }

        $data['title'] = $name;

        $this->template->page_view($name, $data);
    }
}
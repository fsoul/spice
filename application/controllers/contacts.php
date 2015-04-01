<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends CI_Controller
{
    function index()
    {
        $offset = null;
        $limit = null;
        $this->load->model('pages_model');
        $data['title'] = 'Контакты';


        $data['pages'] = $this->pages_model->get_pages();
        $data['lang'] = $this->uri->segment(1);

        $this->template->page_view('contacts', $data);
    }
}
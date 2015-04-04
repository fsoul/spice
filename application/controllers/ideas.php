<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ideas extends CI_Controller
{
    function index()
    {
        /*$offset = null;
        $limit = null;
        $this->load->model('pages_model');
        $data['title'] = 'Идеи декора';
        $data['ideas'] = $this->pages_model->get_items('ideas', $offset, $limit);
        if (empty($data['ideas'])) {
            $data['ideas']['empty'] = 'Идеи отсутствуют';
        }
        $data['pages'] = $this->pages_model->get_pages();
        $data['lang'] = $this->uri->segment(1);

        $this->template->page_view('ideas', $data);*/
        $this->load->view('pages/ideas_view');
    }
}
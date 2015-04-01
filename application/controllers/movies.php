<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Movies extends CI_Controller
{
    function index()
    {
        $offset = null;
        $limit = null;
        $this->load->model('pages_model');
        $data['title'] = 'Фильмы';
        $data['movies'] = $this->pages_model->get_items('movies', $offset, $limit);
        if (empty($data['movies'])) {
            $data['movies']['empty'] = 'Фильмы отсутствуют';
        }
        $data['pages'] = $this->pages_model->get_pages();
        $data['lang'] = $this->uri->segment(1);

        $this->template->page_view('movies', $data);
    }
}
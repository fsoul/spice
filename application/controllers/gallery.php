<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    function index()
    {
        $offset = null;
        $limit = null;
        $this->load->model('pages_model');
        $data['title'] = 'Галерея';
        $data['gallery'] = $this->pages_model->get_items('gallery', $offset, $limit);
        if (empty($data['gallery'])) {
            $data['gallery']['empty'] = 'Фотографии отсутствуют';
        }
        $data['pages'] = $this->pages_model->get_pages();
        $data['lang'] = $this->uri->segment(1);

        $this->template->page_view('gallery', $data);
    }
}
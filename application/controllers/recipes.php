<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Recipes extends CI_Controller
{
    function index()
    {
        $offset = null;
        $limit = null;
        $this->load->model('pages_model');
        $data['title'] = 'Рецепты';
        $data['recipes'] = $this->pages_model->get_items('recipes', $offset, $limit);
        if (empty($data['recipes'])) {
            $data['recipes']['empty'] = 'Рецепты отсутствуют';
        }
        $data['pages'] = $this->pages_model->get_pages();
        $data['lang'] = $this->uri->segment(1);

        $this->template->page_view('recipes', $data);
    }
}
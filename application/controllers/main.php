<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
    function index()
    {
        $offset = null;
        $limit = null;

        if(!isset($_COOKIE['lang']))
            init_lang();

        set_lang($this->uri->segment(1));
        $data['lang'] = $this->uri->segment(1);
        $data['current_controller'] = $this->uri->segment(2);
        $this->load->model('pages_model');
        $data['meta'] = $this->pages_model->current_page('recipes', $data['lang']);
        $data['recipes'] = $this->pages_model->get_items('recipes', $offset, $limit);
        if (empty($data['recipes'])) {
            $data['recipes']['empty'] = 'Рецепты отсутствуют';
        }
        $data['pages'] = $this->pages_model->get_pages($data['lang']);

        $this->template->page_view('main', $data);
    }
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Movies extends CI_Controller
{
    function index()
    {
        if ($this->uri->segment(1) == 'movies') {
            redirect(base_url('en/movies'));
        }

        set_lang($this->uri->segment(1));

        $data['lang'] = $this->uri->segment(1);
        $data['current_controller'] = $this->uri->segment(2); // передаем текущий контроллер в вид для ссылок
        $data['curr_id'] = $this->uri->segment(3);
        $this->load->model('pages_model');
        $data['meta'] = $this->pages_model->current_page('gallery', $data['lang']);
        $data['pages'] = $this->pages_model->get_pages($data['lang']);

        $data['items'] = $this->pages_model->get_movies_items();
        if (empty($data['movies'])) {
            $data['movies']['empty'] = 'No data';
        }

        $this->template->page_view('movies', $data);
    }
}
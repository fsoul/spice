<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Recipe extends CI_Controller
{
    function index()
    {
        if($this->uri->segment(1) == 'recipe'){
            redirect(base_url('en/recipe'));
        }

        $data['lang'] = $this->uri->segment(1);
        $data['current_controller'] = $this->uri->segment(2);
        $data['curr_id'] = $this->uri->segment(3);
        $this->load->model('pages_model');
        $data['recipe'] = $this->pages_model->get_recipe($data['curr_id']);
        $data['recipe']['steps'] = $this->pages_model->get_recipe_steps($data['curr_id']);
        $data['recipe']['category'] = $this->pages_model->get_recipe_categories($data['curr_id']);
        //$data['recipe']['similar'] = $this->pages_model->get_similar_recipes($data['curr_id']);
        $data['recipe']['similar'] = $this->pages_model->get_random_recipes($data['curr_id']);
        $data['meta'] = $this->pages_model->current_page('recipes', $data['lang']);
        $data['pages'] = $this->pages_model->get_pages($data['lang']);
        $this->template->page_view('recipe', $data);

    }
}
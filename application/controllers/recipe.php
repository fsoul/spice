<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Recipe extends CI_Controller
{
    function index()
    {
        /*$offset = null;
        $limit = null;
        $data['lang'] = $this->uri->segment(1);
        $this->load->model('pages_model');
        $data['meta'] = $this->pages_model->current_page('recipes', $data['lang']);
        $data['recipes'] = $this->pages_model->get_items('recipes', $offset, $limit);
        if (empty($data['recipes'])) {
            $data['recipes']['empty'] = 'Рецепты отсутствуют';
        }
        $data['pages'] = $this->pages_model->get_pages($data['lang']);
        foreach ($data['recipes'] as $key => $recipe) {
            $query = "SELECT categories.* FROM recipes, categories, recipe_categories
                     WHERE categories.id = recipe_categories.category_id
                     AND recipe_categories.recipe_id = recipes.id AND recipes.id = " . $recipe['id'];
            $data['recipes'][$key]['categories'] = $this->admin_model->get_($query);
        }
        $data['no_cat']['ru'] = 'Без категории';
        $data['no_cat']['en'] = 'Unspecified';
        $data['no_cat']['de'] = 'Ohne Kategorie';*/
        if($this->uri->segment(1) == 'recipe'){
            redirect(base_url('en/recipe'));
        }

        $data['lang'] = $this->uri->segment(1);
        $data['current_controller'] = $this->uri->segment(2);
        $data['current_action'] = $this->uri->segment(3);
        $this->load->model('pages_model');
        $data['meta'] = $this->pages_model->current_page('recipes', $data['lang']);
        $data['pages'] = $this->pages_model->get_pages($data['lang']);
        $this->template->page_view('recipe', $data);

    }
}
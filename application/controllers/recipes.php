<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Recipes extends CI_Controller
{
    function index()
    {
        $offset = null;
        $limit = null;
        if ($this->uri->segment(1) == 'recipes') {    // если приходит recipes, значит язык
            redirect(base_url('en/recipes'));       // не задан, перенаправляем на англ. версию
        }

        set_lang($this->uri->segment(1));   // устанавливаем язык в Cookie

        $data['lang'] = $this->uri->segment(1);  // передаем нужный язык в вид
        $data['current_controller'] = $this->uri->segment(2); // передаем текущий контроллер в вид для ссылок
        $data['curr_id'] = $this->uri->segment(3); // передаем в вид id категории
        $this->load->model('pages_model'); // загружаем модель в контроллер
        $data['meta'] = $this->pages_model->current_page('recipes', $data['lang']); // достаем актуальне мета-данные

        $data['categories'] = $this->pages_model->get_all_categories($data['lang']);  // передаем категории в вид

        $data['pages'] = $this->pages_model->get_pages($data['lang']); // передаем страницы на нужном языке

        if (empty($data['curr_id'])) {        // если id категории пуст
            $data['recipes'] = $this->pages_model->get_recipes(); // достаем все рецепты
        } else {
            $data['recipes'] = $this->pages_model->get_ids_items($data['curr_id'], $offset, $limit); //  иначе рецепты по curr_id
        }

        if (empty($data['recipes'])) {  // если нет результата от базы
            $data['recipes']['empty']['ru'] = 'Рецепты отсутствуют'; // формируем поле с сообщением
            $data['recipes']['empty']['en'] = 'No recipes';
            $data['recipes']['empty']['de'] = 'Es gibt keine Rezepte';
        } else {
            foreach ($data['recipes'] as $key => $recipe) {     // если есть рецепты, подтягиваем к ним шаги приготовления
                $query = "SELECT categories.* FROM recipes, categories, recipe_categories
                     WHERE categories.id = recipe_categories.category_id
                     AND recipe_categories.recipe_id = recipes.id AND recipes.id = " . $recipe['id'];
                $data['recipes'][$key]['categories'] = $this->admin_model->get_($query);
            }
        }

        $data['no_cat']['ru'] = 'Без категории';
        $data['no_cat']['en'] = 'Unspecified';
        $data['no_cat']['de'] = 'Ohne Kategorie';

        $this->template->page_view('recipes', $data);
    }

    function search()
    {
        $like = $_POST['like'];

        $data['title_ru'] = 'Поиск';
        $data['title_en'] = 'Search';
        $data['title_de'] = 'Suche';
        $data['no_cat']['ru'] = 'Без категории';
        $data['no_cat']['en'] = 'Unspecified';
        $data['no_cat']['de'] = 'Ohne Kategorie';

        $data['lang'] = $this->uri->segment(1);
        $data['current_controller'] = $this->uri->segment(2);
        $data['curr_id'] = null;

        $this->load->model('pages_model');

        $data['meta'] = $this->pages_model->current_page('recipes', $data['lang']);
        $data['categories'] = $this->pages_model->get_all_categories($data['lang']);  // передаем категории в вид
        $data['pages'] = $this->pages_model->get_pages($data['lang']);

        if ($like == '') {
            $data['recipes'] = $this->pages_model->get_recipes();
            redirect(base_url() . $data['lang'] . '/recipes');
        } else {
            $data['recipes'] = $this->pages_model->search($like, $data['lang']);
            if (empty($data['recipes'])) {
                $data['recipes']['empty']['ru'] = 'Поиск не дал результатов';
                $data['recipes']['empty']['en'] = 'Empty search result';
                $data['recipes']['empty']['de'] = 'Die Suche brachte keine Ergebnisse';
            } else {
                foreach ($data['recipes'] as $key => $recipe) {     // если есть рецепты, подтягиваем к ним шаги приготовления
                    $query = "SELECT categories.* FROM recipes, categories, recipe_categories
                     WHERE categories.id = recipe_categories.category_id
                     AND recipe_categories.recipe_id = recipes.id AND recipes.id = " . $recipe['id'];
                    $data['recipes'][$key]['categories'] = $this->admin_model->get_($query);
                }
            }
            $this->template->page_view('recipes', $data);
        }
    }

    function ajax_load_content()
    {
        $lang = $this->uri->segment(1);
        $category_id = $_POST['cat_id'];
        $startFrom = $_POST['startFrom'];
        $this->load->model('pages_model');
        $data['recipes'] = $this->pages_model->get_recipes_ajax($startFrom, $lang, $category_id);
        if (!empty($data['recipes'])) {
            foreach ($data['recipes'] as $key => $recipe) {
                $query = "SELECT categories.* FROM recipes, categories, recipe_categories
                     WHERE categories.id = recipe_categories.category_id
                     AND recipe_categories.recipe_id = recipes.id AND recipes.id = " . $recipe['id'];
                $data['recipes'][$key]['categories'] = $this->admin_model->get_($query);
            }
        }

        echo json_encode($data['recipes']);
    }
}
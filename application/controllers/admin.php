<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function  index()
    {
        $data['title'] = 'Админка';
        $data['search'] = 'recipes';
        $data['recipes'] = $this->admin_model->get('recipes', 0, 5);
        $this->template->admin_view('recipes', $data);
    }

    function login()
    {
        $data['title'] = 'Вход';
        $data['error'] = null;
        $login = 'tatsianak';
        $pass = '123';

        if ($this->input->post('login') == $login && $this->input->post('pass') == $pass) {
            $this->session->set_userdata('is_admin', true);
            redirect(base_url('/admin/view/recipes/0'));
        } else {
            if ($this->input->post('enter')) {
                $data['error'] = 'Неправильные данные для входа. Попробуйте снова';
            }
            $this->template->admin_view('login', $data);
        }
    }

    function logout()
    {
        $this->session->unset_userdata('is_admin');
        redirect(base_url());
    }

    function add($title)
    {
        $data['title'] = 'Админка';
        $this->template->admin_view($title, $data);
    }

    function view()
    {
        $args = func_get_args();
        $title = $args[0];
        if (isset($args[1]))
            $page = $args[1];
        else
            $page = null;

        $per_page = 5;

        $data['search'] = $title;
        $data['title'] = 'Админка';
        if ($title == 'recipes' || $title == 'ideas') {
            $data[$title] = $this->admin_model->get($title, $page, $per_page);
            if (empty($data[$title])) {
                $data[$title]['empty'] = 'Записи отсутствуют';
            } else {
                $this->load->library('pagination');

                $config['per_page'] = $per_page;
                $config['base_url'] = base_url() . '/admin/view/' . $title;
                $config['first_url'] = '/admin/view/' . $title . '/0';
                $config['total_rows'] = $this->admin_model->all_items($title);

                $this->pagination->initialize($config);

                $data['pages'] = $this->pagination->create_links();

                if ($title == 'recipes') {
                    foreach ($data['recipes'] as $key => $recipe) {
                        $query = "SELECT categories.* FROM recipes, categories, recipe_categories
                     WHERE categories.id = recipe_categories.category_id AND recipe_categories.recipe_id = recipes.id AND recipes.id = " . $recipe['id'];
                        $data['recipes'][$key]['categories'] = $this->admin_model->get_categories($query);
                    }
                }
            }
        } else if ($title == 'gallery') {
            $data[$title] = $this->admin_model->get_gallery_photo();
        }

        $this->template->admin_view($title, $data);
    }


    function delete($title, $id)
    {
        if ($title != 'gallery') {
            $this->db->delete($title . 's', array('id' => $id));
            redirect(base_url('/admin/view/' . $title . 's/0'));
        } else {
            $this->db->delete($title, array('id' => $id));
            redirect(base_url('/admin/view/' . $title));
        }

    }

    function pre_delete(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $set_value = $_POST['set_value'];
        $this->admin_model->pre_delete($id, $name, $set_value);
    }

    function update($name, $id)
    {
        $action = explode(':', __METHOD__);
        $title = $action[2] . '_' . $name;
        $data['title'] = 'Редактирование';
        $data[$name] = $this->admin_model->get_once($name . 's', $id);

        $this->template->admin_view($title, $data);
    }

    function add_watermark($dir){
        $this->load->library('image_lib');
        $config['source_image']	= '.'.$dir;
        $config['wm_overlay_path'] = './assets/images/site/watermark.png';
        $config['wm_type'] = 'overlay';
        $config['quality'] = '100';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'right';
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();
    }

    function gogo(){
        $idea_upload_dir = '/assets/images/ideas/';
        $tmp_name = $_FILES['userfile']['tmp_name'];
        $name = rand_name($_FILES['userfile']['name'][0], 11);
        $dir = $idea_upload_dir . $name;

        move_uploaded_file($tmp_name[0], '.' . $dir);

        $this->add_watermark($dir);

        $this->admin_model->set_image($dir);
        $last = mysql_insert_id();
        $row_arr = $this->admin_model->get_image($last);
        $row_arr['created_at'] = rus_date_format($row_arr['created_at'], 1);
        echo json_encode(array('name'=>$row_arr['gallery_photo'], 'id'=>$row_arr['id'], 'created_at'=>$row_arr['created_at']));
    }

    function add_action($title)
    {

        /*
        echo '<pre>';
        print_r($category);
        echo '</pre>';


        exit;
        */

        $recipe_upload_dir = '/assets/images/recipes/';
        $idea_upload_dir = '/assets/images/ideas/';
        $steps_upload_dir = '/assets/images/steps/';

        $this->title_ru = $_POST['title_ru'];
        $this->title_en = $_POST['title_en'];
        $this->title_de = $_POST['title_de'];

        if ($title == 'recipe') {
            foreach ($_FILES['photos']['error'] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES['photos']['tmp_name'][$key];
                    $name = rand_name($_FILES['photos']['name'][$key], 11);
                    if($key == 0){
                        $this->finish_photo = $recipe_upload_dir . $name;
                        $dir = $this->finish_photo;
                    }else{
                        $step_photo[] = $steps_upload_dir . $name;
                        $dir = $steps_upload_dir . $name;
                    }
                    move_uploaded_file($tmp_name, '.' . $dir);

                    $this->add_watermark($dir);
                }
            }

            if (isset($_POST['is_gallery'])) {
                $this->is_gallery = 1;
                $this->admin_model->add('gallery', array('gallery_photo' => $this->finish_photo));
            }
            if (isset($_POST['is_public'])) {
                $this->is_public = 1;
            }

            $this->description_ru = $_POST['description_ru'];
            $this->description_en = $_POST['description_en'];
            $this->description_de = $_POST['description_de'];

            $this->ingridients_ru = $_POST['ingridients_ru'];
            $this->ingridients_en = $_POST['ingridients_en'];
            $this->ingridients_de = $_POST['ingridients_de'];

            $arr = $this;

            $this->admin_model->add('recipes', $arr);

            $recipe_id = mysql_insert_id();

            if (isset($_POST['category'])) {
                foreach ($_POST['category'] as $k => $v) {
                    $category[$k] = '(' . $recipe_id . ',' . $k . ')';
                }

                $cat_values = implode(',', $category);

                $cat_query_str = "INSERT INTO recipe_categories(recipe_id, category_id) VALUES $cat_values";
                $this->admin_model->exec_query($cat_query_str);
            }

            $step_ru = $_POST['step_ru'];
            $step_en = $_POST['step_en'];
            $step_de = $_POST['step_de'];


            $arr = array($step_photo, $step_ru, $step_en, $step_de);

            for ($i = 0; $i < count($step_ru); $i++) {
                for ($j = 0; $j < count($arr); $j++) {
                    $new_arr[$i][$j] = "'" . $arr[$j][$i] . "'";
                }
            }

            for ($i = 0; $i < count($new_arr); $i++) {
                array_unshift($new_arr[$i], '(' . $recipe_id);
                array_push($new_arr[$i], "'" . $i . "')");
                $values[$i] = implode(',', $new_arr[$i]);
            }

            $values = implode(',', $values);

            $query_str = "INSERT INTO recipe_steps(recipe_id, photo, description_ru, description_en, description_de, ord) VALUES $values";

            $this->admin_model->exec_query($query_str);
            redirect(base_url('/admin/view/recipes/0'));
        } else {
            echo '<pre>';
            print_r($_FILES);
            echo '</pre>';


            exit;
            $name = rand_name($_FILES['idea_photo']['name'], 11);
            $this->idea_photo = $idea_upload_dir . $name;
            if (isset($_FILES['idea_photo'])) {
                if ($_FILES['idea_photo']['error'] == 0) {
                    move_uploaded_file($_FILES['idea_photo']['tmp_name'], '.' . $idea_upload_dir . $name);
                    $this->add_watermark($idea_upload_dir . $name);
                }
            }
            $arr = $this;
            $this->admin_model->add('ideas', $arr);

            redirect(base_url('/admin/view/ideas/0'));
        }
    }

    function update_idea($id)
    {
        var_dump($_FILES);
        exit;
        $uploads_dir = '/assets/images/ideas/';
        if (!empty($_FILES['idea_photo']['tmp_name'])) {
            if ($_FILES['idea_photo']['error'] == 0) {
                move_uploaded_file($_FILES['idea_photo']['tmp_name'], '.' . $uploads_dir . $_FILES['idea_photo']['name']);
            }
            $this->idea_photo = $uploads_dir . $_FILES['idea_photo']['name'];
        }

        $this->title_ru = $_POST['title_ru'];
        $this->title_en = $_POST['title_en'];
        $this->title_de = $_POST['title_de'];
        $arr = $this;
        $this->admin_model->update_idea($id, $arr);
        redirect(base_url('/admin/view/ideas/0'));
    }

    function search($title)
    {
        $like = $_POST['like'];
        $data['search'] = $title;
        $data['title'] = 'Поиск';
        $page = 0;
        $per_page = 5;
        if ($like == '') {
            $data[$title] = $this->admin_model->get($title, $page, $per_page);
            redirect(base_url() . 'admin/view/' . $title . '/0');
        } else {
            $data[$title] = $this->admin_model->search($title, $like);
            if (empty($data[$title])) {
                $data[$title]['empty'] = 'Поиск не дал результатов';
            }
            $this->template->admin_view($title, $data);
        }
    }
}
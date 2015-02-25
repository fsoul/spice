<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function  index()
    {
        $data['title'] = 'Админка';
        $data['recipes'] = $this->admin_model->get('recipes');
        $this->template->admin_view('recipes', $data);
    }

    function login()
    {
        $data['title'] = 'Вход';
        $data['error'] = null;
        $login = 'a';
        $pass = 'b';

        if ($this->input->post('login') == $login && $this->input->post('pass') == $pass) {
            $this->session->set_userdata('is_admin', true);
            redirect(base_url('index.php/admin/view/recipes/'));
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

    function view($title)
    {

        $data['title'] = 'Админка';
        if($title == 'recipes' || $title == 'ideas' || $title == 'gallery'){
            $data[$title] = $this->admin_model->get($title);
            if($title == 'recipes'){
                $query = "SELECT title_ru, recipe_id FROM categories JOIN recipe_categories ON categories.id = recipe_categories.category_id";
                $data['categories'] = $this->admin_model->get_categories($query);
            }
        }
        /*elseif($title == 'recipes'){
            $cat =  $this->admin_model->get_recipes();
        }
            //$data[$title] = $this->admin_model->get_recipes();
           // foreach($data[$title] as $recipe){
             //   $category_id[$recipe['id']] = $recipe['category_id'];
           // }
            //$query = "SELECT * FROM categories WHERE id = $category_id";
            //$data['categories'] = $this->admin_model->get_categories($query);

        //}
        echo '<pre>';
        print_r($cat);
        echo '</pre>';


         exit;*/
        $this->template->admin_view($title, $data);
    }

    function delete($title, $id)
    {
        $this->db->delete($title.'s', array('id' => $id));
        redirect(base_url('index.php/admin/view/'.$title.'s'));
    }

    function update($name, $id)
    {
        $action = explode(':',__METHOD__);
        $title = $action[2].'_'.$name;
        $data['title'] = 'Редактирование';
        $data['idea'] = $this->admin_model->get_once($name.'s', $id);
        $this->template->admin_view($title, $data);
    }

    function add($title)
    {

        /*
        echo '<pre>';
        print_r($category);
        echo '</pre>';


        exit;
        */


        $uploads_dir = '/assets/images/';

        if ($_FILES['finish_photo']['error'] == 0) {
            move_uploaded_file($_FILES['finish_photo']['tmp_name'], '.'.$uploads_dir . $_FILES['finish_photo']['name']);
        }
        if ($_FILES['idea_photo']['error'] == 0) {
            move_uploaded_file($_FILES['idea_photo']['tmp_name'], '.'.$uploads_dir . $_FILES['idea_photo']['name']);
        }

        $this->title_ru = $_POST['title_ru'];
        $this->title_en = $_POST['title_en'];
        $this->title_de = $_POST['title_de'];

        if($title == 'recipe'){

            $this->finish_photo = $uploads_dir . $_FILES['finish_photo']['name'];

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

            if(isset($_POST['category'])){
                foreach($_POST['category'] as $k => $v){
                    $category[$k] = '('.$recipe_id.','.$k.')';
                }

                $cat_values = implode(',', $category);

                $cat_query_str = "INSERT INTO recipe_categories(recipe_id, category_id) VALUES $cat_values";
                $this->admin_model->exec_query($cat_query_str);
            }

            foreach ($_FILES as $k => $v) {
                if ($k === 'finish_photo') {
                    continue;
                }
                if ($_FILES[$k]['error'] == 0) {
                    move_uploaded_file($_FILES[$k]['tmp_name'], '.'.$uploads_dir . $_FILES[$k]['name']);
                }
                $step_photo[] = $uploads_dir . $_FILES[$k]['name'];
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
            redirect(base_url('index.php/admin/view/recipes/'));
        }else{
            $this->idea_photo = $uploads_dir . $_FILES['idea_photo']['name'];
            $arr = $this;
            $this->admin_model->add('ideas', $arr);

            redirect(base_url('index.php/admin/view/ideas/'));
        }

        //$data['title'] = 'Добавить '.title2rus($name);
        //$this->template->admin_view($name, $data);
    }

    function update_idea($id){
        $uploads_dir = '/assets/images/';
        if(!empty($_FILES['idea_photo']['tmp_name'])){
            if ($_FILES['idea_photo']['error'] == 0) {
                move_uploaded_file($_FILES['idea_photo']['tmp_name'], '.'.$uploads_dir . $_FILES['idea_photo']['name']);
            }
            $this->idea_photo = $uploads_dir . $_FILES['idea_photo']['name'];
        }

        $this->title_ru = $_POST['title_ru'];
        $this->title_en = $_POST['title_en'];
        $this->title_de = $_POST['title_de'];
        $arr = $this;
        $this->admin_model->update_idea($id, $arr);
        redirect(base_url('index.php/admin/view/ideas/'));
    }

}
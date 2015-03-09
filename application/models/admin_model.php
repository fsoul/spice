<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function set_image($dir){
        $this->db->insert('gallery', array('gallery_photo'=>$dir));
    }
    function get_image($id){
        $query = $this->db->get_where('gallery', array('id'=>$id));
        return $query->row_array();
    }

    function get($title, $page, $per_page){
        $this->db->where('delete', 0);
        $this->db->order_by('created_at', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get($title);
        return $query->result_array();
    }
    function get_gallery_photo(){
        $this->db->where('delete', 0);
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get('gallery');
        return $query->result_array();
    }

    function all_items($title){
        $this->db->where('delete', 0);
        $this->db->from($title);
        return $this->db->count_all_results();
    }

    function get_once($name, $id){
        $query = $this->db->get_where($name, array('id'=>$id));
        return $query->row_array();
    }

    function add($title, $arr)
    {
        /*
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        exit;*/

        $this->db->insert($title, $arr);
    }

    function get_recipes(){
        $this->db->select('recipes.id, category_id');
        $this->db->from('recipes');
        $this->db->join('recipe_categories', 'recipe_categories.recipe_id = recipes.id');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_($query_str){
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    function exec_query($query){
        $this->db->query($query);
    }

    function update_idea($id, $arr){
        $this->db->where('id', $id);
        $this->db->update('ideas', $arr);
    }

    function update_recipe($id, $arr){
        $this->db->where('id', $id);
        $this->db->update('recipes', $arr);
    }

    function search($title, $like){
        $this->db->like('title_ru', $like);
        $query = $this->db->get($title);
        return $query->result_array();
    }

    function pre_delete($id, $name, $set_value){
        $data = array(
            'delete' => $set_value
        );

        $this->db->where('id', $id);
        $this->db->update($name, $data);

    }

    function delete_rows($id, $table){
        $this->db->delete($table, array('recipe_id' => $id));
    }
}

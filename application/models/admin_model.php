<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    function get($title){
        $query = $this->db->get($title);
        return $query->result_array();
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

    function get_categories($query_str){
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
}

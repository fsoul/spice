<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model
{
    function get_pages($lang)
    {
        $this->db->where('visible', 1);
        $query = $this->db->query('SELECT href_' . $lang . ', name_' . $lang . ', title_' . $lang . ', description_' . $lang . ' FROM pages');
        return $query->result_array();
    }

    function current_page($page, $lang)
    {
        $query = $this->db->query(
            'SELECT href_' . $lang . ', name_' . $lang . ', title_' . $lang . ', description_' . $lang
            . ' FROM pages WHERE name_en="' . $page . '" AND visible=1'
        );
        return $query->row_array();
    }

    function get_recipes()
    {
        $this->db->where('delete', 0);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('recipes');
        return $query->result_array();
    }

    /**
     *
     */
    function get_items($title, $offset = null, $limit = null)
    {
        $this->db->where('delete', 0);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get($title);
        return $query->result_array();
    }

    function get_($query_str){
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    function get_recipe($id){
        $query_str = 'SELECT * FROM recipes
                  WHERE recipes.id='.$id.'
        ';
        $query = $this->db->query($query_str);
        return $query->row_array();
    }

    function get_recipe_steps($id){
        $query_str = 'SELECT * FROM recipe_steps
                      WHERE  recipe_steps.recipe_id='.$id;
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    function get_recipe_categories($id){
        $query_str = 'SELECT categories . *
                  FROM recipes, categories, recipe_categories
                  WHERE categories.id = recipe_categories.category_id
                  AND recipe_categories.recipe_id = recipes.id
                  AND recipes.id ='.$id;
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    function get_random_recipes($id){
        $query_str = 'SELECT *
                  FROM recipes
                  WHERE id
                  NOT LIKE '.$id.'
                  LIMIT 4';
        $query = $this->db->query($query_str);
        return $query->result_array();
    }
    /*function get_steps($id, $lang)
    {
        $query = $this->db->query(
            'SELECT photo, recipe_steps.description_' . $lang . ', ord FROM recipe_steps
            WHERE recipe_id="' . $id . '"'
        );
        return $query->result_array();
    }*/
}
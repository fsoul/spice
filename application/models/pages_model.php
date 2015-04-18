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

    function get_all_categories($lang){
        $query_str = 'SELECT id, title_'.$lang.' FROM categories';
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    function get_recipes($offset=null)
    {
        $query_str = 'SELECT *
                      FROM recipes
                      WHERE `delete` = 0
                      ORDER BY recipes.id DESC
                      LIMIT '.$offset.' 2';
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    function get_recipes_ajax($offset, $lang)
    {
        $query_str = 'SELECT id, finish_photo, title_'.$lang.', description_'.$lang.', ingridients_'.$lang.'
                      FROM recipes
                      WHERE `delete` = 0
                      ORDER BY recipes.id DESC
                      LIMIT '.$offset.', 2';
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    /**
     *
     */
    function get_items($title, $offset = null, $limit = null)
    {
        if($limit)
            $this->db->limit($limit);
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

    function get_similar_recipes($id){
        $query_str = 'SELECT DISTINCT * FROM (
                      (SELECT recipes.*
                      FROM recipes, recipe_categories
                      WHERE recipes.id = recipe_categories.recipe_id
                      AND recipes.id <> '.$id.'
                      AND recipes.delete = 0
                      AND recipe_categories.category_id
                      IN (SELECT category_id
                      FROM recipe_categories
                      WHERE recipe_id = '.$id.')
                      GROUP BY recipes.id LIMIT 4)
                      UNION ALL
                      (SELECT *
                      FROM recipes
                      WHERE id <> '.$id.'
                      AND recipes.delete = 0)
                      ) AS matched LIMIT 4';
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    function get_ids_items($category_id, $offset = null, $limit = null){
        $query_str = 'SELECT *
                      FROM recipe_categories, recipes
                      WHERE recipe_categories.category_id = '.$category_id.'
                      AND recipe_categories.recipe_id = recipes.id
                      ORDER BY recipes.id DESC';
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    function search($like, $lang){
        $query_str = 'SELECT *
                      FROM recipes
                      WHERE title_'.$lang.'
                      LIKE "%'.$like.'%"
                      AND "delete" = 0
                      ORDER BY recipes.id DESC';
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    function get_gallery_items(){
        $query_str = 'SELECT *
                      FROM gallery
                      WHERE `delete` = 0
                      ORDER BY id DESC';
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    function get_ideas_items(){
        $query_str = 'SELECT *
                      FROM ideas
                      WHERE `delete` = 0
                      ORDER BY id DESC';
        $query = $this->db->query($query_str);
        return $query->result_array();
    }

    function get_movies_items(){
        $query_str = 'SELECT *
                      FROM movies
                      WHERE `delete` = 0
                      ORDER BY id DESC';
        $query = $this->db->query($query_str);
        return $query->result_array();
    }
}
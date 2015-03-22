<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model
{
    function get_pages()
    {
        $this->db->where('visible', 1);
        $query = $this->db->get('pages');
        return $query->result_array();
    }

    function get_recipes(){
        $this->db->where('delete', 0);
        $query = $this->db->get('recipes');
        return $query->result_array();
    }
}
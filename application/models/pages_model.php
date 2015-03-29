<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model
{
    function get_pages()
    {
        $this->db->where('visible', 1);
        $query = $this->db->get('pages');
        return $query->result_array();
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
}
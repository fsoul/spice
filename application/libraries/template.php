<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
    function page_view($name, $data)
    {
        $CI =& get_instance();

        $CI->load->view('template/header', $data);
        $CI->load->view('template/menu_view');
        //$CI->load->view('template/breadcrumbs_view');
        $CI->load->view('page/' . $name . '_view', $data);
        $CI->load->view('template/footer');
    }

    function admin_view($name, $data)
    {
        $CI =& get_instance();

        if (!$CI->session->userdata('is_admin')) {
            $CI->load->view('admin/login_view', $data);
        }else{
            $CI->load->view('template/header', $data);
            $CI->load->view('template/menu_view');
            $CI->load->view('admin/' . $name . '_view', $data);
            $CI->load->view('template/footer');
        }
    }
}


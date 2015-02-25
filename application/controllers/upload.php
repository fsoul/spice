<?php

class Upload extends CI_Controller {



    function index()
    {
        $this->load->view('upload', array('error' => ' ' ));
    }

    function do_upload()
    {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '10000';
        $config['max_width']  = '1900';
        $config['max_height']  = '1200';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }
    }
}
?>
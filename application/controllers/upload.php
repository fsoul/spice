<?php

class Upload extends CI_Controller
{

    function upload()
    {
        $config['upload_path'] = '/assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['max_width'] = '1900';
        $config['max_height'] = '1200';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $data = $this->upload->data();
            echo json_encode($data);
        }
    }
}

?>
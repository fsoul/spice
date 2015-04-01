<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller
{
    function index()
    {
        $data['lang'] = $this->uri->segment(1);
        $data['text']['ru'] = array(
            'Главное в жизни – чувствовать ее вкус, цвет, ритм и запах, уметь наслаждаться и радоваться каждому дню. Замечательно иметь хобби и заниматься тем делом, которое любишь.',
            'Каждый раз, готовя новое блюдо, я словно нанизываю бусинки – аромат к аромату, цвет к цвету… Пока не получится изумительное украшение. Украшение стола, украшение семейного вечера.',
            'На моей странице вы ознакомитесь с рецептами, новыми идеями, фотографиями. Я буду очень рада, если кому-нибудь это пригодится.',
            'Точно знаю, что любовь к кулинарии, интерес ко всему новому и неиссякаемое вдохновение дадут замечательные результаты.'
        );
        $data['text']['en'] = array('en','en','en','en');
        $data['text']['de'] = array('de','de','de','de');
        $data['author']['ru'] = 'Татьяна Крачко';
        $data['author']['en'] = 'Tatsiana';
        $data['author']['de'] = 'Tatiana';

        $offset = null;
        $limit = null;
        $this->load->model('pages_model');
        $data['meta'] = $this->pages_model->current_page('about', $data['lang']);
        $data['pages'] = $this->pages_model->get_pages($data['lang']);

        $this->template->page_view('about', $data);
    }
}
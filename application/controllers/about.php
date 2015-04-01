<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller
{
    function index()
    {
        $data['title_ru'] = 'Обо мне';
        $data['title_en'] = '';
        $data['title_de'] = '';
        $data['text_ru'] = array(
            'Главное в жизни – чувствовать ее вкус, цвет, ритм и запах, уметь наслаждаться и радоваться каждому дню. Замечательно иметь хобби и заниматься тем делом, которое любишь.',
            'Каждый раз, готовя новое блюдо, я словно нанизываю бусинки – аромат к аромату, цвет к цвету… Пока не получится изумительное украшение. Украшение стола, украшение семейного вечера.',
            'На моей странице вы ознакомитесь с рецептами, новыми идеями, фотографиями. Я буду очень рада, если кому-нибудь это пригодится.',
            'Точно знаю, что любовь к кулинарии, интерес ко всему новому и неиссякаемое вдохновение дадут замечательные результаты.'
        );
        $data['text_en'] = array('','','','');
        $data['text_de'] = array('','','','');
        $data['author_ru'] = 'Татьяна Крачко';
        $data['author_en'] = '';
        $data['author_de'] = '';

        $offset = null;
        $limit = null;
        $this->load->model('pages_model');
        $data['title'] = 'Обо мне';
        $data['pages'] = $this->pages_model->get_pages();
        $data['lang'] = $this->uri->segment(1);

        $this->template->page_view('about', $data);
    }
}
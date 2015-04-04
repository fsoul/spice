<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller
{
    function index()
    {
        if($this->uri->segment(1) == 'about'){
            redirect(base_url('en/about'));
        }

        set_lang($this->uri->segment(1));

        $data['lang'] = $this->uri->segment(1);
        $data['current_controller'] = $this->uri->segment(2);
        $data['curr_id'] = $this->uri->segment(3);
        $data['text']['ru'] = array(
            'Главное в жизни – чувствовать ее вкус, цвет, ритм и запах, уметь наслаждаться и радоваться каждому дню. Замечательно иметь хобби и заниматься тем делом, которое любишь.',
            'Каждый раз, готовя новое блюдо, я словно нанизываю бусинки – аромат к аромату, цвет к цвету… Пока не получится изумительное украшение. Украшение стола, украшение семейного вечера.',
            'На моей странице вы ознакомитесь с рецептами, новыми идеями, фотографиями. Я буду очень рада, если кому-нибудь это пригодится.',
            'Точно знаю, что любовь к кулинарии, интерес ко всему новому и неиссякаемое вдохновение дадут замечательные результаты.'
        );
        $data['text']['en'] = array(
            'It’s essential in life to feel its taste, colour, rhythm and smell; to be able to enjoy every moment of it.  It is amazing when you do what you love!',
            'Every time cooking a new dish for me is like making new neckless, joining gems together - up until you get beautiful jewellery.  Decorating table, decorating family evening…',
            'On my webpage you will see new recipes, I’ll share new ideas, new photographs.  I will be happy if you find them useful.  And I am sure that love for cooking, interest in novelty and never ending inspiration will give brilliant results.'
        );
        $data['text']['de'] = array(
            'Für mich ist das Wichtigste im Leben, es zu fühlen und zu genießen – den Geschmack, die Farbe, den Rhythmus…  Und mich über jeden Tag  zu freuen! Es ist so schön, ein Hobby zu haben und das zu tun, was man wirklich mag.',
            'Jedes Mal, wenn ich die neuen Gerichte zubereite, reihe ich wie Kettenmitglieder Geschmacksrichtungen, Düfte und Farben aneinander, bis ein traumhaftes und einzigartiges Gastronomie-Schmuckstück entsteht. Das Schmuckstück, das nicht nur ein krönendes Highlight jedes Menüs, sondern auch ein wichtiges Teil des Familienzusammenseins ist.',
            'Auf meiner Seite werde ich Ihnen Rezepte, Bilder und neue Ideen vorstellen. Zu jeder Saison und verschiedenen Anlässen ist etwas dabei. Ich freue mich sehr, wenn irgendwas davon Ihnen als Inspirationsquelle dienen wird!',
            'Ich weiß ganz genau, dass die Liebe zur Kochkunst, das Interesse zu allem Neuen und die unerschöpfliche Eingebung die besten kulinarischen Ergebnisse hervorbringen.'
        );
        $data['author']['ru'] = 'Татьяна Крачко';
        $data['author']['en'] = 'Tatsiana Krachko';
        $data['author']['de'] = 'Tatsiana Krachko';

        $offset = null;
        $limit = null;
        $this->load->model('pages_model');
        $data['meta'] = $this->pages_model->current_page('about', $data['lang']);
        $data['pages'] = $this->pages_model->get_pages($data['lang']);

        $this->template->page_view('about', $data);
    }
}
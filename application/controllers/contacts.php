<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends CI_Controller
{
    function index()
    {
        if($this->uri->segment(1) == 'contacts'){
            redirect(base_url('en/contacts'));
        }

        set_lang($this->uri->segment(1));

        $data['lang'] = $this->uri->segment(1);
        $data['current_controller'] = $this->uri->segment(2);
        $data['curr_id'] = $this->uri->segment(3);

        $data['name']['ru'] = 'Имя';
        $data['name']['en'] = 'Name';
        $data['name']['de'] = 'Name';
        $data['author']['ru'] = 'Татьяна Крачко';
        $data['author']['en'] = 'Tatsiana Krachko';
        $data['author']['de'] = 'Tatsiana Krachko';
        $data['email']['ru'] = 'Эл.почта';
        $data['email']['en'] = 'Email';
        $data['email']['de'] = 'Email';
        $data['mail'] = 'tk@spaceandpassion.me';
        $data['phone']['ru'] = 'Телефон';
        $data['phone']['en'] = 'Phone';
        $data['phone']['de'] = 'Phone';
        $data['number'] = '+49 (1768) 669-38-42';
        $data['fb']['ru'] = 'Фейсбук';
        $data['fb']['en'] = 'Facebook';
        $data['fb']['de'] = 'Facebook';
        $data['link'] = 'tatsiana.krachko';
        $data['ok']['ru'] = 'Одноклассники';
        $data['ok']['en'] = 'Odnoklassniki';
        $data['ok']['de'] = 'Odnoklassniki';
        $data['link'] = 'tatsiana.krachko';
        $data['contact_me']['ru'] = 'Свяжитесь со мной';
        $data['contact_me']['en'] = 'Свяжитесь со мной';
        $data['contact_me']['de'] = 'Свяжитесь со мной';
        $data['msg']['ru'] = 'Сообщение';
        $data['msg']['en'] = 'Message';
        $data['msg']['de'] = 'Nachricht';
        $data['send']['ru'] = 'Отправить';
        $data['send']['en'] = 'Send';
        $data['send']['de'] = 'Senden';

        $this->load->model('pages_model');
        $data['meta'] = $this->pages_model->current_page('about', $data['lang']);
        $data['pages'] = $this->pages_model->get_pages($data['lang']);

        $this->template->page_view('contacts', $data);
    }

    function send()
    {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        /*$this->load->library('phpmailer');

        $this->phpmailer->ClearAllRecipients() // очищает адреса для нового письма

        $this->phpmailer->AddAddress('test@localhost.com', 'User');// кому отпралять - адресс почты, имя пользователя (необязательный параметр) - добавляет адресс получателя - если эта функция будет вызвана дважды - то будет происходить добавление нового адреса

        $this->phpmailer->From = 'user@mail.ru';// от кого - имя email
        $this->phpmailer->FromName = 'Пользователь'; // от кого - имя
        $this->phpmailer->Subject = 'Тема сообщения';// тема сообщения
        $this->phpmailer->ContentType = 'text/plain';// тип контента - необязательный параметр - для писем в формате HTML - text/html
        $this->phpmailer->Body = 'Текст сообщения';
        $this->phpmailer->send(); // кому отправлять*/
    }
}
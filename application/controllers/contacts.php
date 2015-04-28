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
        $data['contact_me']['en'] = 'Contact me';
        $data['contact_me']['de'] = 'Kontaktiere mich';
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
        $sent_to = 'bilinskyivitalii@gmail.com';

        $c_name = strip_tags($_POST['c_name']);
        $c_mail = strip_tags($_POST['c_mail']);
        $c_msg = strip_tags($_POST['c_msg']);

        $this->load->library('phpmailer');

        $mail = new PHPMailer;

        $mail->isSMTP();

        var_dump($mail->isSMTP()); die;

        $mail->setFrom($c_mail, $c_name);

        $mail->addAddress($sent_to, 'Tatsiana Krachko');

        $mail->Subject = 'spiceandpassion.me';

        $mail->msgHTML($c_msg);

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }
}
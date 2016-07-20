<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;
use Cake\Mailer\Email;

class MailComponent extends Component
{
    public $from = 'admin@co.jp';

    public function initialize(array $config) {
        $this->Controller = $this->_registry->getController();
    }

    public function send($user)
    {
        $mail = $this->getMailSetting();
        $template = $mail['template'];
        $subject = $mail['subject'];

        $emailObj = $this->__makeEmailObj();
        $emailObj
            ->from($this->from)
            ->template($template)
            ->viewVars([
                'user' => $user['username'],
            ])
            ->to('ro_acc001@yahoo.co.jp')
            ->subject($subject)
            ->send();
    }

    public function getMailSetting(){
        return $mail = [
                    'template' => 'sample',
                    'subject' => 'テストメール',
                ];
    }

    public function __makeEmailObj()
    {
        $emailObj = new Email('default');
        $emailObj->charset('SJIS-WIN');
        $emailObj->headerCharset('ISO-2022-JP');
        return $emailObj;
    }
}

<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;
use Cake\Mailer\Email;

class MailComponent extends Component
{
    public function initialize(array $config) {
        $this->Controller = $this->_registry->getController();
    }

    public function send($user,$mailType = null)
    {
        $mail = $this->getMailSetting($mailType);
        $template = $mail['template'];
        $subject = $mail['subject'];

        $emailObj = $this->__makeEmailObj();
        $emailObj
            ->from(FROM_MAIL_ADDRESS)
            ->template($template)
            ->viewVars([
                'user' => $user['username'],
            ])
            ->to('ro_acc001@yahoo.co.jp')
            ->subject($subject)
            ->send();
    }

    public function getMailSetting($mailType){
        $mail = [];
        switch ($mailType) {
            default:
                $mail = [
                    'template' => 'sample',
                    'subject' => 'テストメール',
                ];
                break;
        }

        return $mail;
    }

    public function __makeEmailObj()
    {
        $emailObj = new Email('default');
        $emailObj->charset('SJIS-WIN');
        $emailObj->headerCharset('ISO-2022-JP');
        return $emailObj;
    }
}

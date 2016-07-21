<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;
use Cake\Log\Log;
use Cake\Core\Configure;

class LogComponent extends Component
{

    public function initialize(array $config) {
        $this->Controller = $this->_registry->getController();
    }

    function output($data,$log_type){

        $log = $this->getLogSetting($data,$log_type);
        Log::info($log['message'], $log['file']);
    }

    public function getLogSetting($data,$log_type){
        $log = array();

        switch ($log_type) {
            case LOGIN_LOG:
                $ip = $this->getIp();
                $log['message'] = 'id='.$data['id'].' ip='.$ip;
                $log['file'] = 'login';
                break;

            case ACCESS_LOG:
                $ip = $this->getIp();
                $controller = $this->request->controller;
                $action = $this->request->action;
                $log['message'] = 'id='.$data['id'].' ip='.$ip.' controller='.$controller.' action='.$action;
                $log['file'] = 'access';
                break;
        }

        return $log;
    }

    public function getIp(){
        if(isset($_SERVER['X_FORWARDED_FOR'])){
            $ip = $_SERVER['X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }
}

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

    function output($data,$logType){

        $log = $this->getLogSetting($data,$logType);
        Log::info($log['message'], $log['file']);
    }

    public function getLogSetting($data,$logType){
        $log = array();

        switch ($logType) {
            case LOGIN_LOG:
                $ip = $this->getIp();
                $message = [
                    'id' => $data['id'],
                    'ip' => $ip,
                ];
                $log['message'] = $this->makeMessage($message);
                $log['file'] = 'login';
                break;

            case ACCESS_LOG:
                $ip = $this->getIp();
                $controller = $this->request->controller;
                $action = $this->request->action;
                $message = [
                    'id' => $data['id'],
                    'ip' => $ip,
                    'controller' => $controller,
                    'action' => $action,
                ];
                $log['message'] = $this->makeMessage($message);
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

    public function makeMessage($message){
        $ret = '';
        foreach ($message as $key => $val) {
            $format = '%s=%s ';
            $ret .= sprintf($format, $key, $val);
        }

        return $ret;
    }
}

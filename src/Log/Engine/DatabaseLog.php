<?php
namespace App\Log\Engine;

use Cake\Log\Engine\BaseLog;
use Cake\ORM\TableRegistry;

class DatabaseLog extends BaseLog
{
    /**
     * {@inheritDoc}
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * {@inheritDoc}
     */
    public function log($level, $message, array $context = [])
    {
        if(!OUTPUT_DB_LOG) return;

        $model = TableRegistry::get($this->_config['model']);

        $message = $this->toArrayMessage($message);
        $controller = (isset($message['controller']))?$message['controller']:'Top';
        $action = (isset($message['action']))?$message['action']:'login';
        $url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if(!empty($message['id'])){
            $entity = $model->newEntity([
                'user_id' => $message['id'],
                'ip' => $message['ip'],
                'controller' => $controller,
                'action' => $action,
                'url' => $url,
                'created' => date('Y-m-d H:i:s'),
            ]);
            $model->save($entity);
        }
    }

    public function toArrayMessage($message){
        $ret = array();
        $message = explode(' ', $message);
        foreach ($message as $val) {
            if(preg_match('/(.*)=(.*)/', $val,$matches)){
                $ret[$matches[1]] = $matches[2];
            }
        }

        return $ret;
    }
}

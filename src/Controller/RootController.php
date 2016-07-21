<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\ComponentRegistry;
use Acl\Controller\Component\AclComponent;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class RootController extends AppController
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->session = $this->request->session();
        $this->loadComponent('Log');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Csrf');
        $this->loadComponent('Acl.Acl');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'passwordHasher' => [
                        'className' => 'Custom'
                    ],
                    'userModel' => 'Users',
                    'fields' => [
                        'username' => 'login_id',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Top',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Menu',
                'action' => 'index'
            ],
            'authorize' => 'Controller',
            'unauthorizedRedirect' => false,
            'authError' => 'アクセス権限がありません',
        ]);
    }

    public function isAuthorized($user)
    {
        $Collection = new ComponentRegistry();
        $acl = new AclComponent($Collection);
        $controller = $this->request->controller;
        $action     = $this->request->action;
        return $acl->check(['Users' => ['id' => $user['id']]], "$controller/$action");
    }

    public function logout()
    {
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function beforeFilter(Event $event)
    {
        //ACLのチェックを行わない関数
        $this->Auth->allow(['login','logout']);
        if($this->request->action != 'login'){
            $user = $this->request->session()->read('Auth')['User'];
            $this->Log->output($user,ACCESS_LOG);
        }
    }

}

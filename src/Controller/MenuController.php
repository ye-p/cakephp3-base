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

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class MenuController extends RootController
{

    public function index()
    {
    }

    public function next()
    {
        if($this->request->is('post')){
            // トランザクション開始
            $connection = ConnectionManager::get('default');
            $connection->begin();
            $Users = TableRegistry::get('Users');
            $user = $Users->find()->first();
            $user = $Users->patchEntity($user, $this->request->data);

            if ($Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                // コミット
                $connection->commit();
                $this->render('complete');
            } else {
                // バリデーションエラー表示
                debug($user->errors());
                $this->Flash->error('The user could not be saved. Please, try again.');
                // ロールバック
                $connection->rollback();
            }
        }
    }

}

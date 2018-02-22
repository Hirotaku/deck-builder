<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Statics\UserInfo;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * initialize
     *
     * @author hagiwara
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Users',
                    'fields' => [
                        'username' => 'loginid',
                        'password' => 'password'
                    ],
                ]
            ],
            'flash' => [
                'key' => 'flash',
                'params' => [
                    'class' => 'alert alert-dismissible fade in alert-danger',
                ]
            ],
            'loginAction' => [
                'controller' => 'users',
                'action'     => 'login',
            ],
            'loginRedirect' => [
                'controller' => 'decks',
                'action'     => 'index'
            ],
            'storage' => [
                'className' => 'Session',
                'key' => 'Auth.Admin'
            ],
            'checkAuthIn' => 'Controller.startup'
        ]);
        $this->loadComponent('Pack.Pack');
    }

    /**
     * beforeFilter
     * @param \Cake\Event\Event $event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // ログイン情報をStaticなクラスに挿入
        UserInfo::$user = $this->Auth->user();
        // 後で上書きしたい場合があるのでbeforeFilterでセット
        $this->viewBuilder()->layout('default');

        $baseUrl = Router::url('/', true);
        $this->Pack->set(compact('baseUrl'));
        $this->set(compact('baseUrl'));
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}

<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $uses = array('UserProfile' , 'User');

	public $helpers = array(
		'Html' => array('className' => 	'TwitterBootstrap.BootstrapHtml'),
		'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
		'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
        'UploadPack.Upload'
	);

	public $components = array(
		'DebugKit.Toolbar', 
        'Session',
		'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'movies',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'movies',
                'action' => 'index'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Simple',
                    'fields' => array('username' => 'email')
                )
            ),
            'authorize' => array('Controller') // この行を追加しました
        ),
	);

    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

    // デフォルトは拒否を外してadminでない場合はそれぞれのControllerのisAuthorizedに任せる。
    // return false;

    }

    public function beforeFilter() {
        /*
        *ビューの表示
        */
        if ($this->request->isMobile()) {
            $this->theme = 'Mobile';
        } else {
            $this->theme = 'Pc';
        }

        /*
        *controllerでログインユーザーを呼び出すメソッドを作成
        */
        $this->userSession = $this->Auth->user();
        
        /*
        *viewでログインユーザーの情報を受ける変数おw作成
        */
        $this->set('userSession', $this->User->findById($this->Auth->user('id')));
    }

}
<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
	public $helpers = array('Html', 'Form', 'Flash');
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'add', 'logout');
		$this->set('auth', $this->Auth->user());
		$this->Auth->authenticate = array(
			'Form' => array(
				'userModel' => 'User',
				'passwordHasher' => 'Blowfish',
				'fields' => array(
					'username' => 'email',
					'password' => 'password'
				)
			)
		);
	}
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Flash->success(__('ログイン成功！'));
				return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
			} else {
				$this->Flash->error(__('メールアドレスまたはパスワードが違います'));
			}
		}
	}
	public function logout() {
		$this->Flash->success(__('ログアウトしました'));
		$this->redirect($this->Auth->logout());
	}
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('登録完了！'));
				return $this->redirect(array('action' => 'login'));
			}
			$this->Flash->error(__('登録失敗'));
		}
	}
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('エラー'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('ユーザー情報が更新されました'));
				return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
			}
			$this->Flash->error(__('更新できませんでした'));
		} else {
			$this->request->data = $this->User->findById($id);
			unset($this->request->data['User']['password']);
		}
	}
	public function delete($id = null) {
		$this->request->allowMethod('post');
			$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('エラー'));
		}
		if ($this->User->delete()) {
			$this->Flash->success(__('削除しました'));
			return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
		}
		$this->Flash->error(__('削除失敗'));
		return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
	}
}

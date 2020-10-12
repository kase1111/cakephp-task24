<?php
App::uses('AppController', 'Controller');
class PostsController extends AppController {
	public $helpers = array('Html', 'Form');
	public function index() {
		$this->set('posts', $this->Post->find('all'));
		$this->set('user', $this->Auth->user());
	}
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('エラー'));
		}
		$post = $this->Post->findById($id);
		if (!$post) {
			throw new NotFoundException(__('エラー'));
		}
		$this->set('post', $post);
	}
	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			$this->request->data['Post']['user_id'] = $this->Auth->user('id');
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('投稿しました!'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('投稿失敗'));
		}
	}
	public function edit($id = null) {
		if (!$id ) {
			throw new NotFoundException(__('エラー'));
		}
		$post = $this->Post->findById($id);
		if (!$post ) {
			throw new NotFoundException(__('エラー'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->request->data['Post']['id'] == $id) {
				$this->Post->id = $id;
				if ($this->Post->save($this->request->data) && $post['Post']['user_id'] == $this->Auth->user('id')) {
					$this->Flash->success(__('投稿内容を更新しました'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Flash->error(__('エラー'));
			}
			$this->Flash->error(__('エラー'));
		}
		if (!$this->request->data) {
			$this->request->data = $post;
		}
	}
	public function delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$post = $this->Post->findById($id);
		if ($post['Post']['user_id'] == $this->Auth->user('id')) {
			$post['Post']['deleted'] = 1;
		}
		if ($this->Post->save($post)) {
			$this->Flash->success(__('削除しました'));
		} else {
			$this->Flash->error(__('削除に失敗しました'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function isAuthorized($user) {
		if ($this->action === 'add') {
			return true;
		}
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = (int)$this->request->params['pass'][0];
			if ($this->Post->isOwnedBy($postId, $user['id'])) {
				return true;
			}
			$this->Flash->error(__('不正な操作です'));
			return $this->redirect(array('action' => 'index'));
		}
	}
}
?>

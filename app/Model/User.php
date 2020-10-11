<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
	public $validate = array(
		'name' => array(
			'required' => true,
			'rule' => 'notBlank',
			'message' => '入力してください'
		),
		'email' => array(
			'rule1' => array(
				'rule' => 'email',
				'required' => true,
				'message' => '正しく入力してください'
			),
			'rule2' => array(
				'rule' => 'isUnique',
				'message' => '正しく入力してください'
			)
		),
		'password' => array(
			'required' => true,
			'rule' => 'notBlank',
			'message' => 'A password is required'
		)
	);
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}
}
?>

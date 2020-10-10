<h1>Blog posts</h1>
<?php
echo 'ようこそ' . $user['name'] . 'さん'
?>
<?php
echo $this->Html->link(
    '新規登録',
		array(
			'controller' => 'users',
			'action' => 'add'
		)
);
?>
<br>
<?php
echo $this->Html->link(
    'ログイン',
		array(
			'controller' => 'users',
			'action' => 'login'
		)
);
?>
<br>
<?php
echo $this->Html->link(
    'Add Post',
		array(
			'controller' => 'posts',
			'action' => 'add'
		)
	);
?>
<br>
<?php
echo $this->Html->link(
    'ログアウト',
		array(
			'controller' => 'users',
			'action' => 'logout'
		)
	);
?>
<table>
<tr>
<th>Id</th>
<th>Title</th>
<th>Body</th>
<th>Date</th>

</tr>
<?php foreach ($posts as $post): ?>
<tr>
<td>
<?php echo $post['Post']['id']; ?>
</td>
<td>
<?php
echo $this->Html->link(
	$post['Post']['title'],
		array(
			'controller' => 'posts',
			'action' => 'view', $post['Post']['id']
		)
	);
?>
<?php
if ($post['Post']['user_id'] == $user['id']) {
	echo $this->Form->postLink(
		'Delete',
			array('action' => 'delete', $post['Post']['id']),
			array('confirm' => 'sure?')
		);
}
?>
<?php
if ($post['Post']['user_id'] == $user['id']) {
	echo $this->Html->link(
		'Edit',
			array(
				'action' => 'edit', $post['Post']['id']
			)
		);
}
?>
</td>
<td>
<?php echo $post['Post']['body']; ?>
</td>
<td>
<?php echo $post['Post']['created']; ?>
</td>
</tr>
<?php endforeach; ?>
<?php unset($post); ?>
</table>

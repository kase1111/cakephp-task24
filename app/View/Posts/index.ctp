<h1>課題２３</h1>
<br>
<?php if (isset($user['id'])) : ?>
<p>ようこそ<?php echo $user['name']; ?>さん</p>
<?php
echo $this->Html->link(
	'投稿する',
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
<br>
<?php else : ?>
<p>ようこそ掲示板へ<br>掲示板への投稿は登録が必要です。</p>
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
<?php endif; ?>
<table>
<tr>
<th>投稿者</th>
<th>タイトル</th>
<th>内容</th>
<th>投稿日時</th>
</tr>
<?php foreach ($posts as $post): ?>
<?php if ($post['Post']['deleted'] == 0): ?>
<tr>
<td>
<?php echo $post['User']['name']; ?>
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
	echo "\t" . $this->Form->postLink(
		'削除',
		array(
			'action' => 'delete', $post['Post']['id']
		),
		array(
			'confirm' => '本当に削除しますか？'
		)
	);
}
?>
<?php
if ($post['Post']['user_id'] == $user['id']) {
	echo "\t" . $this->Html->link(
		'編集',
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
<?php endif; ?>
<?php endforeach; ?>
<?php unset($post); ?>
</table>

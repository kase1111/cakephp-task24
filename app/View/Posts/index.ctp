<h1>Blog posts</h1>
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
    'Add Post',
		array(
			'controller' => 'posts',
			'action' => 'add'
		)
	);
?>
<table>
<tr>
<th>Id</th>
<th>Title</th>
<th>Body</th>
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
echo $this->Form->postLink(
	'Delete',
		array('action' => 'delete', $post['Post']['id']),
		array('confirm' => 'sure?')
	);
?>
<?php
echo $this->Html->link(
	'Edit',
		array(
			'action' => 'edit', $post['Post']['id']
		)
	);
?>
</td>
<td>
<?php echo $post['Post']['body']; ?>
</td>
</tr>
<?php endforeach; ?>
<?php unset($post); ?>
</table>

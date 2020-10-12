<h1>投稿</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label' => 'タイトル'));
echo $this->Form->input('body', array('label' => '内容', 'rows' => '3'));
echo $this->Form->end('新規投稿');
?>

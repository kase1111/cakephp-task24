<h1>編集</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label' => 'タイトル'));
echo $this->Form->input('body', array('label' => '内容', 'rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('投稿を更新');
?>

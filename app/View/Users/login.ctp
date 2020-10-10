<div class="users form">
<?php echo $this->Flash->render('Auth'); ?>
<?php echo $this->Form->create('User'); ?>
<fieldset>
<legend>
<?php echo __('emailとパスワードを入力してください'); ?>
</legend>
<?php echo $this->Form->input('email');
echo $this->Form->input('password');
?>
</fieldset>
<?php echo $this->Form->end(__('ログイン')); ?>
</div>

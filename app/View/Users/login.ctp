<div class="users form">
<?php echo $this->Flash->render('Auth'); ?>
<?php echo $this->Form->create('User'); ?>
<fieldset>
<legend>
<?php echo __('Please enter your username and password'); ?>
</legend>
<?php echo $this->Form->input('email');
echo $this->Form->input('password');
?>
</fieldset>
<?php echo $this->Form->end(__('ログイン')); ?>
</div>

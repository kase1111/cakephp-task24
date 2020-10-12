<div class="users form">
<?php echo $this->Form->create('User'); ?>
<fieldset>
<legend><?php echo __('新規登録'); ?></legend>
<?php echo $this->Form->input('name', array('label' => '名前')); ?>
<?php echo $this->Form->input('email', array('label' => 'メールアドレス')); ?>
<?php echo $this->Form->input('password', array('label' => 'パスワード')); ?>
</fieldset>
<?php echo $this->Form->end(__('登録')); ?>
</div>

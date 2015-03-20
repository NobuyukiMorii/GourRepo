<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->hidden('User.del_flg', array('value' => 1)); ?>
<?php echo $this->Form->end(__('削除')); ?>
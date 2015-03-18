<?php echo $this->Html->script('input-keypress');?>
<div class="col-md-8 header">
	<div class="input-group input-group-sm header-margin header-form">
		<span class="input-group-addon" id="sizing-addon1">Search</span>
		<?php echo $this->Form->create('Movie', array('type' => 'post' , 'action' => 'serchResult' , 'class' => "form-serch")); ?>
		<input type="text" name="areaname" class="form-control" placeholder="エリア・ジャンル" aria-describedby="sizing-addon1" id="form-input">
		<?php $this->Form->end() ;?>
	</div>
</div>

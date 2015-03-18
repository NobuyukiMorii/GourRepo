<div class="col-md-8 header">
	<div class="input-group input-group-sm header-margin header-form">
		<span class="input-group-addon" id="sizing-addon1">Search</span>
<<<<<<< HEAD
		<?php echo $this->Form->create('Movie', array('type' => 'post' , 'action' => 'serchResult' , 'class' => "form-serch")); ?>
		<input type="text" name="areaname" class="form-control" placeholder="エリア・ジャンル" aria-describedby="sizing-addon1" id="form-input">
		<?php echo $this->Form->end() ;?>
=======
		<?php echo $this->Form->create('Movie', array('type' => 'post' , 'action' => 'serchResult')); ?>
		<input type="text" name="areaname" class="form-control" placeholder="エリア・ジャンル" aria-describedby="sizing-addon1">
		<input type="submit" value="送信">
		<?php $this->Form->end() ;?>
>>>>>>> 1bad9090aa79680d595dd0af4c6165c7d63bf550
	</div>
</div>
<div class="col-md-8 header">
	<div class="input-group input-group-sm header-margin header-form">
		<span class="input-group-addon" id="sizing-addon1">Search</span>
		<?php echo $this->Form->create('Movie', array('type' => 'post' , 'action' => 'serchResult')); ?>
		<input type="text" name="areaname"　class="form-control" placeholder="エリア・ジャンル" aria-describedby="sizing-addon1">
		<input type="submit" value="送信">
		<?php $this->Form->end() ;?>
		</form>
	</div>
</div>
<?php echo $this->Form->create('Movie', array('type' => 'post' , 'action' => 'serchResult' , 'class' => "form-serch")); ?>
<?php if(empty($areaname)) :?>
	<input type="text" name="areaname" class="form-control" placeholder="エリア・ジャンル・レポーター名" aria-describedby="sizing-addon1" id="form-input">
<?php endif ; ?>
<?php if(!empty($areaname)) :?>
	<input type="text" name="areaname" class="form-control" aria-describedby="sizing-addon1" id="form-input" value="<?php echo $areaname ;?>" >
<?php endif ; ?>

<?php echo $this->Form->end() ;?>

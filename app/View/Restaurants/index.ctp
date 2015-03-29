<h1>Restaurants_add</h1>

<?php
echo $this->Html->link(
			'restaurants_add',
			array('controller' => 'restaurants', 'action' => 'restaurants_add', "Add"));

echo $this->Html->link(
	'edit',
	array('controller' => 'restaurants', 'action' => 'edit',"Edit"));


echo $this->Html->link(
	'利用規約',
	array('controller' => 'restaurants', 'action' => 'rule',"規約"));

?>
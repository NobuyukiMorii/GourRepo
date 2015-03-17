<?php
class Restaurant extends AppModel {
	public $name = 'Restaurant';
    public $hasMany = array(
        'Movie' => array(
            'className'     => 'Movie',
            'foreignKey'    => 'restaurant_id',
        )
    );
}

/*
class Restaurant extends AppModel{
	public function getAll(){
		return $this->find('all');
	}
}
*/

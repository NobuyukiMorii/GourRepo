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

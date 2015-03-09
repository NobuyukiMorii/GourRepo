<?php
class Restaurant extends AppModel {
	public $name = 'Restaurant';
    public $hasMany = array(
        'Movie' => array(
            'className'     => 'Movie',
            'foreignKey'    => 'movie_id',
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

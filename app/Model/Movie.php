<?php
class Movie extends AppModel {

	public $name = 'Movie';

    public $hasMany = array(
        'TagRelation' => array(
            'className'     => 'TagRelation',
            'foreignKey'    => 'movie_id',
        )
    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Restaurant' => array(
            'className' => 'Restaurant',
            'foreignKey' => 'restaurant_id'
        )
    );

}

<?php
class Restaurant extends AppModel {
	public $name = 'Restaurant';
    public $hasMany = array(
        'Movie' => array(
            'className'     => 'Movie',
            'foreignKey'    => 'movie_id',
            'foreignKey'    => 'restaurant_id',
        )
    );
<<<<<<< HEAD
}
=======
}
>>>>>>> 9ca519effb17cdfbc0f4efc2be5dc6b426b2389a

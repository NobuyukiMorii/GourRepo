<?php
class User extends AppModel {

	public $name = 'User';

	public $hasOne = 'UserProfile';

    public $hasMany = array(
        'Movie' => array(
            'className'     => 'Movie',
            'foreignKey'    => 'user_id',
        ),
        'UserFavoriteMovieList' => array(
            'className'     => 'UserFavoriteMovieList',
            'foreignKey'    => 'user_id',
        ),
        'UserWatchMovieList' => array(
            'className'     => 'UserWatchMovieList',
            'foreignKey'    => 'user_id',
        )
    );

    public $belongsTo = array(
        'Restaurant' => array(
            'className' => 'Restaurant',
            'foreignKey' => 'user_id'
        )
    );

}

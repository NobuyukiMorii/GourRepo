<?php
class User extends AppModel {

    public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );


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

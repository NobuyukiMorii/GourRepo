<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

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
                'rule' => array('inList', array('admin', 'contributor')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    public $actsAs = array(
        'UploadPack.Upload' => array(
            'avatar' => array(
            'styles' => array(
                'thumb' => '85x85'
            )
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }


	public $name = 'User';

	public $hasOne = 'UserProfile';

    public $hasMany = array(
        'Movie' => array(
            'className'     => 'Movie',
            'foreignKey'    => 'user_id',
            'conditions'=> array('Movie.del_flg' => 0),
            'order' => array('Movie.created' => 'DESC')
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


}

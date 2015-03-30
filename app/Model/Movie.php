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

    public $validate = array(
        'title' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => 'タイトルは必ず入力して下さい。'
            ),
            'maxLength' => array(
                'rule'    => array('maxLength', 50),
                'message' => 'タイトルは50文字以内で入力して下さい。'
            )
        ),
        'description' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '紹介文は必ず入力して下さい。',
            ),
            'maxLength' => array(
                'rule'    => array('maxLength', 200),
                'message' => 'タイトルは200文字以内で入力して下さい。'
            )
        ),
        'youtube_url' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '紹介文は必ず入力して下さい。'
            ),
            'website' => array(
                'rule' => 'url',
                'message' => '紹介文は必ず入力して下さい。'
            )
        ),
        'youtube_iframe_url' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '紹介文は必ず入力して下さい。'
            ),
            'website' => array(
                'rule' => 'url',
                'message' => '紹介文は必ず入力して下さい。'
            )
        ),
        'thumbnails_url' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => '紹介文は必ず入力して下さい。'
            ),
            'website' => array(
                'rule' => 'url',
                'message' => '紹介文は必ず入力して下さい。'
            )
        )
    );

}

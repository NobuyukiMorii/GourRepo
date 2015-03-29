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
                'message' => 'notEmpty',
                'last'    => 'タイトルは必ず入力して下さい。'
            ),
            'between' => array(
                'rule'    => array('between', 1, 50),
                'message' => 'タイトルは50文字以内で入力して下さい。'
            )
        ),
        'description' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => 'notEmpty',
                'last'    => '紹介文は必ず入力して下さい。'
            ),
            'between' => array(
                'rule'    => array('between', 1, 100),
                'message' => '紹介文は100文字以内で入力して下さい。'
            )
        ),
        'youtube_url' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => 'notEmpty',
                'last'    => 'YoutubeのURLは必ず入力して下さい。'
            ),
            'website' => array(
                'rule' => 'url',
                'message' => 'notEmpty',
                'last'    => 'YoutubeのURLは必ず入力して下さい。'
            )
        ),
        'youtube_iframe_url' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => 'notEmpty',
                'last'    => 'YoutubeのURLは必ず入力して下さい。'
            ),
            'website' => array(
                'rule' => 'url',
                'message' => 'notEmpty',
                'last'    => 'YoutubeのURLは必ず入力して下さい。'
            )
        ),
        'thumbnails_url' => array(
            'notEmpty' => array(
                'rule'    => 'notEmpty',
                'message' => 'notEmpty',
                'last'    => 'YoutubeのURLは必ず入力して下さい。'
            ),
            'website' => array(
                'rule' => 'url',
                'message' => 'notEmpty',
                'last'    => 'YoutubeのURLは必ず入力して下さい。'
            )
        )
    );

}

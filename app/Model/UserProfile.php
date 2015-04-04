<?php
class UserProfile extends AppModel {

    public $actsAs = array(
        'UploadPack.Upload' => array(
            'avatar' => array(
            'styles' => array(
                'thumb' => '85x85'
            )
            )
        )
    );

	public $name = 'UserProfile';

    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'ユーザーネームを入力してください'
            )
        ),
    );

}
<?php
class Restaurant extends AppModel {
	
	public $actsAs = array(
        'UploadPack.Upload' => array(
            'avatar' => array(
                'styles' => array(
                    'thumb' => '85x85'
                )
            )
        )
    );

    public $validate = array(
        'gournabi_id' => array(

          'rule' => array('alphaNumeric','isUnique'),
          'message' => 'このidは既に入力されています'
        ),
        'name' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => '名前を入力してください'
        )),
        'address' => array( 
            'required' => array(
                'rule' => 'notEmpty',
                'message' => '住所を入力してください。'
            ),
        ),
        'category_code_l' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'カテゴリー(大)を選択してください'
            ),
        ),
        'category_code_s' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'カテゴリー（小）を選択してください'
            ),
        ),
        'url' => array(
            'rule' => 'url',
            'message' => 'URLを正しく入力してください。'
        ),
    );
	
}



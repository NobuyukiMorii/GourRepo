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
           'allowEmpty' => true,
           'message' => 'このidは既に入力されています'
         ),
        'image_url' => array(
            'rule' => array('extension' => array('gif', 'jpeg', 'png', 'jpg'),
            'allowEmpty' => true,
            'message' => 'ファイル形式が間違っています'
        ), 
        'name' => array(
            'rule' => 'alphaNumeric',
            'allowEmpty' => true,
            'required' => array(
                'rule' => 'notEmpty',
                'message' => '名前を入力してください'
        ),
        'tel' => array(
            'rule' => array('phone', null),
            'message' => '電話番号の形式が間違っています'
            'allowEmpty'
        ),
        'address' => array(
            'rule' => array('alphaNumeric'),
            'message' => array('アドレス形式が間違っています'),      
            'required' => array(
                'rule' => 'notEmpty',
                 'message' => '住所を入力してください。'
            ),
        ),
        'latitude' => array(
            'allowEmpty' => 'ture'
            'message' => 'メールアドレス形式が間違っています'
         ),
        'longitude' => array(
            'allowEmpty' => 'ture'
            'message' => 'メールアドレス形式が間違っています'
        ),
        'category_code_l' => array(
            'required' => array(
                'rule' => 'notEmpty'
            ),
            'message' => 'カテゴリー(大)を選択してください'
        ),
        'category_name_l' => array(
            'required' => array(
                'rule' => 'notEmpty'
                ),
            'message' => 'カテゴリー(小)を選択してください'
        ),
        'category_code_s' => array(
            'required' => array(
                'rule' => 'notEmpty'
                    ),
            'message' => '都道府県を選択してください'
        ),
        'category_name_s' => array(
            'required' => array(
                'rule' => 'notEmpty'
                ),
            'message' => 'エリアを選択してください'
        ),
        'url' => array(
            'rule' => 'alphaNumeric'
        ),
        'url_mobile' => array(
            'rule' => 'alphaNumeric'
        ),
        'opentime' => array(
            'rule' => 'alphaNumeric'
        ),
        'holiday' => array(
            'rule' => 'alphaNumeric'
        ),
        'access_line' => array(
            'rule' => 'alphaNumeric'
        ),
        'access_station' => array(
            'rule' => 'alphaNumeric'
        ),
        'access_station_exit' => array(
            'rule' => 'alphaNumeric'
        ),
        'access_walk' => array(
            'rule' => 'alphaNumeric'
        ),
        'access_note' => array(
            'rule' => 'alphaNumeric'
        ),
        'parking_lots' => array(
            'rule' => 'alphaNumeric'
        ),
        'pr' => array(
            'rule' => 'alphaNumeric'
        ),
        'budget' => array(
            'rule' => 'alphaNumeric'
        ),
        'lunch' => array(
            'rule' => 'alphaNumeric'
        ),
    );




        // 'role' => array(
        //     'valid' => array(
        //         'rule' => array('inList', array('admin', 'contributor')),
        //         'message' => 'Please enter a valid role',
        //         'allowEmpty' => false
        //     )
        // )

	
}



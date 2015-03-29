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
	
}



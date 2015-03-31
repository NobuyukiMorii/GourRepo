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
                'rule' => 'alphaNumeric')
            '')
echo $this->Form->input('image_url');
echo $this->Form->input('name');
echo $this->Form->input('tel');
echo $this->Form->input('address');
echo $this->Form->input('latitude');
echo $this->Form->input('longitude');
echo $this->Form->input('category_code_l');
echo $this->Form->input('category_name_l');
echo $this->Form->input('category_code_s');
echo $this->Form->input('category_name_s');
echo $this->Form->input('url');
echo $this->Form->input('url_mobile');
echo $this->Form->input('opentime');
echo $this->Form->input('holiday');
echo $this->Form->input('access_line');
echo $this->Form->input('access_station');
echo $this->Form->input('access_station_exit');
echo $this->Form->input('access_walk');
echo $this->Form->input('access_note');
echo $this->Form->input('parking_lots');
echo $this->Form->input('pr');
echo $this->Form->input('code_areacode');
echo $this->Form->input('code_areaname');
echo $this->Form->input('code_prefcode');
echo $this->Form->input('code_prefname');
echo $this->Form->input('budget');
echo $this->Form->input('party');
echo $this->Form->input('lunch');
echo $this->Form->input('credit_card');
echo $this->Form->input('equipment');
echo $this->Form->input('avatar', array('type' => 'file', 'label' => false));
    )
	
}



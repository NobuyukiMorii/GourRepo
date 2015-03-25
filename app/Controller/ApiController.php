<?php
class ApiController extends AppController {

    public $uses = array('SmallCategory');

    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    public function getSmallCategory($l_code) {
        $SmallCategories = $this->SmallCategory->find('all',array(
            'conditions' => array('l_code' => $l_code)
        ));
        $this->set(array(
            'SmallCategories' => $SmallCategories,
            '_serialize' => array('SmallCategories')
        ));
    }

}
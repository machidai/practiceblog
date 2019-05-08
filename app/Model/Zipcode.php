<?php
App::uses('AppModel', 'Model');
class Zipcode extends AppModel {
public $useTable = 'zipcodes';

public $validate = array(
    'text' => array(
        'rule' => array('minLength','7'),
        'message' => '7文字入力してください',
        'allowEmpty'=> true,
),
);

}

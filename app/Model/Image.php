<?php
App::uses('AppModel', 'Model');
class Image extends AppModel {
  public $useTable = 'images';

public $actsAs = array(
    'Upload.Upload' => array(
        'attachment' => array(
            "path" => "{ROOT}webroot{DS}img{DS}image{DS}",
            "rootDir" => ROOT . DS . APP_DIR . DS,
            'thumbnailSizes' => array(
                'xvga' => '1024x768',
                'vga' => '640x480',
                'thumb' => '80x80',
            ),
        ),
    ),
);

public $belongsTo = array(
    'Post' => array(
        'className' => 'Post',
        'foreignKey' => 'post_id',
        'dependent' => true
    )
);

public $validate = array(
    'attachment' => array(
        'imageRule' => array(
            'rule' => array('extension',array('jpeg','png','jpg',)),
            'message' => '有効な画像ファイルを指定してください。',
            //'allowEmpty'=>true//空欄でも可にする
        ),
        'imageRule2' => array(
                'rule' => array('isBelowMaxSize', 102400, false),
                'message' => 'サイズが大きい',
        ),
        /*'imageRule3' => array(
                'rule' => array('checkFileEmpty'),
        ),*/
    ),
);

/*public function checkFileEmpty($data){
    debug($data);
    exit;
    if($this->data['Image']['attachment']['name'] == ""){
        unset($image);
    }


}*/

}

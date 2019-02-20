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
   )
);
   }

<?php
App::uses('AppModel', 'Model');
class Image extends AppModel {
  public $useTable = 'images';

public $actsAs = array(
    'Upload.Upload' => array(
      'attachment' => array(
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
   ),
);
   }

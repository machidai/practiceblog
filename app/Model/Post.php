<?php
App::uses('AppModel', 'Model');
class Post extends AppModel {
  public $useTable = 'posts';
  public $belongsTo ='Category';

  public $validate = array(
      'title' => array(
          'rule' => 'notBlank'
      ),
      'body' => array(
          'rule' => 'notBlank'
      )
  );
  public $hasMany = array(
  'Image' => array(
    'className' => 'Image',
    'foreignKey' => 'post_id',
    //'conditions' => array(
      //'Image.model' => 'Post',
    ),
  //),
);
  public $hasAndBelongsToMany = array(
  'Tag' =>
    array(
      'className'              => 'Tag',
      'joinTable'              => 'posts_tags',
      'foreignKey'             => 'post_id',
      'associationForeignKey'  => 'tag_id',
    )
);


  public function isOwnedBy($post, $user) {
    return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
}
}

?>

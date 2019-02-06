<?php
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

  public $hasAndBelongsToMany = array(
  'Tag' =>
    array(
      'className'              => 'tag',
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

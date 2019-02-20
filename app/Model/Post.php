<?php
App::uses('AppModel', 'Model');
class Post extends AppModel {
  public $useTable = 'posts';

  public $actsAs = array('Search.Searchable');
  public $filterArgs = array(
      'user_id' => array(
          'type' => 'value'
      ),
      'keyword' => array(
          'type' => 'like',
          'field' => array(
              'User.username',
              'Post.content'
          )
      ),
  );

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
    )
);
  public $hasAndBelongsToMany = array(
  'Tag' =>
    array(
      'className'              => 'Tag',
      'joinTable'              => 'posts_tags',
      'foreignKey'             => 'post_id',
      'associationForeignKey'  => 'tag_id',
       'unique' => true,
    )
);


  public function isOwnedBy($post, $user) {
    return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
}
}

?>

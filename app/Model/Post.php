<?php
App::uses('AppModel', 'Model');
class Post extends AppModel {
    public $useTable = 'posts';

    public $actsAs = array('Search.Searchable');
    public $filterArgs = array(
        'title' => array(
            'type' => 'like',
            'field' => 'title',
        ),
        'category_id' => array(
            'type' => 'value',
            'field' => 'category_id',
        ),
        'tag_id' => array(
            'type' => 'subquery',
            'method' => 'findByTag',
            'field' => 'Post.id',
        ),

  );
    //orの状態(邦楽だけか、邦楽とそれ以外が入っているもの)
    //andにする

    function findByTag($data = array()) {
        $condition = ['tag_id' => $data['tag_id']];
        $db = $this->getDataSource();
        $subQuery = $db->buildStatement(
    array(
        'fields' => array('post_id'),//sqlのselectにあたる
        'table' => 'posts_tags',//sqlのfromにあたる
        'alias' => 'PostsTag',//sqlのasにあたる
        'conditions' => $condition,
        'group' => array('post_id'),
        'having' => array('COUNT(*) =' => count($data['tag_id'])),
    ),

    $this
);
        return $subQuery;

}





    public $belongsTo ='Category';

    public $validate = array(
        'title' => array(
            'rule' => 'notBlank',
            'allowEmpty'=>true,//空欄でも可にする
    ),
        'content' => array(
            'rule' => 'notBlank'
    ),

  );
  public $hasMany = array(
  'Image' => array(
    'className' => 'Image',
    'foreignKey' => 'post_id',
    'dependent' => true,
    'conditions' => array('Image.deleted' => '0'),
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
        'with' => 'PostsTag',
    )
);


  public function isOwnedBy($post, $user) {
    return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
}
}

?>

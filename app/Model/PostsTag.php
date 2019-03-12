<?php
App::uses('AppModel', 'Model');
class PostsTag extends AppModel {
 public $useTable = 'posts_tags';
 public $belongsTo = array(
    'Tag' => array(
        'className' => 'Tag',
        'foreignKey' => 'tag_id',
        'conditions' => '',
        'fields' => '',
        'order' => ''
    ),
    'Post' => array(
        'className' => 'Post',
        'foreignKey' => 'post_id',
        'conditions' => '',
        'fields' => '',
        'order' => ''
    )
);



}

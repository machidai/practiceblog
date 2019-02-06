<?php
class Tag extends AppModel {


public $hasAndBelongsToMany = array(
  'Post' =>
    array(
      'className'              => 'post',
      'joinTable'              => 'post_tags',
      'foreignKey'             => 'tag_id',
      'associationForeignKey'  => 'post_id',
    )
);
}
?>

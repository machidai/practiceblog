<?php
class Image extends AppModel {
  public $useTable = 'images';
    public $belongsTo = array('Post');
}
?>

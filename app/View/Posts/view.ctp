
<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['content']); ?></p>

<h1>画像</h1>

<?php
debug($post['Image']);
foreach ($post['Image'] as $images):
echo $this->Html->image('../img/image/' .$images['dir'] . '/' .$images['attachment']);

//echo $this->Html->image('../img/image/' .implode(Hash::extract($post, 'Image.{n}.dir')) . '/' .implode(Hash::extract($post, 'Image.{n}.attachment')));
//debug($images);
endforeach;
?>
<!--$base = $this->Html->url( "/img/image/attachment/" );
$this->Html->image( $base . $post["Image"][$i]["dir"] . "/" . $post["Image"][$i]["attachment"] );
debug($post['Image']);
debug($post['Image'][0]['attachment']);-->

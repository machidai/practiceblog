<?php $posts=$this->request->data['Post'] ?>

<h1><?php echo h($posts['title']); ?></h1>

<p><small>Created: <?php echo $posts['created']; ?></small></p>

<p><?php echo h($posts['content']); ?></p>

<h1>画像</h1>

<?php foreach ($this->request->data['Image'] as $images):
echo $this->Html->image('../img/image/' .$images['dir'] . '/' .$images['attachment']);

//echo $this->Html->image('../img/image/' .implode(Hash::extract($post, 'Image.{n}.dir')) . '/' .implode(Hash::extract($post, 'Image.{n}.attachment')));
//debug($images);
//exit;
endforeach;
//$base = $this->Html->url( "/img/image/attachment/" );
//$this->Html->image( $base . $post["Image"][$i]["dir"] . "/" . $post["Image"][$i]["attachment"] );
//debug($post['Image']);
//debug($post['Image'][0]['attachment']);-->

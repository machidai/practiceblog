
<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['content']); ?></p>

<h1>タグ</h1>
<?php foreach($post['Tag'] as $tag): ?>
  <p><?php echo h($tag['tag'])?></p>
<?php endforeach;?>


<?php $posts=$this->request->data['Post'] ?>

<h1 class="margin"><?php echo h($posts['title']); ?></h1>

<p><?php echo h($posts['content']); ?></p>
<!--<p><small>Created: <?php echo $posts['created']; ?></small></p>-->
<h1>画像</h1>
<div class="slider-block">
    <?php foreach ($this->request->data['Image'] as $index => $images):?>
    <div class="me">
        <p><a href='' class="modalOpen">
            <?php echo $this->Html->image('../img/image/' .$images['dir'] . '/' .$images['attachment']);
            ?>
        </a></p>
        <div class="modal">
    <!-- モーダルウィンドウが開いている時のオーバーレイ -->
            <div class="overLay modalClose"></div>
    <!-- モーダルウィンドウの中身 -->
            <div class="inner">
                <?php echo $this->Html->image('../img/image/' .$images['dir'] . '/' .$images['attachment'],array(
                'class'=> $index,'width'=>500));?>
                <button class="slider-prev"><i class="fas fa-chevron-left"></i></button>
                <button class="slider-next"><i class="fas fa-chevron-right"></i></button>
                <a href="" class="modalClose close">✖︎</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<!--echo $this->Html->image('../img/image/' .implode(Hash::extract($post, 'Image.{n}.dir')) . '/' .implode(Hash::extract($post, 'Image.{n}.attachment')));
debug($images);
exit;-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php echo $this->Html->script('view.js'); ?>
<?php echo $this->Html->css('view.css'); ?>
<!--$base = $this->Html->url( "/img/image/attachment/" );
$this->Html->image( $base . $post["Image"][$i]["dir"] . "/" . $post["Image"][$i]["attachment"] );
debug($post['Image']);
debug($post['Image'][0]['attachment']);-->

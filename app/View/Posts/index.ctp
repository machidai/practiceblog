
<div class="main">
<header>
    <h1 class="title">The Cakephp Blog</h1>
</header>
    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

<?php foreach ($posts as $post): ?>
    <div class="card">
        <!--<img src="..." class="card-img-top" alt="...">-->
        <div class="card-body">
            <div class="card-content">
            <!--<?php echo $post['Post']['id']; ?>-->
            <div class="created"><?php echo $post['Post']['created']; ?></div>
            <div class="edit"><?php
                echo $this->Html->link(
                    '編集', array('action' => 'edit', $post['Post']['id'])
                );
            ?></div>
            <div class="delete"><?php echo $this->Form->postLink(//Html->linkだとviewを作らないといけないが
                        '削除',
                        array('action' => 'delete', $post['Post']['id']),
                        array('confirm' => 'Are you sure?')
                    );
                ?></div>
            <h5 class="card-title"><?php echo $this->Html->link($post['Post']['title'],
            array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></h5>

            <p class="card-text"><?php echo $post['Post']['content']; ?></p>

            <?php echo $this->Html->link('記事を読む',array(
                'controller' => 'posts',
                'action' => 'view',
                $post['Post']['id']),array('class' => 'btn btn-outline-primary')
            ); ?>

            <div class="category">カテゴリ一覧：&nbsp;<?php echo $post['Category']['name']; ?></div>

            <div class="tag">タグ一覧：&nbsp;<?php echo (implode(Hash::extract($post, 'Tag.{n}.title'))) ?></div>
            </div>
            <!--<div class="thumbnail"><?php echo $this->Html->image('../img/image/' .implode(Hash::extract($post, 'Image.{n}.dir')) . '/' .implode(Hash::extract($post, 'Image.{n}.filename')));
            ?></div>-->
        </div>
    </div>
<?php endforeach; ?>
<?php unset($post); ?>
<!--<p><?php echo $this->Paginator->counter(array('format' => __('total: {:count}, page: {:page}/{:pages}')));?></p>-->
<div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
     |  <?php echo $this->Paginator->numbers();?>
 |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
    </div>
</div>
<div class="sidebar">
    <div class="archives">
        <p>Archives</p>
        <p>2019</p>
        <ul>
            <li>January</li>
            <li>February</li>
            <li>March</li>
            <li>April</li>
        </ul>
    </div>
</div>

<footer>
    <div class="footer-inside">
        <p>Blog template built for Bootstrap by @mdo.</p>
        <a href="/">Back to top</a>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php echo $this->Html->script('index.js');?>

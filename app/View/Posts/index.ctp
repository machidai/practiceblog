
<div class="main">
<header>
    <h1 class="title">The Cakephp Blog</h1>
</header>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id', 'ID');?></th>
        <th><?php echo $this->Paginator->sort('title', 'タイトル');?></th>
        <th><?php echo $this->Paginator->sort('category_id', 'カテゴリー');?></th>
        <th><?php echo $this->Paginator->sort('Tag', 'タグ');?></th>
        <th>機能</th>
        <th><?php echo $this->Paginator->sort('created', '制作日');?></th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>

        <td><?php echo $post['Category']['name']; ?></td>

          <td><?php echo (implode(Hash::extract($post, 'Tag.{n}.title'))) ?></td>
        <td>
            <?php
                echo $this->Form->postLink(//Html->linkだとviewを作らないといけないが
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post['Post']['id'])
                );

            ?>
        </td>

        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>

<!--<p><?php echo $this->Paginator->counter(array('format' => __('total: {:count}, page: {:page}/{:pages}')));?></p>-->
<div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
     |  <?php echo $this->Paginator->numbers();?>
 |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
    </div>
</div>
<div class="sidebar">
</div>

<footer>
    <div class="footer-inside">
        <p>Blog template built for Bootstrap by @mdo.</p>
        <a href="/">Back to top</a>
    </div>
</footer>

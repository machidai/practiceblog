<h1>Blog posts</h1>
<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>
<?php echo $this->Form->create('Post', array(
    'url.action' => array_merge(array('action' => 'index'), $this->params['pass']),
    'name' => 'PostSearchForm',
));?>
<?php echo $this->Form->input('title', array(//第一引数から検索する
    'label' => 'タイトル',
    'rows' => '1',
    'style' => 'width:30%',
)); ?>
<?php echo $this->Form->input('category_id',array(
    'label' => 'カテゴリ',
    'multiple' => 'checkbox',
    'div' => false,
));?>
<?php echo $this->Form->input('tag_id',array(
    'label' => 'タグ',
    'multiple'=> 'checkbox',
    'options' => $tags,
    )
);?>
<?php echo $this->Form->submit(__('検索'), array(
        'div' => false,
    )
);?>
<?php echo $this->Form->end(); ?>
<?php
echo $this->element('logout');

?>
<p><?php echo $this->Paginator->counter(array('format' => __('total: {:count}, page: {:page}/{:pages}')));?></p>
<div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
     |  <?php echo $this->Paginator->numbers();?>
 |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
    </div>
<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id', 'ID');?></th>
        <th><?php echo $this->Paginator->sort('title', 'Title');?></th>
        <th><?php echo $this->Paginator->sort('category_id', 'Category');?></th>
        <th><?php echo $this->Paginator->sort('Tag', 'Tag');?></th>
        <th>Functions</th>
        <th><?php echo $this->Paginator->sort('created', 'Created');?></th>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php echo $this->Html->script('index.js');?>

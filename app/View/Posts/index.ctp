<h1>Blog posts</h1>
<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>
<?php
echo $this->element('logout');
?>
<table>
    <tr>
        <th>id</th>
        <th>Title</th>
        <th>Category</th>
        <th>Tags</th>
        <th>Functions</th>
        <th>Created</th>
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

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item">
        <div class="nav-link">
            <?php echo $this->Html->link('Add Post',array(
                'controller' => 'posts',
                'action' => 'add',
            )); ?>
        </div>
    </li>
    <li class="nav-item">
        <div class="nav-link btnOpen search-header">
            <a>Search</a>
        </div>
    </li>
    <li class="nav-item">
        <div class="nav-link">
            <?php echo $this->element('logout'); ?>
        </div>
    </li>
</ul>

<?php echo $this->Form->create('Post', array(
    'action' => 'index',
    'name' => 'PostSearchForm',
    'class' => 'search',
));?>
<?php echo $this->Form->input('title', array(//第一引数から検索する
    'label' => 'タイトル',
    'rows' => '1',
    )
); ?>

<?php echo $this->Form->input('category_id',array(
    'label' => 'カテゴリ',
    'multiple' => 'checkbox',
    'options' => $categories
));
?>

<?php echo $this->Form->input('tag_id',array(
    'div' => false,
    'label' => 'タグ',
    'multiple'=> 'checkbox',
    'options' => $tags,
    )
);?>
<div>
<?php echo $this->Form->submit(__('検索'), array(
        'div' => false,
    )
);?>
</div>
<?php echo $this->Form->end(); ?>

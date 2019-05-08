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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php echo $this->Html->script('header.js');?>

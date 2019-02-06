<?php echo $this->form->create(null, array('type'=>'file', 'action'=>'add'));?>
<?php echo $this->session->flash();?>
<?php echo $this->form->file('image');?>
<?php echo $this->form->submit('画像を追加');?>
<?php echo $this->form->end();?>

<h2>追加した画像</h2>
<ul>
<?php foreach ($images as $image) { ?>
    <li><?php echo $this->html->link("/images/contents/{$image['Image']['filename']}");?></li>
<?php } ?>
</ul>

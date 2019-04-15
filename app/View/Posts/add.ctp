
<?php
echo $this->Form->create('Post',array('type'=>'> file',
'enctype' => 'multipart/form-data'));
echo $this->Form->input('title');
echo $this->Form->input('content', array('rows' => '3',"required" => false));
echo $this->Form->select('category_id',$categories);
echo $this->Form->input('Post.Tag',array(
     'type' => 'select',
     'label' => 'タグ一覧',
    'multiple'=> 'checkbox',//どのようにセレクト出来るかの種類
    'options'=> $tags
));
$index = 0;
for($i=0;$i<=1;$i++){
echo $this->Form->input("Image.".($index+$i).".attachment", array(
    'type' => 'file',
    'label'=>'画像',
    'required' => false
));
}
 


/*echo $this->Form->input("Image.0.attachment", array(
    'type' => 'file',
    'label'=>'画像',
    'required'=>false
));

   //echo $this->Form->input('Image.1.attachment', array(
     // 'type' => 'hidden',
    //   'value' => 'Post',
    //));
    */
echo $this->Form->end('Save Post');
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php echo $this->Html->script('add.js');?>

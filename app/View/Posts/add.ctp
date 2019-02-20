<h1>Add Post</h1>
<?php
echo $this->Form->create('Post',array('type'=>'> file',
'enctype' => 'multipart/form-data'));
echo $this->Form->input('title');
echo $this->Form->input('content', array('rows' => '3'));
echo $this->Form->select('category_id',$category_name);
echo $this->Form->input('Post.Tag',array(
     'type' => 'select',
     'label' => 'タグ一覧',
    'multiple'=> 'checkbox',//どのようにセレクト出来るかの種類
    'options'=> $tag

));

echo $this->Form->input('Image.0.attachment', array(
    'type' => 'file',
    'label'=>'画像'
));
 echo $this->Form->input('Image.0.attachment', array(
    'type' => 'hidden',
      'value' => 'Post',
  ));
  echo $this->Form->input('Image.1.attachment', array(
      'type' => 'file',
      'label'=>'画像'
  ));
   echo $this->Form->input('Image.1.attachment', array(
      'type' => 'hidden',
        'value' => 'Post',
    ));
echo $this->Form->end('Save Post');

<h1>Edit Post</h1>
<?php
echo $this->element('logout');
?>
<?php
echo $this->Form->create('Post',array('type'=>'> file',
'enctype' => 'multipart/form-data'));

echo $this->Form->input('title');
echo $this->Form->input('content', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->select('category_id',$category_name);
echo $this->Form->input('Tag',array(
     'type' => 'select',
     'label' => 'タグ一覧',
    'multiple'=> 'checkbox',//どのようにセレクト出来るかの種類
    'options'=> $tag
));
//debug($this->request->data);
//exit;
foreach ($this->request->data['Image'] as $images):
echo $this->Html->image('../img/image/' .$images['dir'] . '/' .$images['attachment']);
endforeach;
//echo $this->Html->image('../img/image/'.implode(Hash::extract($this->request->data,'Image.{n}.dir')).'/'.implode(Hash::extract($this->request->data,'Image.{n}.attachment')));


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
?>

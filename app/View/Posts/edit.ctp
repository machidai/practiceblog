<h1>Edit Post</h1>
<?php
debug($tag);

echo $this->element('logout');

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
?>



<?php foreach ($this->request->data['Image'] as $images):?>
    <div class="photo">
    <!--app/webroot/img/image/$images['dir']/$images['attachment']をデータベースを参考にしてフォルダから取り出している。-->
<?php
echo $this->Html->image('../img/image/' .$images['dir'] . '/' .$images['attachment']);
echo $this->Form->button('削除',array(
    'type' => 'button',array(
    'Controller' => 'posts',
    'action' => 'delete',
     $images['dir'],$images['attachment']
)));
?>
</div>
<?php endforeach; ?>
<!--echo $this->Html->image('../img/image/'.implode(Hash::extract($this->request->data,'Image.{n}.dir')).'/'.implode(Hash::extract($this->request->data,'Image.{n}.attachment')));-->
<?php
echo $this->Form->input('Image.0.attachment', array(
    'type' => 'file',
    'label'=>'画像',
    'value' => 'Post'
));
 //echo $this->Form->input('Image.0.attachment', array(
    //'type' => 'hidden',
     // 'value' => 'Post',
 // ));
  echo $this->Form->input('Image.1.attachment', array(
      'type' => 'file',
      'label'=>'画像',
      'value' => 'Post'
  ));
  // echo $this->Form->input('Image.1.attachment', array(
     // 'type' => 'hidden',
    //    'value' => 'Post',
    //));
echo $this->Form->end('Save Post');
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 <!--$this->Html->scriptStart(array('inline'=>false));-->
 <script type="text/javascript">
 //var result = $('button').closest('div');
 $(function () {
     $('button').click(function () {
         $(this).closest('.photo').hide();
    });

 });
 </script>
 <!--$this->Html->scriptEnd();-->

<?php
echo $this->Form->create('Post',array('type'=>'> file',
'enctype' => 'multipart/form-data','class' =>'margin'));
echo $this->Form->input('title',array('rows' => '1'));
echo $this->Form->input('content', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->select('category_id',$categories);
echo $this->Form->input('Tag',array(
     'type' => 'select',
     'label' => 'タグ一覧',
    'multiple'=> 'checkbox',//どのようにセレクト出来るかの種類
    'options'=> $tags
));
?>
<?php $indexMax = 0; ?>
<?php foreach ($this->request->data['Image'] as $index=>$images):?><!--foreachでpostに結びついているImage.idを持ってくる。0がindex,配列内容が＄image-->
    <div class="photo">
    <!--app/webroot/img/image/$images['dir']/$images['attachment']をデータベースを参考にしてフォルダから取り出している。-->
<?php
//$images['dir']はdirectryという意味で、webrootの中のフォルダを指す
//if($images['deleted']== true){
//}
echo $this->Html->image('../img/image/' .$images['dir'] . '/' .$images['filename'],array('class' => 'pop'));

echo $this->Form->button('削除',array(
    'type' => 'button',
));
echo $this->Form->input('Image.'.$index.'.deleted', array(
    'type' => 'hidden',
    'value' => $images['deleted'] === false ? '0' :'1',//deletedの内容がfalseと同じだったら0
    'class' => 'hide',
));
//debug($this->request->data);
//exit;
echo $this->Form->input('Image.'.$index.'.id', array(
  'type' => 'hidden',
));
echo $this->Form->input('Image.'.$index.'.dir',array('type' => 'hidden'));
echo $this->Form->input('Image.'.$index.'.filename',array('type' => 'hidden'));

?>
</div>
<?php $indexMax =max($indexMax,$index); ?>

<?php endforeach; ?>

<!--echo $this->Html->image('../img/image/'.implode(Hash::extract($this->request->data,'Image.{n}.dir')).'/'.implode(Hash::extract($this->request->data,'Image.{n}.attachment')));-->
<?php
for($i=1;$i<=2;$i++){
echo $this->Form->input("Image.".($indexMax+$i).".attachment", array(
    'type' => 'file',
    'label'=>'画像',
    'required' => false
));

}

echo $this->Form->end('Save Post');
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 <?php echo $this->Html->script('image.js');?>

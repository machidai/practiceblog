<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    ?>
</fieldset>

<div class="admbox">
    <table>
     <tr>
       <th>郵便番号</br>(ハイフン不要)</th>
       <td><?php echo $this->Form->input('Zipcode.code',array(
            'type' => 'text',
            'class' => 'txt',
            'id' => 'zip_input',
            'maxlength'=> '7',
       )); ?><div class="error_box"></div></td>
     </tr>
    <tr>
       <th>都道府県</th>
       <td><?php echo $this->Form->input('Zipcode.prefecture',array(
            'type' => 'text',
            'class' =>'prefecture text',
       )); ?></td>
   </tr>
     <tr>
       <th>市区町村</th>
       <td><?php echo $this->Form->input('Zipcode.city',array(
            'type' => 'text',
            'class' =>'city text',
       )); ?></td>
     </tr>
 </table>
</div>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Html->script('useradd.js');?>

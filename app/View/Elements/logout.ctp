<style type="text/css">
  p{
      float: right;
  }
</style>
<p><?php echo $this->Html->link(
    'Log Out',
    array('controller' => 'Users', 'action' => 'logout'));?></p>

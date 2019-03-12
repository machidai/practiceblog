<?php
echo $this->Form->create('Post', array(
    'url' => array_merge(array('action' => 'find'), $this->params['pass'])
));
echo $this->Form->input('title',array(
    'label' => 'タイトル',
     'text' => 'title',
     'empty' => true,
));
echo $this->Form->input('title',array(
    'text'=>'title',
    'label'=>'title',
));
echo $this->Form->submit(__('Search', true), array('div' => false));
echo $this->Form->end();

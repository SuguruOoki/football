<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php echo $this->Html->link(
    '試合一覧へ',
    array('action' => 'index')
); ?>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('date');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>


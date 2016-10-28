<?php echo $this->Form->create('collection', array('url'=>'index/'+$posts[0]['Collection']['gameid'])); ?>
    <fieldset>
        <legend>検索</legend>
        <?php echo $this->Form->input('play_side_lr', array('label' => 'プレイサイド', 'class' => 'span12', 'placeholder' => '検索')); ?>
    </fieldset>
<?php echo $this->Form->end('検索'); ?>
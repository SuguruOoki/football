<?php echo $this->Form->create('collection', array('url'=>'index/'+$posts[0]['Collection']['gameid'])); ?>
    <fieldset>
        <legend>検索</legend>
        <?php echo $this->Form->input('gameid', array('label' => 'Game ID', 'class' => 'span12', 'placeholder' => '1')); ?>
        <?php echo $this->Form->input('quarter', array('label' => 'クォーター', 'class' => 'span12', 'placeholder' => '1')); ?>
        <?php echo $this->Form->input('play_number', array('label' => 'プレイナンバー', 'class' => 'span12', 'placeholder' => '1')); ?>
    </fieldset>
<?php echo $this->Form->end('検索'); ?>
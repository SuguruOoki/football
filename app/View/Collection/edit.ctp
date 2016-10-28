<!-- File: /app/View/Collection/edit.ctp -->

<h1>Edit Post</h1>
<?php echo $this->Html->link(
    '試合一覧へ',
    array('controller'=>'posts','action' => 'index')
); ?>
<?php
   /* echo $this->Html->link(
    'プレイ一覧へ',
    array('action' => 'index',$collections['Collection']['gameid'])
); */?>

<?php
    //$quarter_items=array(4,1,2,3);
    //$down_items = array('4th','1st','2nd','3rd');
    echo $this->Form->create('Collection');
    //echo $this->Form->input('quarter',array('type'=>'select','default' => $post['collection']['quarter'], 'options'=>$quarter_items));
    echo $this->Form->input('quarter');
    echo $this->Form->input('play_number');
    //echo $this->Form->input('down',array('type'=>'select','default' => $post['collection']['down'], 'options'=>$down_items));
    echo $this->Form->input('down');
    echo $this->Form->input('lest_yds');
    echo $this->Form->input('ball_on');
    echo $this->Form->input('formation_side');
    echo $this->Form->input('offense_front_formation');
    echo $this->Form->input('offense_back_formation');
    echo $this->Form->input('play');
    echo $this->Form->input('play_side_sw');
    echo $this->Form->input('play_side_lr');
    echo $this->Form->input('target');
    echo $this->Form->input('course');
    echo $this->Form->input('gain_yds');
    echo $this->Form->input('defense_formation');
    echo $this->Form->input('cover');
    echo $this->Form->input('check_points', array('rows' => '3'));
    echo $this->Form->input('play_number', array('type' => 'hidden'));
    echo $this->Form->input('gameid', array('type' => 'hidden'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Save Post');
?>
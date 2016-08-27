<!--
    /**
     * Created by PhpStorm.
     * User: suguruoki
     * Date: 2016/08/06
     * Time: 23:23
     */
     -->
<h1>プレイ登録画面</h1>
<?php echo $this->Html->link(
    '戻る',
    array('controller' => 'collection', 'action' => 'index')
); ?>

<?php echo $this->Html->link(
    '一括インポート',
    array('action' => 'import')
); ?>

<?php
    echo $this->Form->create('gameid');
    echo $this->Form->create('Collection');
    echo $this->Form->input('play_number');
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
    echo $this->Form->end('プレイを登録');
?>
<?php echo $this->Html->link(
    '戻る',
    array('controller' => 'collection', 'action' => 'index')
); ?>

<h1>Play List</h1>

<?php echo $this->Html->link(
    'プレイの追加',
    array('controller' => 'collection', 'action' => 'add')
); ?>
<br>
<?php echo $this->Html->link(
    'エクスポート',
    array('controller' => 'collection', 'action' => 'export')
); ?>
<br>
<?php echo $this->Html->link(
    'topへ',
    array('controller' => 'posts', 'action' => 'index')
); ?>

<!--検索フォーム（一部一致）-->
<?php echo $this->Form->create('collection', array('url'=>'index/'+$posts[0]['Collection']['gameid'])); ?>
<fieldset>
    <legend>検索</legend>
    <?php echo $this->Form->input('gameid', array('label' => 'Game ID', 'class' => 'span12', 'placeholder' => '1')); ?>
    <?php echo $this->Form->input('quarter', array('label' => 'クォーター', 'class' => 'span12', 'placeholder' => '1')); ?>
    <?php echo $this->Form->input('play_number', array('label' => 'プレイナンバー', 'class' => 'span12', 'placeholder' => '1')); ?>
</fieldset>
<?php echo $this->Form->end('検索'); ?>
<?php echo $this->element('pager')?>
<table>
    <tr>
        <th>Delete</th>
        <th>Edit</th>
        <th><?php echo $this->Paginator->sort('Collection.play_number', 'Play Number')?></th>
        <th><?php echo $this->Paginator->sort('Collection.down', 'Down')?></th>
        <th><?php echo $this->Paginator->sort('Collection.lest_yds', 'Lest Yards')?></th>
        <th><?php echo $this->Paginator->sort('Collection.ball_on_jin', 'Ball on')?> <?php echo $this->Paginator->sort('Collection.ball_on', ' ')?></th>
        <th><?php echo $this->Paginator->sort('Collection.offense_front_formation', 'Offense Formation')?> <?php echo $this->Paginator->sort('Collection.offense_back_formation', ' ')?></th>
        <th><?php echo $this->Paginator->sort('Collection.play', 'Play')?></th>
        <th><?php echo $this->Paginator->sort('Collection.play_side_st', 'Play Side')?></th>
        <th><?php echo $this->Paginator->sort('Collection.target', 'Pass Target')?></th>
        <th><?php echo $this->Paginator->sort('Collection.course', 'Target Course')?></th>
        <th><?php echo $this->Paginator->sort('Collection.gain_yds', 'Gain Yards')?></th>
        <th><?php echo $this->Paginator->sort('Collection.defense_formation', 'Defense Formation')?></th>
        <th><?php echo $this->Paginator->sort('Collection.cover', 'Cover')?></th>
        <th><?php echo $this->Paginator->sort('Collection.check_points', 'Check Points')?></th>
    </tr>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php
                    echo $this->Html->link(
                        'Delete',
                        array(
                            'action' => 'delete',
                            $post['Collection']['id'],
                            $post['Collection']['gameid']
                        ),
                        array(
                            'confirm' => $post['Collection']['id']
                        )
                    );
                ?></td>
            <!-- 削除用リンク追加 End -->
            <td><?php
                    echo $this->Html->link(
                        'Edit',
                        array(
                            'action' => 'edit',
                            $post['Collection']['id'],
                            $post['Collection']['gameid']
                        )
                    );
                ?></td>
            <td><?php echo $post['Collection']['quarter']; ?> - <?php echo $post['Collection']['play_number']; ?></td>
            <td><?php echo $post['Collection']['down']; ?></td>
            <td><?php echo $post['Collection']['lest_yds']; ?></td>
            <td><?php echo $post['Collection']['ball_on_jin'].' '.$post['Collection']['ball_on']; ?></td>
            <td><?php echo $post['Collection']['formation_side'].' '.$post['Collection']['offense_front_formation'].' '.$post['Collection']['offense_back_formation']; ?></td>
            <td><?php echo $post['Collection']['play']; ?></td>
            <td><?php echo $post['Collection']['play_side_sw']; ?></td>
            <td><?php echo $post['Collection']['target']; ?></td>
            <td><?php echo $post['Collection']['course']; ?></td>
            <td><?php echo $post['Collection']['gain_yds']; ?></td>
            <td><?php echo $post['Collection']['defense_formation']; ?></td>
            <td><?php echo $post['Collection']['cover']; ?></td>
            <td><?php echo $post['Collection']['check_points']; ?></td>
        </tr>
    <?php endforeach; ?>

    <?php unset($post); ?>
</table>
<?php echo $this->element('pager')?>
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
<?php echo $this->element('searchForm')?>
<?php echo $this->element('pager')?>
<table>
    <tr>
        <th>Delete</th>
        <th>Edit</th>
        <th>Play Number</th>
        <th>Down</th>
        <th>Lest Yards</th>
        <th>Ball On</th>
        <th>Offense Formation</th>
        <th>Play</th>
        <th>Play Side</th>
        <th>Pass Target</th>
        <th>Target Pass Course</th>
        <th>Gain Yards</th>
        <th>Defense Formation</th>
        <th>Cover</th>
        <th>Check Point</th>
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
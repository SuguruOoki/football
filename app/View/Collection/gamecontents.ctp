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
    '戻る',
    array('controller' => 'posts', 'action' => 'index')
); ?>

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
    <?php foreach ($collections as $collection): ?>
        <tr>
            <td><?php
                    echo $this->Html->link(
                        'Delete',
                        array(
                            'action' => 'delete', $collection['Collection']['play_number']
                        )
                    );
                ?></td>
            <!-- 削除用リンク追加 End -->
            <td><?php
                    echo $this->Html->link(
                        'Edit',
                        array(
                            'action' => 'edit', $collection['Collection']['play_number']
                        )
                    );
                ?></td>
            <td><?php echo $collection['Collection']['play_number']; ?></td>
            <td><?php echo $collection['Collection']['down']; ?></td>
            <td><?php echo $collection['Collection']['lest_yds']; ?></td>
            <td><?php echo $post['Collection']['ball_on_jin']; ?><?php echo $collection['Collection']['ball_on']; ?></td>
            <td><?php echo $collection['Collection']['formation_side']; ?> <?php echo $collection['Collection']['offense_front_formation']; ?> <?php echo $collection['Collection']['offense_back_formation']; ?></td>
            <td><?php echo $collection['Collection']['play']; ?></td>
            <td><?php echo $collection['Collection']['play_side_sw']; ?></td>
            <td><?php echo $collection['Collection']['target']; ?></td>
            <td><?php echo $collection['Collection']['course']; ?></td>
            <td><?php echo $collection['Collection']['gain_yds']; ?></td>
            <td><?php echo $collection['Collection']['defense_formation']; ?></td>
            <td><?php echo $collection['Collection']['cover']; ?></td>
            <td><?php echo $collection['Collection']['check_points']; ?></td>
        </tr>
    <?php endforeach; ?>

    <?php unset($collection); ?>
</table>
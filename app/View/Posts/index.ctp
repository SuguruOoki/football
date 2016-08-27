<!-- File: /app/View/Posts/index.ctp -->

<h1>試合分析システムDemo</h1>

<!-- 登録用リンク追加 Start -->
<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>
<!-- 登録用リンク追加 END -->

<table>
    <tr>
        <th>Id</th>
        <th>Game Title</th>
        <!-- 編集用リンク追加 Start -->
        <th>Action</th>
        <!-- 編集用リンク追加 End -->
        <th>Created</th>
        <th>Game Date</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link($post['Post']['title'],
                    array(
                        'controller' => 'posts',
                        'action' => 'view',
                        $post['Post']['id']
                    )
                );
            ?>
        </td>
        <!-- 編集用リンク追加 Start -->
        <td>
            <!-- 削除用リンク追加 Start -->
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array(
                        'action' => 'delete',
                        $post['Post']['id']
                    ),
                    array(
                        'confirm' => 'Are you sure?'
                    )
                );
            ?>
            <!-- 削除用リンク追加 End -->
            <?php
                echo $this->Html->link(
                    'Edit',
                    array(
                        'action' => 'edit',
                        $post['Post']['id']
                    )
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Game Contents',
                    array(
                        'controller'=>'collection',
                        'action' => 'index',
                        $post['Post']['id']
                    )
                );
            ?>

        </td>
        <!-- 編集用リンク追加 End -->
        <td><?php echo $post['Post']['created']; ?></td>
        <td><?php echo $post['Post']['date']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
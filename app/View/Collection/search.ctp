<!-- File: /app/View/Collection/search.ctp -->

<h1>検索</h1>
<?php
    echo $this->Form->create('Search',array('action'=>'index','url'=>'index'));
    echo $this->Form->input('game_id');
    echo $this->Form->end('検索');
?>
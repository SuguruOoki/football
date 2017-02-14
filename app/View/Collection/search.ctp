<!-- File: /app/View/Collection/search.ctp -->

<h1>検索</h1>
<?php
    echo $this->Html->script('jquery');
    echo $this->Html->script('jquery.jqplot');
    echo $this->Html->script('excanvas');
    echo $this->Html->script('plugins/jqplot/jqplot.barRenderer');
    echo $this->Html->script('plugins/jqplot/jqplot.pointLabels');
    echo $this->Html->script('plugins/jqplot/jqplot.highlighter');
    echo $this->Html->script('plugins/jqplot/jqplot.cursor');
    echo $this->Html->script('plugins/jqplot/sample', array('inline' => false));
    echo $this->Form->create('Search',array('action'=>'index','url'=>'index'));
    echo $this->Form->input('game_id');
    echo $this->Form->end('検索');
?>


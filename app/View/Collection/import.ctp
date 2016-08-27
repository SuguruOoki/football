<h3>Import <?php     /**
     * Created by PhpStorm.
     * User: suguruoki
     * Date: 2016/08/07
     * Time: 17:35
     */ echo Inflector::pluralize($modelClass); ?> from CSV data
    file</h3>
<?php
    echo $this->Form->create(
        $modelClass, array('type' => 'file')
    );
    echo $this->Form->input('CsvFile', array('label' => '', 'type' => 'file'));
    echo $this->Form->end('Submit');
?>

<?php echo $this->Html->link(
    'return index',
    array('controller' => 'posts', 'action' => 'index')
); ?>

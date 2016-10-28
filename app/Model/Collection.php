<?php
    /**
     * Created by PhpStorm.
     * User: suguruoki
     * Date: 2016/08/04
     * Time: 17:35
     */
class Collection extends AppModel {
    public $validate = array(
        'quarter' => array(
            'rule' => 'notBlank',
            'message' => '入力必須項目です。',
            'rule' => array('isUnique', array( 'quarter', 'play_number'), false),
            'message' => 'クォーターとプレイナンバーが重複しています。'
        ),
        'play_number' => array(
            'rule' => 'notBlank',
            'message' => '入力必須項目です。',
            'rule' => 'naturalNumber',
            'message' => '自然数で入力してください。',
            'rule' => array('isUnique', array( 'quarter', 'play_number'), false),
            'message' => 'クォーターとプレイナンバーが重複しています。'
        ),
        'down' => array(
            'rule' => 'notBlank'
        ),
        'lest_yds' => array(
            'rule' => 'notBlank'
        ),
        'ball_on_jin' => array(
            'rule' => 'notBlank'
        ),
        'ball_on' => array(
            'rule' => 'notBlank'
        ),
        'formation_side' => array(
            'rule' => 'notBlank'
        ),
        'offense_front_formation' => array(
            'rule' => 'notBlank'
        ),
        'offense_back_formation' => array(
            'rule' => 'notBlank'
        ),
        'play' => array(
            'rule' => 'notBlank'
        ),
        'gain_yds' => array(
            'rule' => 'notBlank'
        ),
        'defense_formation' => array(
            'rule' => 'notBlank'
        ),
        'cover' => array(
            'rule' => 'notBlank'
        )
    );
    public $actsAs = array( 'CsvExport','CsvImport' );

}
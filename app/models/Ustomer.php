<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2015/5/22
 * Time: 15:11
 */
// 情况记录-报价情况、会议进展情况、收款情况
class Ustomer extends \Eloquent {
    protected $table = 'ustomer';

    public $timestamps = false;

    protected $fillable = ['id','tracking_id','type','content','editor_time'];
}
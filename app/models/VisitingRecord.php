<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2015/6/10
 * Time: 18:42
 */
class VisitingRecord extends \Eloquent {
    protected $table = 'visiting_record';

    protected $fillable = ['id','type','setup_id','editor','editor_time'];

    public $timestamps = false;
}
<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2015/6/10
 * Time: 18:42
 */
class VisitingRecord extends \Eloquent {
    protected $table = 'visiting_record';

    protected $fillable = ['id','meeting_id','tracking_id','access_theme','visititng_start_time',
        'visititng_finish_time','visiting_object','account_manager','content','summary','editor','editor_time'];

    public $timestamps = false;
}
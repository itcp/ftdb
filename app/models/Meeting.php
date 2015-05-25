<?php

class Meeting extends \Eloquent {
    protected $table = 'meeting';

    public $timestamps = false;

	protected $fillable = ['id','activity_name','meeting_type',
        'channels','customer_type','customer','salesman','activity_head',
        'the_province','place','activity_start_time','activity_finish_time',
        'scale','meetings_cycle','the_active_state','editor','write_time'];


}
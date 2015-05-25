<?php

//  客户服务需求记录表
class ServiceDescription extends \Eloquent {
    protected $table = 'service_description';

    public $timestamps = false;

    protected $fillable = ['id','meeting_id','service_id','conent','editor_time'];
}
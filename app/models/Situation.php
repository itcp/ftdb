<?php

class Situation extends \Eloquent {

    protected $table = 'situation';

    public $timestamps = false;

    protected $fillable = ['id','tracking_id','type','stat','content','editor_time'];
}
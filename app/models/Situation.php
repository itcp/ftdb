<?php

class Situation extends \Eloquent {

    protected $table = 'customers';

    public $timestamps = false;

    protected $fillable = ['id','tracking_id','type','content','editor_time'];
}
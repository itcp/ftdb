<?php

class Provinces extends \Eloquent {
    protected $table = 'provinces';

    public $timestamps = false;

	protected $fillable = ['province_id','province_name','date_created','date_updated'];
}
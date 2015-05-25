<?php

class Citys extends \Eloquent {
    protected $table = 'citys';

    public $timestamps = false;

    protected $fillable = ['city_id','city_name','province_id'];
}
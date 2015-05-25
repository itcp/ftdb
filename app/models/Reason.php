<?php

use Cartalyst\Sentry\Groups\Eloquent;

class Reason extends \Eloquent {
    protected $table = 'reason';
	protected $fillable = ['id','reason','editor','editor_time'];


    public $timestamps = false;


}
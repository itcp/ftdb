<?php

class Customers extends \Eloquent {
    protected $table = 'customers';

    public $timestamps = false;

	protected $fillable = ['id','company','contact','sex','telephone','phone','email','relationship_between_state','province','city','address','reason','release_time'];
}
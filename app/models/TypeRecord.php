<?php

class TypeRecord extends \Eloquent {
    protected $table = 'type_record';

	protected $fillable = ['id','type','setup_id','editor','editor_time'];

    public $timestamps = false;
}
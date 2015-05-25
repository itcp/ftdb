<?php

class SituationType extends \Eloquent {
    public $timestamps = false;

    protected $table = 'set_type';

    protected $fillable = ['type','editor','editor_time'];
}
<?php

class SetType extends \Eloquent {
    public $timestamps = false;

    protected $table = 'set_type';

    protected $fillable = ['id','type_name','e_type_name','editor'];


}
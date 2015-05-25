<?php

class CustomerTracking extends \Eloquent {
    protected $table = 'customer_tracking';

    public $timestamps = false;
	protected $fillable = ['id','customer_name','customer_manager','merchandiser'
    ,'contract_price','offer_not_accepted','visit','refusal_reason','editor','editor_time'];
}
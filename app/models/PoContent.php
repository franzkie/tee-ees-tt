<?php

class PoContent extends Eloquent {
	public $timestamps = false ;
	protected $table = 'tblPoContent';

 public function item() {
        return $this->belongsTo('Purchase_order');
    }



}

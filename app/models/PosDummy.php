<?php

class PosDummy extends Eloquent {
	protected $guarded = array();
	protected $table = 'tblPosDummy';

	public static $rules = array();

	/*public function getExpiryAttribute($v)
    {
        return gmdate("M-d-Y H:i:s A", $v);
    }*/

	
}

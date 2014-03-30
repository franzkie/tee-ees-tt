<?php

class Member extends Eloquent {
	protected $guarded = array();
	protected $table = 'tblMember';

	public static $rules = array();
}

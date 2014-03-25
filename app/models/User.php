<?php

use Zizaco\Confide\ConfideUser;

class User extends ConfideUser {

	protected $table = 'users';
	protected $softDelete = true;
	protected $fillable = array('username','email');


}
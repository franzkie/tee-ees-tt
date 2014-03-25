<?php

class ItemList extends Eloquent {
	public $timestamps = false ;
	protected $table = 'tblItemList';
	protected $fillable = array('itemName','inStockQuantity','id','description');
}

<?php

class Purchase_order extends Eloquent {
	protected $guarded = array();
	public static $rules = array();
	protected $table = 'tblPurchaseOrder';
	protected $fillable = array('supplierId','created_at','updated_at');


	public function items()
    {
        return $this->hasMany('PoContent','poNumber');
    }

    public function supplier()
    {
    	//return $this->belongsTo('Supplier');
    	return $this->belongsTo('Supplier','supplierId');
    }

}

<?php

class Supplier extends Eloquent {
	public $timestamps = false ;
	protected $table = 'tblSupplier';
	protected $fillable = array('firstName','middleName','lastName', 'email', 'phone', 'company', 'addressStreet', 'addressCity', 'addressProvince', 'addressPostalCode', 'notes');

	

	public function purchaseOrders()
    {
        return $this->hasMany('Purchase_order','supplierId')->orderBy('updated_at','desc');
    }

    //  public static function supplierstbl()
    // {
    // 	return static::paginate(6);
    //     //return static::where('status','=',null)->paginate(5);
    // }

}

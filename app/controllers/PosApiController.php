<?php

class PosApiController extends \BaseController {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function get_items()
  {
    $hasFilter = false;
    $filter_arr = array();
    $take = 10;
    $skip = 0;
    if(isset($_GET['mySortOrder']))
    $decoded = json_decode($_GET['mySortOrder'],true);
    if(isset($_GET['filter']['name'])) {
      $filterText = $_GET['filter']['name'];
      $filter_arr = array('code','category','name','price','qty','description');
      $hasFilter = true;
    }
    if(isset($_GET['count'])) {
      $take = $_GET['count'];
    }
    if(isset($_GET['page'])) {
      $skip = ($_GET['page']-1)*$_GET['count'];
    }
    

    //print_r($decoded);die();

    $time = new DateTime();
    $timeStamp = date_timestamp_get($time);
    $x = 0;
         for(;$x<10000000;$x++) {
          ;
         }
         $arr = DB::table('tblposdummy');
         $total = $arr->count();
         //print_r($decoded);
         if($hasFilter) {
          $arr->where($filter_arr[0],"like","%".$filterText."%");
          foreach($filter_arr as $f) {
            if($f == $filter_arr[0])
              continue;
            $arr->orWhere($f,"like","%".$filterText."%");
          }
         }
         foreach ($decoded as $index => $kvPair) {
          if($kvPair['name'] != '' && $kvPair['value'] != '')
            $arr->orderBy($kvPair['name'],$kvPair['value']);
         }
         $arr2 = $arr->skip($skip)->take($take)->get();

         //$arr = PosDummy::all()->toArray();

  //echo json_encode(json_decode($arr,true));

         
//print_r(array('total'=>$total,'data'=>$arr2));die();
         $arr2[] = (object) array('total'=>$total);
  return Response::json($arr2);
  }

}
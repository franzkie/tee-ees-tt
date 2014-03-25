<?php

HTML::macro('flash', function()
{
    $message    = Session::get('message');
    $status 	= Session::get('status');
    $type       = Session::get('type');
    $id 		= Session::get('id'); 	
   return ($message) ? '<div class="alert alert-'.$status.'"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a><p>'.$message.' <b>'.$type.' '.$id.'</b></p></div>':'';
 });
?>

<?php
HTML::macro('flash', function()
{
    $message_status = Session::get('status');
    $message        = Session::get('message');
    $type 			= Session::get('type');


   //  <div class="alert alert-success">
   //    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
   //     <p>{{ Session::get('message') }} {{ Session::get('type') }}</p>
   // </div>


    return ($message_status && $message) ? '<div class="alert alert-'.$message_status.'"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a><p>'$message.' '.$type.'</p></div>':'';
    // return ($message && $message_status) ? '<div class="flash flash-' . $message_status . '">' . $message . '</div>' : '';
});
?>
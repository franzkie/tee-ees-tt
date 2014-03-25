@extends('master')



@section('content')
 <aside class="right-side"><section class="content">
 	
 	<div id="message-container">
	
</div>
 	

 	<ol class="breadcrumb">
   
    <li><a href="/inventory/itemlists/">Item List</a></li>
   
  </ol>
 	
 	
 </section>
</aside>


@stop


@section('js_script')

	<script type="text/javascript">

	function modal(){
    $("#modalAdd").modal();
    //$('#select2-drop').toggle();                  
}


	</script>

@stop
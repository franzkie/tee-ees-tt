<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="ModalLabel">Add New Item</h4>
      </div>
      <div class="modal-body">
         {{ Form::open(array('route' => 'itemlist.create',
    'method' => 'post','id'=>'productAddItem','class'=>'form-horizontal', 'autocomplete'=>'on')) }}
        <div class="msg"><p></p></div> 
  
            <div class="form-group">
              
              <div class="col-xs-12">
              {{ Form::text('itemName', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Item Name', 'required',
              'id'=>'itemName'
              )) }}
              </div>

            </div>

            <div class="form-group">
              <div class="col-xs-12">
              {{ Form::text('itemPrice', null, array(
              'class' => 'form-control', 
              'placeholder'=>'Item Price', 'required',
              'id'=>'itemPrice'
              )) }}
              </div>

            </div>


              <div class="form-group">
                <div class="col-xs-12">
                  {{Form::textarea('itemDescription', null, array(
                  'class'=>'form-control',
                  'placeholder'=>'Item Description',
                  'id'=>'itemDescription'))}}
                </div>
              </div>

              <input type="hidden" name="rowId" id="rowId">
              </div>
            
      <div class="modal-footer">
        {{ Form::token(); }} 
        <button type="submit" class="btn btn-primary">Add Item</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {{ Form::close() }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script type="text/javascript">
  $(document).ready(function(){
  $(document).on("submit", "#productAddItem", productAddItem); 
   
  $('#modalAdd').on('shown.bs.modal', function () {

    var rowId = $('.select2-container-active.select2-dropdown-open').next().next("input.rowId").val(); 
    
    console.log(rowId); 

    var textBoxVal = $("#select2-drop").find("input.select2-input").val();

    $("#select2-drop-mask").click();
    $('input#itemName').focus();  
    $('input#itemName').val(textBoxVal);
    $('input#itemPrice').val('');
    $('input#rowId').val(rowId);
    $('textarea#itemDescription').val('');

    })
  });

</script>



{{ HTML::script('js/original/productAddItem.js') }}
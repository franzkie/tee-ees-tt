@extends('master')

@section('content')
<aside class="right-side">

<div class="content">
  <div class="row">
  
    <section class="col-lg-3 connectedSortable ui-sortable">
      <div class="box box-sucess">
      <div class="box-header"><h1 class='box-title'>Information</h1></div>
      <div class="box-body">
       <div class="row">
                      
                      <div class="col-sm-12">
                       {{ HTML::image('img/avatar2.png', 'Smile', array('id' => 'smile')) }}
                      </div>
                       <div class="col-sm-12">
                       <h4>General Information</h4>
                             <ul class="profile-details">
                      <li>
                        <div><i class="fa fa-briefcase"></i> position
                        <a href="#" class="edit-button">
                          <i class="fa fa-pencil-square-o "> </i>
                        </a>
                        </div>
                        Manager
                      </li>
                      <li>
                        <div><i class="fa fa-building-o"></i> company 
                        <a href="#" class="edit-button">
                          <i class="fa fa-pencil-square-o "> </i>
                        </a>
                        </div>
                        Bupharco
                      </li>
                    </ul>
<h4>Contact Information</h4>
<ul class="profile-details">
                <li>
                  <div><i class="fa fa-phone"></i> phone
                    <a href="#" class="edit-button">
                          <i class="fa fa-pencil-square-o "> </i>
                        </a>
                  </div>
                  +48 123 456 789
                </li>
                <li>
                  <div><i class="fa fa-tablet"></i> mobile 
                    <a href="#" class="edit-button">
                          <i class="fa fa-pencil-square-o "> </i>
                        </a>
                  </div>
                  +48 123 456 789
                </li>
                <li>
                  <div><i class="fa fa-envelope"></i> e-mail
                    
                  </div>
                  lukasz@bootstrapmaster.com
                </li>
                <li>
                  <div><i class="fa fa-map-marker"></i> address
                    <a href="#" class="edit-button">
                      <i class="fa fa-pencil-square-o "> </i>
                    </a>
                  </div>
                  Konopnickiej 42<br>
                  43-190 Mikolow<br>
                  Slask, Poland
                </li>
              </ul>

                      </div>
       </div>
          
        </div>
      </div>
    </section>

    <section class="col-lg-9 connectedSortable ui-sortable">
      <div class="box box-danger">
      <div class="box-header"><h1 class='box-title'>Account Information</h1></div>
      <div class="box-body">
       <div class="row">      
           <div class="col-sm-12">
              <table style="clear: both" class="table table-bordered table-striped" id="user">
                        <tbody> 
                           
                            <tr>         
                                <td>Username</td>
                                <td class="col-sm-12">
                                
                                  <p id="username" class="col-xs-8">{{$user->username}}</p> 
                                  <div class="col-xs-1"></div>
                                  <a href="#" class="edit-btn col-xs-3">
                                    <i class="fa fa-pencil-square-o "> Edit </i>
                                  </a></td>
                            </tr>

                            <tr>         
                                <td>email</td>
                                <td class="col-sm-12">
                                   
                                  <p id="email" class="col-xs-8">{{$user->email}}</p> 
                                  <div class="col-xs-1"></div>  
                                  <a href="#"   class="edit-btn col-xs-3">
                                    <i class="fa fa-pencil-square-o "> Edit </i>
                                  </a></td>
                            </tr>    

                            <tr>         
                                <td>User Type</td>
                                <td class="col-sm-12">
                                
                                  <p id="usertype" class="col-xs-9 dropdown">{{$user->userType}}</p> 

                               
                                  <div class="col-xs-1"></div>  
                                  <a href="#" class="edit-btn col-xs-3">
                                    <i class="fa fa-pencil-square-o "> Edit </i>
                                  </a></td>
                            </tr> 


                            

                        </tbody>
                    </table>

           </div>
       </div>

          
        </div>

      </div>


    </section>

    <section class="col-lg-9 connectedSortable ui-sortable">
      <div class="box box-danger">
        <div class="box-header"><h1 class='box-title'>Account Information</h1></div>
        <div class="box-body">
          
            <button id="delete-user" class="btn btn-danger"><i class="fa fa-bug"></i> Delete This user</button>
     
        </div>
      </div>
      
    </section>



  </div>
</div>




</aside>
<script type="text/javascript">
  var myvar = <?php echo json_encode($user->id); ?>;
 $(document).on("click", "#delete-user", function(){
  var r=confirm("Are you Sure you want to delete this user?");
  if (r==true)
  {
      $.ajax({
      type: 'post',
      url: '/humanresource/manageusers/'+myvar+'/delete',
      success: function(data){
        if(data.success)
        {
          window.location = "/humanresource/manageusers";
        }
      
      }
    });
  }
else
  {
  x="You pressed Cancel!";
  } 
 }); 
</script>
@stop


@section('js_script')
{{ HTML::script('js/original/manageuser/edit.js') }}
@stop
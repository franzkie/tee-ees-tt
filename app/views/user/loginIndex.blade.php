
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/vendors/home-bootstrap.css') }}
    {{ HTML::style('css/original/style.css') }}
     <!--Custom CSS-->
    {{ HTML::style('css/vendors/logo-nav.css') }}
    {{ HTML::style('font-awesome/css/font-awesome.min.css') }}
     
    
    <link rel="shortcut icon" href="/../img/favicon.ico">
   
  
  <title>Bupharco-ERMS</title>
  </head>

  <body>
 
    <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
         <a class="navbar-brand logo-nav" href="/"><h3 class="navbar-nav">BUPHARCO-ERMS</h3></a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse ">
          <ul class="nav navbar-nav navbar-right ">
            <li class="active"><a href="/login">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="{{{ (Confide::checkAction('UserController@create')) ?: 'user/create' }}}">Register</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
         
    <div class="section">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                      
                      <div class="jumbotron-tr ">
                      <h2>Welcome to BUPHARCO-ERMS!</h2>
                      <p>Bupharco-Enterprise Resource Management System is Created by <dfn><a href="/">framel Developers</a></dfn>.</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.</p>

                      <a href="/" class="btn btn-success">Learn more &raquo;</a>
                      </div>
                  </div>
                  <div class="jumbotron-tr col-lg-offset-2 col-lg-4"> 
                  <h2>User Login</h2>
                       <form method="POST" action="{{{ Confide::checkAction('UserController@do_login') ?: URL::to('/user/login') }}}" accept-charset="UTF-8">
                          <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                          <fieldset>
                              <div class="form-group">
                              <!--    <label for="email">{{{ Lang::get('confide::confide.username_e_mail') }}}</label> -->
                                  <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                  <input  class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}" required autofocus>
                                  </div>
                              </div>
                              <div class="form-group">
                              <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                              <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password" required >
                              </div>
                              <label for="password">
                               <!--   {{{ Lang::get('confide::confide.password') }}}  -->
                                  <small>
                                      <a href="{{{ (Confide::checkAction('UserController@forgot_password')) ?: 'forgot' }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
                                  </small>
                              </label>
                              </div>
                           <!--   <div class="form-group">
                                  <label for="remember">
                                      <input type="hidden" name="remember" value="0">
                                      <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                                      {{{ Lang::get('confide::confide.login.remember') }}}
                                  </label>
                              </div>
                            -->
                          
                              @if ( Session::get('error') )
                                 <div class="alert alert-info"> {{{ Session::get('error') }}}  </div>
                              @endif

                              @if ( Session::get('notice') )
                                 <div class="alert alert-info"> {{{ Session::get('notice') }}}  </div>
                              @endif
                         
                              <div class="form-group">
                                  <button tabindex="3" type="submit" class="btn btn-lg btn-primary btn-block">{{{ Lang::get('confide::confide.login.submit') }}}</button>
                              </div>
                          </fieldset>
                      </form>

                  </div>
                </div>
              </div>
          </div> <!-- /form container -->
        </div><!-- /.container -->
       
    </div>

      
         <footer class="container">
            <hr/>
            <p>&copy; 2013 Bukidnon Pharmaceutical Multi-purpose Cooperative.</p>
            <p>Powered By <dfn><a href="/">framel Developers</a></dfn></p>
            <p>&middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
          </footer>

 
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Make sure to add jQuery - download the most recent version at http://jquery.com/ -->
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap.js') }}  
  </body>
</html>


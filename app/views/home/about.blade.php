
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
    {{ HTML::style('css/vendors/home.css') }}
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
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right ">
            <li><a href="/login">Home</a></li>
            <li class="active"><a href="/about">About</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="{{{ (Confide::checkAction('UserController@create')) ?: 'user/create' }}}">Register</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
         
        <div class="container">

      <div class="row">

        <div class="col-lg-12">
          <h1 class="page-header">About <small>It's Nice to Meet You!</small></h1>
          <ol class="breadcrumb">
            <li><a href="/login">Home</a></li>
            <li class="active">About</li>
          </ol>
        </div>

      </div>

      <div class="row">

        <div class="col-md-6">
          <img class="img-responsive" src="http://placehold.it/750x450">
        </div>
        <div class="col-md-6">
          <h2>Welcome to BUPHARCO-ERMS</h2>
          <p>This is a great place to introduce your company or project and describe what you do. This about page features general company information, employee bios, and other helpful elements.</p>
          <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
        </div>

      </div>

      <!-- Team Member Profiles -->

      <div class="row">

        <div class="col-lg-12">
          <h2 class="page-header">Our Team</h2>
        </div>

        <div class="col-sm-4">
          <img class="img-responsive" src="http://placehold.it/750x450">
            <h3>John Smith <small>Job Title</small></h3>
            <p>What does this team member do? Keep it short! This is also a great spot for social links!</p>
            <ul class="list-unstyled list-inline list-social-icons">
              <li class="tooltip-social facebook-link"><a href="#facebook-profile" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
              <li class="tooltip-social linkedin-link"><a href="#linkedin-profile" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
              <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
              <li class="tooltip-social google-plus-link"><a href="#google-plus-profile" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
            </ul>
        </div>

        <div class="col-sm-4">
          <img class="img-responsive" src="http://placehold.it/750x450">
            <h3>John Smith <small>Job Title</small></h3>
            <p>What does this team member do? Keep it short! This is also a great spot for social links!</p>
            <ul class="list-unstyled list-inline list-social-icons">
              <li class="tooltip-social facebook-link"><a href="#facebook-profile" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
              <li class="tooltip-social linkedin-link"><a href="#linkedin-profile" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
              <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
              <li class="tooltip-social google-plus-link"><a href="#google-plus-profile" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
            </ul>
        </div>

        <div class="col-sm-4">
          <img class="img-responsive" src="http://placehold.it/750x450">
            <h3>John Smith <small>Job Title</small></h3>
            <p>What does this team member do? Keep it short! This is also a great spot for social links!</p>
            <ul class="list-unstyled list-inline list-social-icons">
              <li class="tooltip-social facebook-link"><a href="#facebook-profile" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
              <li class="tooltip-social linkedin-link"><a href="#linkedin-profile" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
              <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
              <li class="tooltip-social google-plus-link"><a href="#google-plus-profile" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
            </ul>
        </div>

        <div class="col-sm-4">
          <img class="img-responsive" src="http://placehold.it/750x450">
            <h3>John Smith <small>Job Title</small></h3>
            <p>What does this team member do? Keep it short! This is also a great spot for social links!</p>
            <ul class="list-unstyled list-inline list-social-icons">
              <li class="tooltip-social facebook-link"><a href="#facebook-profile" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
              <li class="tooltip-social linkedin-link"><a href="#linkedin-profile" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
              <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
              <li class="tooltip-social google-plus-link"><a href="#google-plus-profile" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
            </ul>
        </div>

        <div class="col-sm-4">
          <img class="img-responsive" src="http://placehold.it/750x450">
            <h3>John Smith <small>Job Title</small></h3>
            <p>What does this team member do? Keep it short! This is also a great spot for social links!</p>
            <ul class="list-unstyled list-inline list-social-icons">
              <li class="tooltip-social facebook-link"><a href="#facebook-profile" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
              <li class="tooltip-social linkedin-link"><a href="#linkedin-profile" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
              <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
              <li class="tooltip-social google-plus-link"><a href="#google-plus-profile" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
            </ul>
        </div>

        <div class="col-sm-4">
          <img class="img-responsive" src="http://placehold.it/750x450">
            <h3>John Smith <small>Job Title</small></h3>
            <p>What does this team member do? Keep it short! This is also a great spot for social links!</p>
            <ul class="list-unstyled list-inline list-social-icons">
              <li class="tooltip-social facebook-link"><a href="#facebook-profile" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
              <li class="tooltip-social linkedin-link"><a href="#linkedin-profile" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
              <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
              <li class="tooltip-social google-plus-link"><a href="#google-plus-profile" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
            </ul>
        </div>

      </div>

      <!-- Our Customers -->

      <div class="row">

        <div class="col-lg-12">
          <h2 class="page-header">Our Customers</h2>
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <img class="img-responsive img-customer" src="http://placehold.it/500x300">
        </div>

      </div>

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


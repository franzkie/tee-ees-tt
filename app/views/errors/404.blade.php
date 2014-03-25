
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
 
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
            <div class="col-lg-12">
          

              <div class="row">

                <div class="col-lg-12">
                  <h1 class="page-header">404<small>Page Not Found</small></h1>
                  <ol class="breadcrumb">
                    <li><a href="/login">Home</a></li>
                    <li class="active">404</li>
                  </ol>
                </div>

              </div>

              <div class="row">

                <div class="col-lg-12">
                  <div class="col-lg-6">
                    <img src="/../img/404.jpg"  height="100%" width="100%">
                  </div>
                  <div class="col-lg-6">
                  <p class="lead">The page you're looking for could not be found.</p>
                  <p>Here are some helpful links to help you find what you're looking for:</p>
                  <ul>
                    <li><a href="/login">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="{{{ (Confide::checkAction('UserController@create')) ?: 'user/create' }}}">Register</a></li>
                  </ul>
                  </div>
                  
                </div>

              </div>

            </div><!-- /.container -->

            
        </div>
        <!-- /.container -->
       
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


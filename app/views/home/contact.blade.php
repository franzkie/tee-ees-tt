
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
            <li class="active"><a href="/contact">Contact</a></li>
            <li><a href="{{{ (Confide::checkAction('UserController@create')) ?: 'user/create' }}}">Register</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
         
    <div class="container">
      
      <div class="row">
      
        <div class="col-lg-12">
          <h1 class="page-header">Contact <small>We'd Love to Hear From You!</small></h1>
          <ol class="breadcrumb">
            <li><a href="/login">Home</a></li>
            <li class="active">Contact</li>
          </ol>
        </div>
        
        <div class="col-lg-12">
          <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
        <!-- <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe> 
         <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.google.com/mapmaker?ll=7.992976,124.133508&amp;spn=5.263909,9.382324&amp;z=7&amp;lyt=large_map_v3&amp;htll=7.912416,125.092623&amp;hyaw=123.13481381747876&amp;output=embed"></iframe> -->
         <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=7.912491,125.092969&amp;spn=0.001554,0.002642&amp;t=m&amp;z=19&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=7.912491,125.092969&amp;spn=0.001554,0.002642&amp;t=m&amp;z=19&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
        </div>

      </div><!-- /.row -->
      
      <div class="row">

        <div class="col-sm-8">
          <h3>Let's Get In Touch!</h3>
          <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
      <?php  

                // check for a successful form post  
                if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
          
                // check for a form error  
                elseif (isset($_GET['e'])) echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";  

      ?>
            <form role="form" method="POST" action="contact-form-submission.php">
              <div class="row">
                <div class="form-group col-lg-4">
                  <label for="input1">Name</label>
                  <input type="text" name="contact_name" class="form-control" id="input1">
                </div>
                <div class="form-group col-lg-4">
                  <label for="input2">Email Address</label>
                  <input type="email" name="contact_email" class="form-control" id="input2">
                </div>
                <div class="form-group col-lg-4">
                  <label for="input3">Phone Number</label>
                  <input type="phone" name="contact_phone" class="form-control" id="input3">
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-lg-12">
                  <label for="input4">Message</label>
                  <textarea name="contact_message" class="form-control" rows="6" id="input4"></textarea>
                </div>
                <div class="form-group col-lg-12">
                  <input type="hidden" name="save" value="contact">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
        </div>

        <div class="col-sm-4">
          <h3>BUPHARCO</h3>
          <h4>A Cooperative</h4>
          <p>
            Sayre Highway, Valencia City<br>
            Bukidnon, 8709<br>
          </p>
          <p><i class="fa fa-phone"></i> <abbr title="Phone">P</abbr>: (555) 984-3600</p>
          <p><i class="fa fa-envelope-o"></i> <abbr title="Email">E</abbr>: <a href="mailto:bupharco.coop@gmail.com">bupharco.coop@gmail.com</a></p>
          <p><i class="fa fa-clock-o"></i> <abbr title="Hours">H</abbr>: Monday - Friday: 8:00 AM to 5:00 PM</p>
          <ul class="list-unstyled list-inline list-social-icons">
            <li class="tooltip-social facebook-link"><a href="#facebook-page" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
            <li class="tooltip-social linkedin-link"><a href="#linkedin-company-page" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
            <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
            <li class="tooltip-social google-plus-link"><a href="#google-plus-page" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
          </ul>
        </div>

      </div><!-- /.row -->

    </div><!-- /.container -->

      
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


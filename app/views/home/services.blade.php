
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
            <li class="active"><a href="/services">Services</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="{{{ (Confide::checkAction('UserController@create')) ?: 'user/create' }}}">Register</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
         
        <div class="container">
      
      <div class="row">
      
        <div class="col-lg-12">
          <h1 class="page-header">Services <small>What We Do</small></h1>
          <ol class="breadcrumb">
            <li><a href="/login">Home</a></li>
            <li class="active">Services</li>
          </ol>
        </div>

      </div><!-- /.row -->

      <div class="row">
      
        <div class="col-lg-12">
          <img class="img-responsive" src="http://placehold.it/1200x300">
        </div>

      </div><!-- /.row -->

      <!-- Service Paragraphs -->

      <div class="row">

        <div class="col-md-8">
          <h2 class="page-header">Our Premium Services</h2>
            <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        </div>

        <div class="col-md-4">
          <h2 class="page-header">Something More</h2>
            <p>Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p>
            <a class="btn btn-primary" href="#">Click Me!</a>
        </div>

      </div><!-- /.row -->

      <!-- Service Tabs -->

      <div class="row">

        <div class="col-lg-12">
          <h2 class="page-header">Tabbed Services</h2>
          <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#service-one" data-toggle="tab">Service One</a></li>
            <li><a href="#service-two" data-toggle="tab">Service Two</a></li>
            <li><a href="#service-three" data-toggle="tab">Service Three</a></li>
            <li><a href="#service-four" data-toggle="tab">Service Four</a></li>
            <li><a href="#service-five" data-toggle="tab">Service Five</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="service-one">
              <i class="fa fa-gear pull-left fa-4x"></i>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam placerat nunc ut tellus tristique, non posuere neque iaculis. Fusce aliquet dui ut felis rhoncus, vitae molestie mauris auctor. Donec pellentesque feugiat leo a adipiscing. Pellentesque quis tristique eros, sed rutrum mauris.</p>
              <p>Nam fringilla quis enim in eleifend. Suspendisse sed lectus mauris. Nam commodo, arcu et posuere placerat, tellus tortor dignissim eros, sit amet eleifend urna lorem sit amet nulla. Praesent sem nibh, vulputate nec congue eu, dapibus vitae augue. Suspendisse cursus urna sit amet metus porttitor, in pharetra quam feugiat. Etiam tempus euismod nulla eget pellentesque.</p>
            </div>
            <div class="tab-pane fade" id="service-two">
              <i class="fa fa-gears pull-left fa-4x"></i>
              <p>Nam fringilla quis enim in eleifend. Suspendisse sed lectus mauris. Nam commodo, arcu et posuere placerat, tellus tortor dignissim eros, sit amet eleifend urna lorem sit amet nulla. Praesent sem nibh, vulputate nec congue eu, dapibus vitae augue. Suspendisse cursus urna sit amet metus porttitor, in pharetra quam feugiat. Etiam tempus euismod nulla eget pellentesque.</p>
              <p>Vestibulum laoreet molestie urna ac vehicula. Phasellus laoreet semper ipsum ac gravida. Sed in varius tortor. Nullam blandit in neque quis aliquet. Fusce volutpat pellentesque sem non convallis. Suspendisse sit amet magna pulvinar, gravida mauris eu, tincidunt massa. Nam lectus mi, viverra non quam nec, mollis malesuada dolor. Vivamus hendrerit nunc interdum turpis egestas, a lobortis odio consequat. Fusce posuere purus quis ligula faucibus lacinia. Curabitur sit amet congue dolor. Duis dapibus hendrerit nunc et gravida. Phasellus mollis, lectus quis ornare aliquam, arcu orci posuere lectus, vehicula bibendum sem ante quis lacus.</p>
            </div>
            <div class="tab-pane fade" id="service-three">
              <i class="fa fa-magic pull-left fa-4x"></i>
              <p>Vestibulum laoreet molestie urna ac vehicula. Phasellus laoreet semper ipsum ac gravida. Sed in varius tortor. Nullam blandit in neque quis aliquet. Fusce volutpat pellentesque sem non convallis. Suspendisse sit amet magna pulvinar, gravida mauris eu, tincidunt massa. Nam lectus mi, viverra non quam nec, mollis malesuada dolor. Vivamus hendrerit nunc interdum turpis egestas, a lobortis odio consequat. Fusce posuere purus quis ligula faucibus lacinia. Curabitur sit amet congue dolor. Duis dapibus hendrerit nunc et gravida. Phasellus mollis, lectus quis ornare aliquam, arcu orci posuere lectus, vehicula bibendum sem ante quis lacus.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam placerat nunc ut tellus tristique, non posuere neque iaculis. Fusce aliquet dui ut felis rhoncus, vitae molestie mauris auctor. Donec pellentesque feugiat leo a adipiscing. Pellentesque quis tristique eros, sed rutrum mauris.</p>
            </div>
            <div class="tab-pane fade" id="service-four">
              <i class="fa fa-flask pull-left fa-4x"></i>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam placerat nunc ut tellus tristique, non posuere neque iaculis. Fusce aliquet dui ut felis rhoncus, vitae molestie mauris auctor. Donec pellentesque feugiat leo a adipiscing. Pellentesque quis tristique eros, sed rutrum mauris.</p>
              <p>Nam fringilla quis enim in eleifend. Suspendisse sed lectus mauris. Nam commodo, arcu et posuere placerat, tellus tortor dignissim eros, sit amet eleifend urna lorem sit amet nulla. Praesent sem nibh, vulputate nec congue eu, dapibus vitae augue. Suspendisse cursus urna sit amet metus porttitor, in pharetra quam feugiat. Etiam tempus euismod nulla eget pellentesque.</p>
            </div>
            <div class="tab-pane fade" id="service-five">
              <i class="fa fa-flag pull-left fa-4x"></i>
              <p>Nam fringilla quis enim in eleifend. Suspendisse sed lectus mauris. Nam commodo, arcu et posuere placerat, tellus tortor dignissim eros, sit amet eleifend urna lorem sit amet nulla. Praesent sem nibh, vulputate nec congue eu, dapibus vitae augue. Suspendisse cursus urna sit amet metus porttitor, in pharetra quam feugiat. Etiam tempus euismod nulla eget pellentesque.</p>
              <p>Vestibulum laoreet molestie urna ac vehicula. Phasellus laoreet semper ipsum ac gravida. Sed in varius tortor. Nullam blandit in neque quis aliquet. Fusce volutpat pellentesque sem non convallis. Suspendisse sit amet magna pulvinar, gravida mauris eu, tincidunt massa. Nam lectus mi, viverra non quam nec, mollis malesuada dolor. Vivamus hendrerit nunc interdum turpis egestas, a lobortis odio consequat. Fusce posuere purus quis ligula faucibus lacinia. Curabitur sit amet congue dolor. Duis dapibus hendrerit nunc et gravida. Phasellus mollis, lectus quis ornare aliquam, arcu orci posuere lectus, vehicula bibendum sem ante quis lacus.</p>
            </div>
          </div>
        </div>

      </div><!-- /.row -->

      <!-- Service Images -->

      <div class="row">

        <div class="col-lg-12">
          <h2 class="page-header">Service Images</h2>
        </div>

        <div class="col-sm-4">
          <img class="img-responsive" src="http://placehold.it/750x450">
          <h3>Service One</h3>
          <p>Service one description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst.</p>
          <a class="btn btn-link btn-sm pull-right">More <i class="fa fa-angle-right"></i></a>
        </div>

        <div class="col-sm-4">
          <img class="img-responsive" src="http://placehold.it/750x450">
          <h3>Service Two</h3>
          <p>Service two description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst.</p>
          <a class="btn btn-link btn-sm pull-right">More <i class="fa fa-angle-right"></i></a>
        </div>

        <div class="col-sm-4">
          <img class="img-responsive" src="http://placehold.it/750x450">
          <h3>Service Three</h3>
          <p>Service three description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum dignissim. In hac habitasse platea dictumst.</p>
          <a class="btn btn-link btn-sm pull-right">More <i class="fa fa-angle-right"></i></a>
        </div>

      </div><!-- /.row -->

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


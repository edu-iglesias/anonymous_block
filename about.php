<!DOCTYPE html>
<?php
include('dbconnect.php');
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Everlasting sew-n-wearhaus</title>
<link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">
	<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
                <a class="navbar-brand" href="index.php">Everlasting sew-n-wearhaus</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="about.php">About</a>
                    </li>
                    <li class="dropdown">
                        <a href="productgallery.php" class="dropdown-toggle" data-toggle="dropdown">Product Gallery <b class="caret"></b></a>
                        <ul class="dropdown-menu">
						<?php 
							$querryy = mysql_query("SELECT * FROM  category");
						while($rowes = mysql_fetch_assoc($querryy))
						{	
							
							
						?>
                            <li><a href="product.php?id=<?php echo $rowes["category_id"]; ?>" ><?php echo $rowes["category"]; ?></a>
                            </li>
                          
							<?php } ?>
                        </ul>
                    </li>
					<li class="dropdown">
                        <a href="login.php" >Login </a>
                        
                    </li>
                </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>It's Nice to Meet You!</small>
                </h1>
               
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <img class="img-responsive" src="slide/logo1.png">
            </div>
            <div class="col-md-6">
                <?php
				$myLogin = mysql_query("SELECT * FROM about_us");
		
				while($query = mysql_fetch_assoc($myLogin))
				{
					$about=$query['content'];
				}
				echo $about;
				?>
            </div>

        </div>

        <!-- Team Member Profiles -->

       <div class="row">
        <div class="col-lg-12">
          <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
		  <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=fil&amp;geocode=&amp;q=+mapayapa+village+2,+holy+spirit,+qc&amp;aq=&amp;sll=14.662814,121.062298&amp;sspn=0.102798,0.169086&amp;ie=UTF8&amp;hq=mapayapa+village+2,&amp;hnear=Holy+Spirit,+Quezon+City,+Metro+Manila,+Pilipinas&amp;ll=14.687288,121.07149&amp;spn=0.006295,0.011033&amp;t=m&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=fil&amp;geocode=&amp;q=+mapayapa+village+2,+holy+spirit,+qc&amp;aq=&amp;sll=14.662814,121.062298&amp;sspn=0.102798,0.169086&amp;ie=UTF8&amp;hq=mapayapa+village+2,&amp;hnear=Holy+Spirit,+Quezon+City,+Metro+Manila,+Pilipinas&amp;ll=14.687288,121.07149&amp;spn=0.006295,0.011033&amp;t=m" style="color:#0000FF;text-align:left">View Larger Map</a></small>
          
        </div>

      </div><!-- /.row -->
      
      <div class="row">

        <div class="col-sm-8">
          <h3>Let's Get In Touch!</h3>
          <p>Please register for your inquiry.  We will get back to you as soon as we can.  Please call us on the numbers provided should you have any further questions.</p>
			
            
		</div>
        <div class="col-sm-4">
          <h3>Everlasting sew-n-wearhaus</h3>
          <p>
		  
		    holy spirit, qc
            everlasting Street <br>
            mapayapa village 2 <br>
			holy spirit, qc <br>
		
          </p>
          <p><i class="fa fa-phone"></i> <abbr title="Phone">P</abbr>: 0917 8807676</p>
		  <p><i class="fa fa-phone"></i> <abbr title="Phone">P</abbr>: 0917 8164747</p>
          <p><i class="fa fa-clock-o"></i> <abbr title="Hours">H</abbr>: Monday - Saturday: 9:00 AM to 6:00 PM</p>
          <ul class="list-unstyled list-inline list-social-icons">
            <li class="tooltip-social facebook-link"><a href="#facebook-page" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
            <li class="tooltip-social linkedin-link"><a href="#linkedin-company-page" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
            <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
            <li class="tooltip-social google-plus-link"><a href="#google-plus-page" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
          </ul>
        </div>

     

    <div class="container">

      <hr>

      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; Company 2013</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

</body>

</html>

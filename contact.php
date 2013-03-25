<?php
    $thankyou='';
    if(isset($_POST['submit'])){
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $admin_mail = 'testdata987@gmail.com';
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $message=$_POST['message'];
        $user_content = '';
	$user_content .='<div style="border:solid 2px #ccc; width:550px; margin:auto;"><div style="width:550px; height:100px; background-image:url(http://www.nerdzor.com/sonora/img/body_bg2.jpg)"><img src="http://www.nerdzor.com/sonora/img/sonora_logo.png" /></div>';
        $user_content .= '<div><p style="color:#9099A3; font-size:14px; padding-left:10%">Dear '.$name.',</p><p style="color:#9099A3; font-size:14px; padding-left:20%">Name: '.$name.'<br/><br/>Email: '.$email.'<br/><br/>Message: '.$message.'</p>';
        if($phone){
            $user_content .= '<p style="color:#9099A3; font-size:14px;padding-left:20%">Phone no.: '. $phone.'</p>';
        }
	$user_content .= '<p style="color:#9099A3; font-size:14px; padding-left:10%">Thankyou for contacting Sonora Sprinkler.We will get in touch with you soon.<br/><br/>Thanks</p>';
        mail($email,'Contact',$user_content,$headers);
        $content = '';
        $content .= '<div><p>Dear Admin,</p><p>One of the visitors sent you an email enquiry.Following are the details:</p><p>Name: '.$name.'</p><p>Email: '.$email.'</p>';
        if($phone){
            $content .= '<p>Phone no.: '. $phone.'</p>';
        }
        $content .= '<p>Message: '.$message.'</p>';
	if(mail($admin_mail,'New Enquiry'.$name,$content,$headers)){
	    $thankyou .='<div class="alert alert-success">Thankyou for Contacting Us</div>';
	}
    }
    
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Contact Sonorasprinkler Today</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- Le styles -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
		<link href="css/core.min.css" rel="stylesheet">

		<script src="js/libs/modernizr-2.6.1.min.js"></script>
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- icons -->
		<link rel="shortcut icon" href="ico/favicon.ico">
		
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
		
		<!-- Facebook Open Graph -->
		<meta property="og:image" content="http://pathtoimage.com/image.png">
		<meta property="og:title" content="Facebook Open Graph META Tags">
		<meta property="og:url" content="http://your-url-here.com/facebook-meta-tags">
		<meta property="og:site_name" content="CollabOapp">
		<meta property="og:type" content="Web Application">
	        <script type="text/javascript" src="js/jquery-1.6.3.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	        <script type="text/javascript" src="js/validation.js"></script>
		<script type="text/javascript" src="js/jquery_validation.js"></script>
    </head>
<body class="history-page">
    <section class="introduction" role="main">
		<div class="hero-unit">
		    <div class="container">    
				<div class="navbar">
			    	<div class="navbar-inner">
						<div class="container">
				    		<div class="">
								<a href="index.html"><img class="logo_style" src="img/sonora_logo.png" alt="logo" /></a>
								<ul class="nav pull-right">
								    <div class="upper-nav-style">
										<p class="nav pull-right">Sprinkler Repair and Repiping Services</p><br/>
								    </div>
								    <li><a href="index.html">Home</a></li>
								    <li><a href="services.html">Services</a></li>
								    <li><a href="history.html">History</a></li>
								    <li class="active"><a href="contact.php">Connect</a></li>
								</ul>
				    		</div>
						</div>
			    	</div>
				</div>
		    </div>
		</div>  
    </section>
    <section>
        <div class="container">
	    	<div class='row'>
				<div class="span4">
		    		<?php echo($thankyou); ?>
				</div>
	    	</div>
	        <div class='row'>
	            <div class="span6">
	                <form action="contact.php" id="form" method="post">
	                    <label>FULL NAME*</label>
	                    <input class="span4 notEmpty" type="text" name="name" value="" />
	                    <label>EMAIL*</label>
	                    <input class="span4 Email" type="text" name="email" value="" />
	                    <label>PHONE</label>
	                    <input class="span4 Mobile" type="text" name="phone" value="" />
	                    <label>MESSAGE</label>
	                    <textarea class="span4" name="message"></textarea><br/><br/>
	                    <input class="btn" type="submit" name="submit" value="SUBMIT" />
	                    <input class="btn" type="reset" name="reset" value="RESET" /><br/>
	                </form>
	            </div>
				<div class="span3">
				    <label>ADDRESS:</label>
				    <p>Sonora Sprinkler Inc.<br/>
					28955 N. 168th Ave<br/>
					Surprise, AZ 85387
				    </p>
				</div>
				<div class=" span3 pull-right">
			    	<label>CALL: 623-214-2800</label>
				</div>
				<div id="map_canvas" style="height:300px; width:600px;">
				    <script type="text/javascript">
						jQuery(function(){
						    codeAddress();
						});
				    </script>
				</div>
	        </div>
	    </div>
    </section>
    <section>
		<div class="container">
            <div class="row">
                <div class="span4">
                    <h3>Testimonial</h3>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <div class="contact_row">
                        <p>"My experience with Sonora Sprinkler last month in replacing the irrigation system with PVC was a very pleasant surprise. In an age where customer service seems to be an afterthought, I found this company to be the exception. I was very impressed with the professional, dependable and considerate work ethics of all involved. I was especially impressed with Ryan Jantz the General Manager. He was on time, polite, knowledgeable and returned phone calls when he said he would. The follow up was impressive. I feel confident in recommending Sonora Sprinkler to anyone in need of this service."</p>
                        <strong class="pull-right">- Kay Larson </strong><br/>
                        <p class="pull-right">Corte Bella</p>
                    </div>
                </div>
                <div class="span6">
                    <div class="contact_row">
                        <p>"I decided on changing our drip system to PVC pipe from the old flexible tubing as we were having a lot of trouble with leaks in the yard. I&acute;m very fussy about our yard and saw some of the work Sonora Sprinkler was doing. Sonora assured me my yard would look no different when they finished. Everything from the estimate to the men working and the final inspection was very professional. I&acute;m very satisfied and I highly recommend Sonora Sprinkler to everyone I talk to." </p>
                        <div class="testimonial_service_style">
						    <strong class="pull-right">- Ed Baker   </strong><br/>
						    <p class="pull-right">Sun City Grand  </p>
						</div>
                    </div>
                </div>
            </div>
	    </div>
    </section>
    <footer>
		<div class="container">
	    	<div class="row">
				<div class="span4">
				    <h3>Call: 623-214-2800</h3>
				</div>
				<div class="span8">
		    		<div class="navbar">
						<div class="navbar-inner">
			    			<div class="container">
							    <ul class="nav pull-right">
									<li><a href="index.html">Home</a></li>
									<li><a href="services.html">Services</a></li>
									<li><a href="history.html">History</a></li>
									<li><a href="sitemap.html">Sitemap</a></li>
									<li  class="active"><a href="contact.php">Connect</a></li>
							    </ul>
			    			</div>
						</div>
		    		</div>
				</div>
	    	</div>
		</div>
		<div class="colophon">
	    	<div class="container">
				<div class="row">
				    <p class="pull-left">&#169; 2011 Sonora Sprinkler All rights reserved</p>
				    <p class="pull-right">Webmaster: <a href="http://www.dannyglix.com">DannyGlix</a></p>
				</div>
	    	</div>
		</div>
    </footer>
    <!-- javascript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.0.min.js"><\/script>')</script>
    
    <script src="js/libs/bootstrap.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="js/app.js"></script>
    
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. This is the Modernizr async implementation -->
    <script>
		window._gaq = [['_setAccount','UA-XXXXXXX-X'],['_trackPageview'],['_trackPageLoadTime']];
		Modernizr.load({
		    load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
		});
    </script>
</body>
</html>

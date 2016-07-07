<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<head>
<script type="text/javascript">
	function done() {
		alert("Your Message Has Been Sent Successfully!")
			}
</script>
	<title></title>
</head>
<body>
<?php
	//include '../database.php';
	include 'links.php';
	include 'header.php';?>

<div class="container">
<br><br>
	<div class="row">
		
			<div id="content">
        <div class="container">
            <div class="row">
                <!-- Contact Info Start -->
                <div class="contact-info-wrapper clearfix">
                    <div class="col-md-4">
                        <div class="contact-item-wrapper">
                            <div class="icon">
                                <i class="ico-call"></i>
                            </div>
                            <h4>Phone</h4>
                            <p>Phone: 9825989888<br>
                            Phone(02):9974483844</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-item-wrapper bl">
                            <div class="icon">
                                <i class="ico-location_on"></i>
                            </div>
                            <h4>Address</h4>
                            <p>108,Arohi Complex<br>
                            VijayCrossRoads, Ahmedabad.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-item-wrapper">
                            <div class="icon">
                                <i class="ico-email"></i>
                            </div>
                            <h4>EMAIL</h4>
                            <p>jinalshah999@gmail.com<br>
                            shreenilpatel@gmail.com</p>
                        </div>
                    </div>
                </div><!-- Contact Info End -->
                <div class="col-md-8 col-md-offset-2 contact-form">
                    <form class="shake" data-toggle="validator" id=
                    "contactForm" name="contactForm" role="form">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control" data-error=
                                "Please enter your name" id="name" placeholder=
                                "Your Name" required="" type="text">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" data-error=
                                "Please enter your email" id="email"
                                placeholder="Your Email" name="txtemail" required="" type=
                                "email">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" data-error=
                                "Please enter your message subject" id=
                                "msg_subject" name="txtname" placeholder="Subject" required=""
                                type="text">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" required="" name="txtmsg" data-error=
                                "Write your message" id="message" placeholder=
                                "Massage" required="" rows="5">
								</textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-common btn-sn" id="submit"
                            type="submit" onsubmit="return done();">Send Message</button>
                            <div class="h3 text-center hidden" id="msgSubmit">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
		</div>
		
</div>
<br>
<br>
	<!-- Content End -->
    
	<?php include 'footer.php';?>
	<?php include 'scripts.php';?>
</body>
</html>


	
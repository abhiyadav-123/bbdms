<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo '<script>alert("Query Sent. We will contact you shortly.")</script>';
}
else 
{
echo "<script>alert('Something went wrong. Please try again.');</script>";  
}

}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Blood Bank Donar Management System | Contact Us </title>
	<!-- Meta tag Keywords -->
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body>
	<?php include('includes/header.php');?>

	<!-- banner 2 -->
	<div class="inner-banner-w3ls">
		<div class="container">

		</div>
		<!-- //banner 2 -->
	</div>
	<!-- page details -->
	<div class="breadcrumb-agile">
		<div aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- Contact -->
<div class="agileits-contact py-5" style="background-color: #f9f9f9;">
    <div class="py-xl-5 py-lg-3">
        <!-- Contact Section Title -->
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title" style="font-size: 2.5rem; font-weight: bold; color: #333;">Contact Us</h3>
            <span>
                <i class="fas fa-user-md" style="font-size: 2rem; color: #007bff;"></i>
            </span>
            <p class="mt-2" style="color: #666; font-size: 1rem;">We'd love to hear from you! Feel free to reach out to us with any inquiries.</p>
        </div>

        <div class="d-flex justify-content-center">
            <div class="col-lg-7 contact-right-w3l" style="background: #ffffff; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
                <h5 class="title-w3 text-center mb-5" style="font-weight: bold; color: #333;">Get In Touch</h5>
                <form action="#" method="post">
                    <!-- Name and Phone Fields -->
                    <div class="d-flex space-d-flex mb-4">
                        <div class="form-group grid-inputs" style="flex: 1; margin-right: 10px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="border-radius: 50px 0 0 50px;">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="name" name="fullname" placeholder="Please enter your name" style="border-radius: 0 50px 50px 0; padding: 10px 20px; border: 1px solid #ddd;" required>
                            </div>
                        </div>
                        <div class="form-group grid-inputs" style="flex: 1;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="border-radius: 50px 0 0 50px;">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                </div>
                                <input type="tel" class="form-control" id="phone" name="contactno" placeholder="Please enter your phone number" style="border-radius: 0 50px 50px 0; padding: 10px 20px; border: 1px solid #ddd;" required>
                            </div>
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border-radius: 50px 0 0 50px;">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Please enter your email address" style="border-radius: 0 50px 50px 0; padding: 10px 20px; border: 1px solid #ddd;" required>
                        </div>
                    </div>

                    <!-- Message Field -->
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border-radius: 15px 0 0 15px; align-items: flex-start; padding-top: 10px;">
                                    <i class="fas fa-comment-alt"></i>
                                </span>
                            </div>
                            <textarea rows="5" class="form-control" id="message" name="message" placeholder="Please enter your message" style="border-radius: 0 15px 15px 0; padding: 10px 20px; border: 1px solid #ddd; resize: none;" maxlength="999" required></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" name="send" style="width: 100%; border-radius: 50px; padding: 10px 20px; font-size: 16px; background-color: #007bff; color: #fff; border: none;">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Font Awesome Integration -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


	


	<?php include('includes/footer.php');?>

	<!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->

	<!-- banner slider -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	<!-- //banner slider -->

	<!-- fixed navigation -->
	<script src="js/fixed-nav.js"></script>
	<!-- //fixed navigation -->

	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- move-top -->
	<script src="js/move-top.js"></script>
	<!-- easing -->
	<script src="js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="js/medic.js"></script>

	<script src="js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- //Js files -->

</body>

</html>
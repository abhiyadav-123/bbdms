<?php session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['login'])) 
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT id FROM tblblooddonars WHERE EmailId=:email and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['bbdmsdid']=$result->id;
}
$_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location ='index.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Blood Bank Donar Management System | About Us </title>
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
				<li class="breadcrumb-item active" aria-current="page">Login</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- about -->
	<section class="about py-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="login px-4 mx-auto mw-100" style="max-width: 400px; background: #ffffff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); padding: 30px;">
            <h5 class="text-center mb-4" style="font-weight: bold; color: #333;">Login Now</h5>
            <form action="#" method="post" name="login">
                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" style="font-weight: 600; color: #555;">Email ID</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="border-radius: 50px 0 0 50px;">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" style="border-radius: 0 50px 50px 0; padding: 10px 20px; border: 1px solid #ddd;" required="">
                    </div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="mb-2" style="font-weight: 600; color: #555;">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="border-radius: 50px 0 0 50px;">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" style="border-radius: 0 50px 50px 0; padding: 10px 20px; border: 1px solid #ddd;" required="">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary submit mb-4" name="login" style="width: 100%; border-radius: 50px; padding: 10px 20px; font-size: 16px; background-color: #007bff; color: #fff;">
                    Login
                </button>

                <!-- Account Redirect -->
                <p class="account-w3ls text-center pb-4" style="color:#333; font-weight: 500;">
                    Don't have an account?
                    <a href="sign-up.php" style="color: #007bff; text-decoration: none;">Create one now</a>
                </p>
            </form>
        </div>
    </div>
</section>

<!-- Font Awesome Integration -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


	<!-- //about -->



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
<?php
//error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Blood Bank Donar Management System | Search Blood Donor </title>
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

	<!-- Updated Blood Donor List -->

<!-- Page Header -->
<div class="inner-banner-w3ls">
    <div class="container"></div>
</div>

<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blood Donor List</li>
        </ol>
    </div>
</div>

<div class="agileits-contact py-5" style="font-family: Arial, sans-serif;">
    <div class="py-xl-5 py-lg-3">
        <!-- Blood Group Selection Form -->
        <form name="donar" method="post" style="padding-left: 30px;">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div style="font-weight: bold; margin-bottom: 5px;">Blood Group<span style="color:red">*</span></div>
                    <div>
                        <select name="bloodgroup" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            <?php
                            $sql = "SELECT * from tblbloodgroup";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) { ?>  
                                    <option value="<?php echo htmlentities($result->BloodGroup); ?>"><?php echo htmlentities($result->BloodGroup); ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div style="font-weight: bold; margin-bottom: 5px;">Location</div>
                    <div>
                        <textarea class="form-control" name="location" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <input type="submit" name="sub" value="Submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                </div>
            </div>
        </form>

        <!-- Display Blood Donors -->
        <?php
        if (isset($_POST['sub'])) {
            $status = 1;
            $bloodgroup = $_POST['bloodgroup'];
            $location = $_POST['location'];

            $sql = "SELECT * from tblblooddonars where (status=:status and BloodGroup=:bloodgroup) || (Address=:location)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->bindParam(':bloodgroup', $bloodgroup, PDO::PARAM_STR);
            $query->bindParam(':location', $location, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);

            if ($query->rowCount() > 0) { ?>
                <div style="text-align: center; margin-top: 20px;">
                    <h3 style="color: #007bff; font-weight: bold;">Search Blood Donor</h3>
                </div>

                <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px; justify-content: center;">
                    <?php foreach ($results as $result) { ?>
                        <div style="width: 300px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden; background-color: #fff;">
                            <div style="background-color: #007bff; color: #fff; text-align: center; padding: 20px;">
                                <i class="fas fa-user-circle" style="font-size: 50px;"></i>
                                <h4 style="margin: 10px 0 0;"><?php echo htmlentities($result->FullName); ?></h4>
                            </div>
                            <div style="padding: 15px;">
                                <table style="width: 100%; border-collapse: collapse;">
                                    <tbody>
                                        <tr>
                                            <th style="text-align: left; padding: 5px 0; color: #555;">Gender:</th>
                                            <td style="text-align: right; color: #333;"><?php echo htmlentities($result->Gender); ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; padding: 5px 0; color: #555;">Blood Group:</th>
                                            <td style="text-align: right; color: #333;"><?php echo htmlentities($result->BloodGroup); ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; padding: 5px 0; color: #555;">Mobile:</th>
                                            <td style="text-align: right; color: #333;"><?php echo htmlentities($result->MobileNumber); ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; padding: 5px 0; color: #555;">Email:</th>
                                            <td style="text-align: right; color: #333;"><?php echo htmlentities($result->EmailId); ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; padding: 5px 0; color: #555;">Age:</th>
                                            <td style="text-align: right; color: #333;"><?php echo htmlentities($result->Age); ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; padding: 5px 0; color: #555;">Address:</th>
                                            <td style="text-align: right; color: #333;"><?php echo htmlentities($result->Address); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="text-align: center; padding: 10px; background-color: #f9f9f9;">
                                <a href="contact-blood.php?cid=<?php echo $result->id; ?>" style="background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Request</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else {
                echo "<h5 style='color: red; text-align: center;'>No Record Found</h5>";
            }
        } ?>
    </div>
</div>

    </div>
</div>



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
<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Bank Donar Management System | Home Page</title>
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

    <style>
        /* Additional Styles */
        .donor-card {
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            background: #f9f9f9;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .donor-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .donor-card .donor-icon {
            font-size: 60px;
            color: #f44336;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #d32f2f;
        }

        .blood-group-list li {
            font-size: 16px;
            color: #333;
            padding: 5px 0;
        }

        .modal-btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .modal-btn:hover {
            background-color: #388E3C;
        }
    </style>
</head>

<body>
    <?php include('includes/header.php');?>


    <div class="slider">
        <div class="callbacks_container">
            <ul class="rslides callbacks callbacks1" id="slider4">
                <li>
                    <div class="banner-top3">
                        <div class="banner-info_agile_w3ls">
                            <div class="container">
                               
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="banner-top2">
                        <div class="banner-info_agile_w3ls">
                            <div class="container">
                            <h3>Blood bank services that you can trust
                            </h3>
                            </div>
                        </div>
                    </div>
                </li> 
                 <!-- <li>
                    <div class="banner">
                        <div class="banner-info_agile_w3ls">
                            <div class="container">
                               
                            </div>
                        </div>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>
    <!-- //banner -->
    <div class="clearfix"></div>

<!-- banner bottom -->
<div class="banner-bottom py-5" style="background: #f44336; padding: 50px 0;">
    <div class="d-flex container py-xl-3 py-lg-3" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
        <div class="banner-left-bottom-w3ls offset-lg-2 offset-md-1" style="max-width: 60%; color: #fff;">
            <h3 class="text-white my-3" style="font-size: 1.8em; font-weight: bold; margin-bottom: 20px;">High professional doctors</h3>
            <p style="font-size: 1em; line-height: 1.5;">All specialists have extensive practical experience and regularly attend training courses in educational centers of the world</p>
        </div>
        <div class="button" style="text-align: center;">
            <a href="about.php" class="w3ls-button-agile" style="display: inline-block; padding: 10px 20px; background: #fff; color: #f44336; font-weight: bold; border-radius: 5px; text-decoration: none; transition: background 0.3s ease;">Read More
                <i class="fas fa-hand-point-right" style="margin-left: 10px;"></i>
            </a>
        </div>
    </div>
</div>
<!-- //banner bottom -->

    <!-- blog -->
    <div class="blog-w3ls py-5" id="blog">
        <div class="container py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title text-white">Some of the Donors</h3>
                <span>
                    <i class="fas fa-user-md text-white"></i>
                </span>
            </div>
            <div class="row package-grids mt-5">
                <?php 
$status=1;
$sql = "SELECT * from tblblooddonars where status=:status order by rand() limit 6";
$query = $dbh -> prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
                <div class="col-md-4 pricing" style="margin-top:2%;">
                    <div class="donor-card">
                        <div class="donor-icon">
                            <i class="fas fa-tint"></i> <!-- Blood donation icon -->
                        </div>
                        <h3><?php echo htmlentities($result->FullName); ?></h3>
                        <div class="price-bottom p-4">
                            <h4 class="text-dark mb-3">Gender: <?php echo htmlentities($result->Gender); ?></h4>
                            <p class="card-text"><b>Blood Group:</b> <?php echo htmlentities($result->BloodGroup); ?></p>
                            <a class="btn btn-primary" href="contact-blood.php?cid=<?php echo $result->id;?>">Request</a>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </div>
    <!-- //blog -->

    <!-- treatments -->
    <div class="screen-w3ls py-5">
        <div class="container py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">BLOOD GROUPS</h3>
                <span>
                    <i class="fas fa-user-md"></i>
                </span>
                <p class="mt-2">Blood group of any human being will mainly fall into one of the following groups:</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="blood-group-list">
                        <li>A positive or A negative</li>
                        <li>B positive or B negative</li>
                        <li>O positive or O negative</li>
                        <li>AB positive or AB negative</li>
                    </ul>
                    <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid rounded" src="images/blood-donor (1).jpg" alt=""/>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-8">
                    <h4 style="padding-top: 30px;">UNIVERSAL DONORS AND RECIPIENTS</h4>
                    <p>The most common blood type is O, followed by type A.</p>
                    <p>Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.</p>
                </div>
                <div class="col-md-4" style="padding-top: 30px;">
                    <a class="modal-btn" data-toggle="modal" data-target="#exampleModalCenter1" href="#">Become a Donor</a>
                </div>
            </div>
        </div>
    </div>
    <!-- //treatments -->

    <!-- footer -->
    <?php include('includes/footer.php');?>

    <!-- Js files -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 1000,
                namespace: "callbacks"
            });
        });
    </script>
    <script src="js/fixed-nav.js"></script>
    <script src="js/SmoothScroll.min.js"></script>
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/medic.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>

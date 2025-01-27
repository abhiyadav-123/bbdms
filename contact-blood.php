<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
    $cid=$_GET['cid'];
    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $contactno=$_POST['contactno'];
    $brf=$_POST['brf'];
    $message=$_POST['message'];
    $sql="INSERT INTO tblbloodrequirer(BloodDonarID,name,EmailId,ContactNumber,BloodRequirefor,Message) 
          VALUES(:cid,:name,:email,:contactno,:brf,:message)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':cid',$cid,PDO::PARAM_STR);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
    $query->bindParam(':brf',$brf,PDO::PARAM_STR);
    $query->bindParam(':message',$message,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        echo '<script>alert("Request has been sent. We will contact you shortly.")</script>';
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
    <title>Blood Bank Donar Management System | Blood Requerer </title>
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

    <style>
        /* Inline CSS for form styling */
        .contact-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }
        .contact-form {
            background-color: #f7f7f7;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .contact-form .form-group {
            margin-bottom: 20px;
        }
        .contact-form label {
            font-weight: bold;
        }
        .contact-form input, 
        .contact-form select, 
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }
        .contact-form textarea {
            resize: none;
            height: 150px;
        }
        .contact-form .form-group i {
            margin-right: 10px;
        }
        .contact-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px;
        }
        .contact-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php include('includes/header.php');?>

    <!-- banner 2 -->
    <div class="inner-banner-w3ls">
        <div class="container"></div>
    </div>
    <!-- page details -->
    <div class="breadcrumb-agile">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blood Needed Person</li>
            </ol>
        </div>
    </div>
    <!-- //page details -->

    <!-- contact -->
    <div class="agileits-contact py-5">
        <div class="contact-form-container">
            <div class="contact-form">
                <h3 class="text-center">Contact For Blood</h3>
                <form action="#" method="post">
                    <div class="d-flex space-d-flex">
                        <div class="form-group grid-inputs">
                            <label for="name">Your Name</label>
                            <i class="fas fa-user"></i>
                            <input type="text" class="form-control" id="name" name="fullname" placeholder="Please enter your name.">
                        </div>
                        <div class="form-group grid-inputs">
                            <label for="phone">Phone Number</label>
                            <i class="fas fa-phone"></i>
                            <input type="tel" class="form-control" id="phone" name="contactno" placeholder="Please enter your phone number.">
                        </div>
                    </div>
                    
                    <div class="d-flex space-d-flex">
                        <div class="form-group grid-inputs">
                            <label for="email">Email Address</label>
                            <i class="fas fa-envelope"></i>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Please enter your email address.">
                        </div>
                        <div class="form-group grid-inputs">
                            <label for="brf">Blood Require For</label>
                            <i class="fas fa-blood-drop"></i>
                            <select class="form-control" id="brf" name="brf">
                                <option value="">Blood Require For</option>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Brother">Brother</option>
                                <option value="Sister">Sister</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <i class="fas fa-comment"></i>
                        <textarea class="form-control" id="message" name="message" placeholder="Please enter your message" maxlength="999"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" name="send">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //contact -->

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
    <script src="js/fixed-nav.js"></script>
    <script src="js/SmoothScroll.min.js"></script>
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/medic.js"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>

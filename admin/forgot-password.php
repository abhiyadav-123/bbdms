<?php
session_start();
include('includes/config.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $newpassword = md5($_POST['newpassword']);
    $sql = "SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $con = "update tbladmin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
        $chngpwd1 = $dbh->prepare($con);
        $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
        $chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
        $chngpwd1->execute();
        echo "<script>alert('Your Password successfully changed');</script>";
    } else {
        echo "<script>alert('Email id or Mobile no is invalid');</script>";
    }
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>BloodBank & Donor Management System | Forgot Password</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript">
        function checkpass() {
            if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                alert("New Password and Confirm Password Field do not match !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body style="display: flex; justify-content: center; align-items: center; height: 100vh; background: url('img/blood-donor111.jpg') center/cover no-repeat; font-family: Arial, sans-serif;">
    <div style="width: 400px; background: rgba(255, 255, 255, 0.95); border-radius: 15px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); padding: 30px;">
        <h2 style="text-align: center; margin-bottom: 20px;">Forgot Password</h2>
        <form method="post" name="chngpwd" onsubmit="return checkpass();">
            <div style="position: relative; margin-bottom: 20px;">
                <span style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #aaa;">
                    <i class="fa fa-envelope"></i>
                </span>
                <input type="email" name="email" class="form-control" placeholder="Email Address" style="padding-left: 40px; border-radius: 25px;" required="true">
            </div>

            <div style="position: relative; margin-bottom: 20px;">
                <span style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #aaa;">
                    <i class="fa fa-phone"></i>
                </span>
                <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" style="padding-left: 40px; border-radius: 25px;" required="true" maxlength="10" pattern="[0-9]+">
            </div>

            <div style="position: relative; margin-bottom: 20px;">
                <span style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #aaa;">
                    <i class="fa fa-lock"></i>
                </span>
                <input type="password" name="newpassword" class="form-control" placeholder="New Password" style="padding-left: 40px; border-radius: 25px;" required="true">
            </div>

            <div style="position: relative; margin-bottom: 20px;">
                <span style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #aaa;">
                    <i class="fa fa-lock"></i>
                </span>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" style="padding-left: 40px; border-radius: 25px;" required="true">
            </div>

            <button type="submit" name="submit" style="width: 100%; padding: 10px; border-radius: 25px; background: #007bff; color: #fff; border: none; font-size: 16px; cursor: pointer; transition: background 0.3s ease;">Reset</button>
            <a href="index.php" style="display: block; text-align: center; margin-top: 10px; font-size: 14px; color: #007bff; text-decoration: none;">Sign In</a>
        </form>
        <div style="margin-top: 20px; text-align: center;">
            <a href="../index.php" style="display: inline-block; padding: 10px 20px; border-radius: 25px; background: #6c757d; color: #fff; text-decoration: none; font-size: 16px;">Back to Home</a>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

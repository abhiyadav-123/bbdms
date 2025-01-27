<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT UserName,Password FROM tbladmin WHERE UserName=:username and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>BloodBank & Donor Management System | Admin Login</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="display: flex; justify-content: center; align-items: center; height: 100vh; background: url('img/banner211.jpg') center/cover no-repeat; font-family: Arial, sans-serif;">
    <div style="width: 400px; background: rgba(255, 255, 255, 0.95); border-radius: 20px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); padding: 30px;">
        <h2 style="text-align: center; margin-bottom: 20px;">Admin Login</h2>
        <form method="post">
            <div style="position: relative; margin-bottom: 20px;">
                <span style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #aaa;">
                    <i class="fa fa-user"></i>
                </span>
                <input type="text" name="username" class="form-control" placeholder="Username" style="padding-left: 40px; border-radius: 25px;">
            </div>

            <div style="position: relative; margin-bottom: 20px;">
                <span style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #aaa;">
                    <i class="fa fa-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" placeholder="Password" style="padding-left: 40px; border-radius: 25px;">
            </div>

            <button type="submit" name="login" style="width: 100%; padding: 10px; border-radius: 25px; background: #007bff; color: #fff; border: none; font-size: 16px; cursor: pointer; transition: background 0.3s ease;">
                LOGIN
            </button>
            <a href="forgot-password.php" style="display: block; margin-top: 10px; text-align: right; font-size: 14px; color: #007bff; text-decoration: none;">Forgot Password?</a>
        </form>
        <div style="margin-top: 20px; text-align: center;">
            <a href="../index.php" style="display: inline-block; padding: 10px 20px; border-radius: 25px; background: #6c757d; color: #fff; text-decoration: none; font-size: 16px;">
                Back to Home
            </a>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
    header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
{
    $adminid=$_SESSION['alogin'];
    $AName=$_POST['adminname'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $sql="update tbladmin set AdminName=:adminname,MobileNumber=:mobilenumber,Email=:email where UserName=:aid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':adminname',$AName,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
    $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
    $query->execute();

    echo '<script>alert("Your profile has been updated")</script>';
    echo "<script>window.location.href ='profile.php'</script>";
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    
    <title>BBDMS | Admin Profile</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        .profile-header {
            background-color: #007bff;
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 5px;
        }
        .profile-header h2 {
            margin: 0;
            font-size: 30px;
        }
        .profile-header i {
            font-size: 50px;
            margin-bottom: 15px;
        }
        .form-group .control-label {
            font-weight: bold;
            color: #007bff;
        }
        .form-group input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }
        .form-group button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #218838;
        }
        .form-group .hr-dashed {
            border-top: 1px dashed #ccc;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .panel-default {
            border: none;
        }
        .panel-heading {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            padding: 10px;
        }
        .panel-body {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>

</head>

<body>
    <?php include('includes/header.php');?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
                            <i class="fa fa-user-circle"></i>
                            <h2>Admin Profile</h2>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Update Your Profile</div>
                                    <div class="panel-body">
                                        <form method="post" class="form-horizontal" onSubmit="return valid();">
                                            <?php
                                            $sql="SELECT * from  tbladmin";
                                            $query = $dbh -> prepare($sql);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            if($query->rowCount() > 0) {
                                                foreach($results as $row) {
                                            ?>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Admin Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="adminname" value="<?php echo $row->AdminName;?>" class="form-control" required='true'>
                                                </div>
                                            </div>

                                            <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Username</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="username" value="<?php echo $row->UserName;?>" class="form-control" readonly="">
                                                </div>
                                            </div>

                                            <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Contact Number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="mobilenumber" value="<?php echo $row->MobileNumber;?>" class="form-control" maxlength='10' required='true' pattern="[0-9]+">
                                                </div>
                                            </div>

                                            <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" name="email" value="<?php echo $row->Email;?>" class="form-control" required='true'>
                                                </div>
                                            </div>

                                            <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Admin Registration Date</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="" value="<?php echo $row->AdminRegdate;?>" readonly="" class="form-control">
                                                </div>
                                            </div>

                                            <div class="hr-dashed"></div>
                                            <?php } } ?>

                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-4">
                                                    <button class="btn btn-primary" name="submit" type="submit">
                                                        <i class="fa fa-save"></i> Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
<?php } ?>

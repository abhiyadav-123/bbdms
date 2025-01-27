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
        $bloodgroup=$_POST['bloodgroup'];
        $sql="INSERT INTO  tblbloodgroup(BloodGroup) VALUES(:bloodgroup)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':bloodgroup',$bloodgroup,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            $msg="Blood Group Created successfully";
        }
        else 
        {
            $error="Something went wrong. Please try again";
        }
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
    
    <title>BBDMS | Admin add-bloodgroup</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .form-wrapper {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #f9f9f9;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 25px;
        }
        .input-group .fa {
            font-size: 18px;
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
        .input-group {
            position: relative;
        }
        .btn-primary {
            border-radius: 25px;
            font-size: 16px;
        }
        .panel-heading {
            font-size: 1.5em;
            font-weight: bold;
            color: #4e73df;
            padding-bottom: 10px;
        }
        .panel-body {
            padding: 0;
        }
        h2.page-title {
            font-size: 2em;
            color: #333;
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
                        <h2 class="page-title text-center">Add Blood Group</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Form fields</div>
                                    <div class="panel-body">
                                        <div class="form-wrapper">
                                            <form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
                                                
                                                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                                                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                                
                                                <div class="form-group">
                                                    <label class="control-label">Blood Group</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-tint"></i></span>
                                                        <input type="text" class="form-control" name="bloodgroup" id="bloodgroup" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12 text-center">
                                                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
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

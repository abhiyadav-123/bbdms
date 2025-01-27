<?php error_reporting(0);
session_start(); ?>
<!-- header -->
  
   
<div id="home">
    <div class="main-top py-1" id="main-header" style="background-color: transparent; border-radius: 15px; padding: 10px; margin: 10px;">
        <nav class="navbar navbar-expand-lg navbar-light fixed-navi" style=" border-radius: 15px; padding: 5px;">
            <div class="container">
                <!-- logo -->
                <h1>
                    <a class="navbar-brand font-weight-bold font-italic" href="index.php" style="color: white;">
                        <span style="color: lightcoral;">BB</span>DMS
                    </a>
                </h1>
                <!-- //logo -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: white;"></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto" style="align-items: center;">
                        <li class="nav-item active mt-lg-0 mt-3">
                            <a class="nav-link" href="index.php" style="color: white;">
                                <i class="fas fa-home fa-lg text-primary mr-2"></i>Home
                            </a>
                        </li>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="about.php" style="color: white;">
                                <i class="fas fa-info-circle fa-lg text-success mr-2"></i>About Us
                            </a>
                        </li>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="contact.php" style="color: white;">
                                Contact Us
                            </a>
                        </li>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="donor-list.php" style="color: white;">
                                <i class="fas fa-list fa-lg text-danger mr-2"></i>Donor List
                            </a>
                        </li>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="search-donor.php" style="color: white;">
                                <i class="fas fa-search fa-lg text-info mr-2"></i>Search Donor
                            </a>
                        </li>
                        <?php if (strlen($_SESSION['bbdmsdid'] != 0)) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" style="color: white;">
                                <i class="fas fa-user-circle fa-lg text-secondary mr-2"></i>My Account
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm mr-2"></i>Profile
                                </a>
                                <a class="dropdown-item" href="change-password.php">
                                    <i class="fas fa-key fa-sm mr-2"></i>Change Password
                                </a>
                                <a class="dropdown-item" href="request-received.php">
                                    <i class="fas fa-envelope fa-sm mr-2"></i>Request Received
                                </a>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm mr-2"></i>Logout
                                </a>
                            </div>
                        </li>
                        <?php } ?>
                        <?php if (strlen($_SESSION['bbdmsdid'] == 0)) { ?>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="admin/index.php" style="color: white;">
                                Admin
                            </a>
                        </li>
                    </ul>
                    <a href="login.php" class="login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" 
                         style="background-color: lightcoral; color: white; padding: 8px 16px; border-radius: 25px; text-decoration: none; font-weight: bold;">
                        Login
                    </a>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </div>
</div>


        
   <!-- Register Modal -->
<!-- <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-4" style="border-radius: 15px; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);">
            <div class="modal-header border-0">
                <h5 class="modal-title w-100 text-center font-weight-bold" style="color: #007BFF;">Register Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" name="signup" onsubmit="return checkpass();">
                 
                    <div class="form-group">
                        <label for="fullname"><i class="fas fa-user mr-2"></i> Full Name</label>
                        <input type="text" class="form-control rounded-pill" name="fullname" id="fullname" placeholder="Enter your full name" style="padding-left: 40px;">
                    </div>

                
                    <div class="form-group">
                        <label for="mobileno"><i class="fas fa-phone-alt mr-2"></i> Mobile Number</label>
                        <input type="text" class="form-control rounded-pill" name="mobileno" id="mobileno" placeholder="Enter your mobile number" maxlength="10" pattern="[0-9]+" style="padding-left: 40px;">
                    </div>

                  
                    <div class="form-group">
                        <label for="emailid"><i class="fas fa-envelope mr-2"></i> Email ID</label>
                        <input type="email" class="form-control rounded-pill" name="emailid" id="emailid" placeholder="Enter your email" style="padding-left: 40px;">
                    </div>


                    <div class="form-group">
                        <label for="age"><i class="fas fa-birthday-cake mr-2"></i> Age</label>
                        <input type="text" class="form-control rounded-pill" name="age" id="age" placeholder="Enter your age" style="padding-left: 40px;">
                    </div>

       
                    <div class="form-group">
                        <label for="gender"><i class="fas fa-venus-mars mr-2"></i> Gender</label>
                        <select name="gender" id="gender" class="form-control rounded-pill">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

         
                    <div class="form-group">
                        <label for="bloodgroup"><i class="fas fa-tint mr-2"></i> Blood Group</label>
                        <select name="bloodgroup" id="bloodgroup" class="form-control rounded-pill">
                            <?php 
                            $sql = "SELECT * FROM tblbloodgroup";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) { ?>  
                                <option value="<?php echo htmlentities($result->BloodGroup); ?>">
                                    <?php echo htmlentities($result->BloodGroup); ?>
                                </option>
                            <?php }} ?>
                        </select>
                    </div>

                
                    <div class="form-group">
                        <label for="address"><i class="fas fa-map-marker-alt mr-2"></i> Address</label>
                        <input type="text" class="form-control rounded-pill" name="address" id="address" placeholder="Enter your address" style="padding-left: 40px;">
                    </div>

                 
                    <div class="form-group">
                        <label for="message"><i class="fas fa-comment-alt mr-2"></i> Message</label>
                        <textarea class="form-control rounded" name="message" id="message" rows="3" placeholder="Write your message here"></textarea>
                    </div>

               
                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock mr-2"></i> Password</label>
                        <input type="password" class="form-control rounded-pill" name="password" id="password" placeholder="Create a password" style="padding-left: 40px;">
                    </div>

              
                    <button type="submit" class="btn btn-primary btn-block rounded-pill mt-4" name="submit" style="font-size: 1rem;">
                        Register <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div> -->

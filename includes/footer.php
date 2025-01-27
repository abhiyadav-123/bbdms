<footer class="w3ls-footer" style="background-color: #343a40; color: white; font-family: Arial, sans-serif; background-image: none;">
    <div class="w3ls-footer-grids" style="padding: 30px 0;">
        <div class="container" style="max-width: 1200px; margin: auto;">
            <div class="row" style="display: flex; flex-wrap: wrap;">
                <!-- Logo and Description -->
                <div class="col-md-4 w3l-footer" style="padding: 20px;">
                    <h2 style="margin-bottom: 15px; font-size: 24px; font-weight: bold;">
                        <a href="index.php" style="color: white; text-decoration: none;">
                            <span style="color: #ffc107;">Blood Bank &</span> Donor Management System
                            <i class="fas fa-tint" style="margin-left: 10px;"></i>
                        </a>
                    </h2>
                    <p style="font-size: 14px; line-height: 1.8;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
                <!-- Address Section -->
                <div class="col-md-4 w3l-footer" style="padding: 20px;">
                    <h3 style="margin-bottom: 15px; font-size: 20px; font-weight: bold;">Address</h3>
                    <ul style="list-style: none; padding: 0; font-size: 14px; line-height: 2;">
                        <?php 
                        $pagetype = "contactus";
                        $sql = "SELECT * FROM tblcontactusinfo";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) { ?>
                                <li style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <i class="fas fa-map-marker-alt" style="margin-right: 10px; color: #ffc107;"></i>
                                    <p><?php echo $result->Address; ?></p>
                                </li>
                                <li style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <i class="fas fa-phone-alt" style="margin-right: 10px; color: #ffc107;"></i>
                                    <p><?php echo $result->ContactNo; ?></p>
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <i class="fas fa-envelope" style="margin-right: 10px; color: #ffc107;"></i>
                                    <a href="mailto:info@example.com" style="color: white; text-decoration: none;"><?php echo $result->EmailId; ?></a>
                                </li>
                        <?php } } ?>
                    </ul>
                </div>
                <!-- Quick Links Section -->
                <div class="col-md-4 w3l-footer" style="padding: 20px;">
                    <h3 style="margin-bottom: 15px; font-size: 20px; font-weight: bold;">Quick Links</h3>
                    <ul style="list-style: none; padding: 0; font-size: 14px; line-height: 2;">
                        <li><a href="index.php" style="color: white; text-decoration: none;"><i class="fas fa-home" style="margin-right: 10px; color: #ffc107;"></i>Home</a></li>
                        <li><a href="about.php" style="color: white; text-decoration: none; margin-top: 5px;"><i class="fas fa-info-circle" style="margin-right: 10px; color: #ffc107;"></i>About Us</a></li>
                        <li><a href="contact.php" style="color: white; text-decoration: none; margin-top: 5px;"><i class="fas fa-phone" style="margin-right: 10px; color: #ffc107;"></i>Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <!-- Footer Bottom Section -->
            <div style="border-top: 1px solid #555; margin-top: 30px; padding-top: 20px; text-align: center;">
                <p style="font-size: 14px;">© 2025 Blood Bank Donor Management System</p>
            </div>
        </div>
    </div>
</footer>

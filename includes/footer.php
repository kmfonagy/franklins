               <div id="footer" class="cf">
                    <div class="column three">
                        <strong>Phone</strong>
                        888.555.1234
                    </div>
                    <div class="column three">
                        <strong>Location</strong>
                        123 Something Rd<br>
                        Columbus, OH
                    </div>
                    <div class="column three last">
                        <strong>Hours</strong>
                        <em>Tuesday - Thursday</em><br>
                        1:00pm - 9:00pm<br><br>

                        <em>Friday - Saturday</em>
                        4:00pm - 11:00pm<br><br>

                        <em>Sunday - Monday</em>
                        Closed<br><br>

                        <?php include('includes/storeHours.php');?>
                    </div> <!--column-->
                </div><!--footer-->
                <small>&copy;<?php echo date('Y'); ?> <?php echo $companyName; ?></small>
            </div> <!--content-->
        </div><!--wrapper-->

        <div class="copyright-info">
            <?php include('../assets/includes/copyright.php'); ?>
        </div><!--copyright-->
    </body>
</html>
<!DOCTYPE html>
<html>
<?php
require_once("includes/classes.php");
$login = new AllPageContent();
$login_functions = new UserOperation();
$login->head("Login | Accounting");
session_start();
if(isset($_SESSION['sess_email']))
{
    header("location:index.php");
}
?>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
            <?php
            $login_functions->loginForm("Accounting", "Welcome to Accounting, please enter your email address and password to login into the system. if you are not registered you should contact the admin.");

            ?>
          <div class="copyrights text-center">
            </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>
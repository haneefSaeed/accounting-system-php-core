<!DOCTYPE html>
<html>
<?php
require_once ("includes/classes.php");
$reg = new AllPageContent();
$reg->head("Register | Accounting");
$reg_func = new UserOperation();

$reg->AdminSession("index.php");
?>
<body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
            <?php
            $reg_func->registerForms();
            $reg_func->reg_register();

            ?>
          <div class="copyrights text-center">
            <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">
        document.getElementById('reg_from').addEventListener('reg_register', function{


        var pass = document.getElementById('register-password');
        var cpass = document.getElementById('register-cpassword');
        if(pass!=cpass){
            alert("passwords does not match");
        }
        })
    </script>
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

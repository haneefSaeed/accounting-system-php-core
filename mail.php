<!DOCTYPE html>
<html>
<?php
require_once("includes/classes.php");
$mailing = new AllPageContent();
$mailing->head("Quick Mail | " . COMPANY_NAME);
$mailing->StartSession("login.php");

?>
<body>
<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center">
                <h2 class="h5"><?php echo "Hi,". $_SESSION['sess_user']; ?></h2><span><?php echo $_SESSION['sess_email']; ?></span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center">
                    <strong>A</strong><strong class="text-primary">S</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <?php
        $mailing->main_menu();
        //$index->sec_menu();
        ?>

    </div>
</nav>


<div class="page">
    <!-- navbar-->
    <?php
    $mailing->navtop();
    ?>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Quick Mail       </li>
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h1 display">Quick Mail            </h1>
            </header>
            <div class="row">

                <div class="col-lg-12 ">
                    <div class="card">
                        <div class="card-body float-right ">
                           <form id="emailform">
                               <button type="button" class="btn btn-success float-right" id="sendmail"><i class="fa fa-send"></i> Send Mail</button>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="errors" role="alert"></div>
                </div>


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Compose an Email</h4>
                        </div>
                        <div class="card-body">

                                <table class="table table-borderless col-lg-4">
                                    <tr>
                                            <td width="30%">
                                                <h6 class="label-custom">Email to: &nbsp;</h6>
                                            </td>
                                            <td>
                                                <input type="text" placeholder="To" name="emailto" class="form-control emailto">
                                            </td>

                                    </tr>
                                    <tr>

                                            <td width="30%">
                                                <h6 class="label-custom">Subject: &nbsp;</h6>
                                            </td>
                                            <td>
                                                <input type="text" placeholder="Subject" name="emailsubject" class="form-control emailsubject">
                                            </td>

                                    </tr>
                                </table><table class="table table-borderless col-lg-12">
                                    <tr>

                                            <td width="10%">
                                                <h6 class="label-custom">Email Body: &nbsp;</h6>
                                            </td>
                                            <td>
                                               <textarea class="form-control emailbody " name="emailbody" placeholder="Content" size="1000" ></textarea>
                                            </td>

                                    </tr>

                                </table>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>




    <!-- Modal New Shipper-->




    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p><?php echo COMPANY_NAME . " © 2020 " ?></p>
                </div>
                <div class="col-sm-6 text-right">
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- JavaScript files-->
<?php
$mailing->footer();

?>ssss
<script>
    $(document).on('click', '#sendmail', function () {
        $('#errors').removeClass();
        $('#errors').addClass("alert alert-warning alert-dismissible fade show");
        $('#errors').html("<i class='fa fa-info-circle'></i> Please wait for your process!");
        $('#errors').append("<buton type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>");
        if($('.emailto').val()=="" ){
            $('#errors').removeClass();
            $('#errors').addClass("alert alert-danger alert-dismissible fade show");
            $('#errors').html("Please Fill To Address:");
            $('#errors').append("<buton type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>");
            $('.emailto').focus();
        }else if($('.emailsubject').val()=="" ){
            $('#errors').removeClass();
            $('#errors').addClass("alert alert-danger alert-dismissible fade show");
            $('#errors').html("Subject field cannot be empty!");
            $('#errors').append("<buton type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>");
            $('.emailsubject').focus();
        }else if( $('.emailbody').val()==""){
            $('#errors').removeClass();
            $('#errors').addClass("alert alert-danger alert-dismissible fade show");
            $('#errors').html("Email body Cannot be empty!");
            $('#errors').append("<buton type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>");
            $('.emailbody').focus();
        }else {
            $.ajax({
                url: "Includes/Operate.php",
                data: $('#emailform').serialize(),
                method: 'post',
                success: function (data) {
                    $('#errors').removeClass();
                    $('#errors').addClass("alert alert-success alert-dismissible fade show");
                    $('#errors').html("<i class='fa fa-check-circle'></i> " + data + " Reloading page...");
                    $('#errors').append("<buton type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>");
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                }


            })
        }
    })
</script>

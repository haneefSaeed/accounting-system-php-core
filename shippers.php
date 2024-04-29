<!DOCTYPE html>
<html>
<?php
require_once("includes/classes.php");
$shipper = new AllPageContent();
$shipper->head("Shippers | " . COMPANY_NAME);
$shipper_func = new ShipperOperation();

$shipper->startSession("login.php");


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
        $shipper->main_menu();
        //$index->sec_menu();
        ?>

    </div>
</nav>


<div class="page">
      <!-- navbar-->
    <?php
    $shipper->navtop();
    ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Shippers       </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h1 display">Shippers            </h1>
          </header>
                <div class="row">

                <div class="col-lg-12 ">
                  <div class="card">
                      <div class="card-body float-right ">
                          <form class="form-inline float-right">
                                  <a href="includes/Operate.php?"  class="mr-3 btn btn-info"><i class="fa fa-print"></i> Print List</a>
                                  <button type="button" data-toggle="modal" data-target="#ShipperModal" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New Shipper </button>
                          </form>
                      </div>

                  </div>
              </div>

                    <div class="col-lg-12">
              <?php
                $shipper_func->ShipperOperationResults();
              ?>
                    </div>


              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header">
                          <h4>List of Shippers</h4>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-hover">
                                  <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Company</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Job Tite</th>
                                    <th>Address</th>
                                    <th>Note</th>
                                    <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  $shipper_func->fetchAllShippers();
                                  ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
        </div>
      </section>




<!-- Modal New Shipper-->
<div id="ShipperModal"  tabindex="-1" role="dialog" aria-labelledby="ShippersModal" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="ShippersModal" class="modal-title">Add New Shipper</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Please fill the required fields.</p>
                <form method="post" action="includes/Operate.php">

                    <div class="form-group">
                        <label>Shipper Company *</label>
                        <input type="text" placeholder="Shipper Name" required class="form-control" name="ship_company">
                    </div>

                    <div class="form-group">
                        <label>Shipper Name *</label>
                        <input type="text" placeholder="Shipper Name" required class="form-control" name="ship_name">
                    </div>

                    <div class="form-group">
                        <label>Shipper Email *</label>
                        <input type="email" placeholder="Shipper Email" required class="form-control" name="ship_email">
                    </div>
                    <div class="form-group">
                        <label>Shipper Job Title</label>
                        <input type="text" placeholder="Job Title" class="form-control" name="ship_job">
                    </div>

                    <div class="form-group">
                        <label>Shipper Phone Number *</label>
                        <input type="text" placeholder="Shipper Phone Number" required class="form-control" name="ship_phone">
                    </div>
                    <div class="form-group">
                        <label>Shipper Address</label>
                        <input type="text" placeholder="Shipper Address" class="form-control" name="ship_add">
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <input type="text" placeholder="Job Title" class="form-control" name="ship_note">
                    </div>


            </div>
            <div class="modal-footer">
                <input type="submit" value="Save Shipper" name="ship_save" class="btn btn-primary">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>



    <?php
    if(isset($_GET['ship_upd_id'])){
$shipper_update_id = $_GET['ship_upd_id'];
echo $shipper_update_id;
$shipper_func->UpdateShipper(22);
    }
    $shipper_func->UpdateShipper(25);

    ?>



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
$shipper->footer();

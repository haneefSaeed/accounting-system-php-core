<!DOCTYPE html>
<html>
<?php
require_once("includes/classes.php");
$supplier = new AllPageContent();
$supplier->head("Suppliers | " . COMPANY_NAME);
$supplier_func = new SupplierOperation();

$supplier->startSession("login.php");


?>

<script>
    function confirm(){
        alert("Record will be deleted!");
    }
</script>
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
        $supplier->main_menu();
        //$index->sec_menu();
        ?>

    </div>
</nav>


<div class="page">
      <!-- navbar-->
    <?php
    $supplier->navtop();
    ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Suppliers       </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h1 display">Suppliers            </h1>
          </header>
                <div class="row">

                <div class="col-lg-12 ">
                  <div class="card">
                      <div class="card-body float-right ">
                          <form class="form-inline float-right">
                                  <a href="includes/Operate.php?"  class="mr-3 btn btn-info">Print List</a>
                                  <button type="button" data-toggle="modal" data-target="#SupplierModal" class="btn btn-primary">Add New Supplier </button>
                          </form>
                      </div>

                  </div>
              </div>

                    <div class="col-lg-12">
              <?php
                $supplier_func->SupplierOperationResults();
              ?>
                    </div>


              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header">
                          <h4>List of Suppliers</h4>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-hover">
                                  <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Job Tite</th>
                                    <th>Address</th>
                                    <th>Note</th>
                                    <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  $supplier_func->fetchAllSuppliers();
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




<!-- Modal New Supplier-->
<div id="SupplierModal"  tabindex="-1" role="dialog" aria-labelledby="SuppliersModal" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="SuppliersModal" class="modal-title">Add New Supplier</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Please fill the required fields.</p>
                <form method="post" action="includes/Operate.php">
                    <div class="form-group">
                        <label>Supplier Name *</label>
                        <input type="text" placeholder="Supplier Name" required class="form-control" name="sup_name">
                    </div>

                    <div class="form-group">
                        <label>Supplier Company *</label>
                        <input type="text" placeholder="Supplier Name" required class="form-control" name="sup_company">
                    </div>

                    <div class="form-group">
                        <label>Supplier Email *</label>
                        <input type="email" placeholder="Supplier Email" required class="form-control" name="sup_email">
                    </div>
                    <div class="form-group">
                        <label>Supplier Job Title</label>
                        <input type="text" placeholder="Job Title" class="form-control" name="sup_job">
                    </div>

                    <div class="form-group">
                        <label>Supplier Phone Number *</label>
                        <input type="text" placeholder="Supplier Phone Number" required class="form-control" name="sup_phone">
                    </div>
                    <div class="form-group">
                        <label>Supplier Address</label>
                        <input type="text" placeholder="Supplier Address" class="form-control" name="sup_add">
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <input type="text" placeholder="Job Title" class="form-control" name="sup_note">
                    </div>


            </div>
            <div class="modal-footer">
                <input type="submit" value="Save Supplier" name="sup_save" class="btn btn-primary">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>



    <?php
    if(isset($_GET['sup_upd_id'])){
$supplier_update_id = $_GET['sup_upd_id'];
echo $supplier_update_id;
$supplier_func->UpdateSupplier(22);
    }
    $supplier_func->UpdateSupplier(25);

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
$supplier->footer();

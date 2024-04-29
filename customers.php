<!DOCTYPE html>
<html>
<?php
require_once("includes/classes.php");
$customer = new AllPageContent();
$customer->head("Customers | " . COMPANY_NAME);
$customer_func = new CustomerOperation();

$customer->startSession("login.php");

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
        $customer->main_menu();
        //$index->sec_menu();
        ?>

    </div>
</nav>


<div class="page">
      <!-- navbar-->
    <?php
    $customer->navtop();
    ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Customers</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
            <!-- Page Header-->
          <header> 
            <h1 class="h1 display">Customers            </h1>
          </header>
                <div class="row">

                <div class="col-lg-12 ">
                  <div class="card">
                      <div class="card-body float-right ">
                                   <button type="button" data-toggle="modal" data-target="#CustomerModal" class="btn btn-primary float-right"><i class="fa fa-plus-circle"></i> Add New Customer </button>
                          <a href="#"  class="mr-3 btn btn-info float-right"><i class="fa fa-print"></i> Print List</a>

                      </div>

                  </div>
              </div>

                    <div class="col-lg-12">
                        <div id="deletecomplete"></div>
                        <div id="savecomplete"></div>
                        <div id="updatecomplete"></div>
                    </div>


              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header">
                          <h4>List of Customers</h4>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-hover" id="customertable">
                                  <thead>
                                  <tr>
                                    <th>No.</th>
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
                                  $customer_func->fetchAllCustomers();
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




<!-- Modal New Customer-->
<div id="CustomerModal"  tabindex="-1" role="dialog" aria-labelledby="CustomersModal" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="CustomersModal" class="modal-title">Add New Customer</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Please fill the required fields.</p>
                <form method="post" action="includes/Operate.php">
                    <div class="form-group">
                        <label>Customer Name *</label>
                        <input type="text" placeholder="Customer Name" required class="form-control" name="cust_name">
                    </div>
                    <div class="form-group">
                        <label>Customer Email *</label>
                        <input type="email" placeholder="Customer Email" required class="form-control" name="cust_email">
                    </div>
                    <div class="form-group">
                        <label>Customer Job Title</label>
                        <input type="text" placeholder="Job Title" class="form-control" name="cust_job">
                    </div>

                    <div class="form-group">
                        <label>Customer Phone Number *</label>
                        <input type="text" placeholder="Customer Phone Number" required class="form-control" name="cust_phone">
                    </div>
                    <div class="form-group">
                        <label>Customer Address</label>
                        <input type="text" placeholder="Customer Address" class="form-control" name="cust_add">
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <input type="text" placeholder="Job Title" class="form-control" name="cust_note">
                    </div>


            </div>
            <div class="modal-footer">
                <input type="submit" value="Save Customer" name="cust_save" class="btn btn-primary">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>



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

<div id="CustomerUpdate"  tabindex="-1" role="dialog" aria-labelledby="CustomersUpdate" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="CustomersUpdate" class="modal-title">Update Customer</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Please fill the required fields.</p>
                <form class="form update_form">
                    <div class="form-group">
                        <label>Customer Name *</label>
                        <input type="text" placeholder="Customer Name" required class="form-control cname" name="cust_name">
                    </div>
                    <div class="form-group">
                        <label>Customer Email *</label>
                        <input type="email" placeholder="Customer Email" required class="form-control cemail" name="cust_email">
                    </div>
                    <div class="form-group">
                        <label>Customer Job Title</label>
                        <input type="text" placeholder="Job Title" class="form-control cjob" name="cust_job">
                    </div>

                    <div class="form-group">
                        <label>Customer Phone Number *</label>
                        <input type="text" placeholder="Customer Phone Number" required class="form-control cphone"  name="cust_phone">
                    </div>
                    <div class="form-group">
                        <label>Customer Address</label>
                        <input type="text" placeholder="Customer Address" class="form-control cadd" name="cust_add">
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <input type="text" placeholder="Job Title" class="form-control cnote" name="cust_note">
                        <input type="hidden" placeholder="Job Title" class="form-control cid"  name="cust_id">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" value="Update Customer Detail" name="cust_update" class="btn btn-primary cupdate">Update Info</button>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>
    <!-- JavaScript files-->

<?php
$customer->footer();
?>
<script type="text/javascript">

    $('#customertable').dataTable();

    $(document).on('click', '.delete', function () {
        cust_del = $(this).attr("id");
        cust_del_name = $(this).attr("style");
        if(confirm(cust_del_name +" Record will be deleted?")){
            $.ajax({
                method:"post",
                url:"includes/operate.php",
                data:{cust_del:cust_del,
                cust_del_name:cust_del_name},
                success:function (data) {
                    alert(cust_del_name + data);
                    location.reload();
                    }
            })
        }
    })
    
    $(document).on('click', '.update', function () {
        cust_upd = $(this).attr("id");
        $.ajax({
            dataType: "json",
            method:"post",
            url: "includes/operate.php",
            async:false,
            data:{cust_upd_id:cust_upd},
            success:function (data) {
                ID = data.cust_id;
                Name = data.cust_name;
                Email = data.cust_email;
                Job = data.cust_job;
                Phone = data.cust_phone;
                Address = data.cust_add;
                Note = data.cust_note;
               $('.cid').val(ID);
               $('.cname').val(Name);
               $('.cemail').val(Email);
               $('.cjob').val(Job);
               $('.cphone').val(Phone);
               $('.cadd').val(Address);
               $('.cnote').val(Note);
                $('#CustomerUpdate').modal("show");
            }
        })
    })

    $(document).on('click', '.cupdate', function () {
        cust_upd = $('.update').attr("id");
        $.ajax({
            method:"post",
            url:"includes/operate.php",
            data: $('.update_form').serialize(),
            success:function f(data) {
                alert("Updated successfully!");
                location.reload();
            }
        })
    })


    
    </script>

<!DOCTYPE html>
<html>
<?php
require_once("includes/classes.php");
$allpo = new AllPageContent();
$allpo->head("Purchase Orders | " . COMPANY_NAME);
$allpo_func = new purchaseOrderOperation();

$allpo->startSession("login.php");

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
        $allpo->main_menu();
        //$index->sec_menu();
        ?>

    </div>
</nav>


<div class="page">
      <!-- navbar-->
    <?php
    $allpo->navtop();
    ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Purchase Order       </li>
            <li class="breadcrumb-item active"><a href="#">All Orders</a>      </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <h1 class="h1 display">All Purchase Orders            </h1>
          </header>
                <div class="row">

                <div class="col-lg-12 ">
                  <div class="card">
                      <div class="card-body float-right ">
                          <?php
                          //$allpo_func->fetchProductsCategory();
                          ?>
                          <form class="form-inline float-right">


                                  <a href="closed_po.php"  class="mr-3 btn btn-secondary"><i class="fa fa-ban"></i> Canceled Orders</a>
                              <a href="new_p_order.php" class="mr-3 btn btn-success"><i class="fa fa-plus-circle"></i> New Purchase Order </a>
                          </form>
                      </div>

                  </div>
              </div>

                    <div class="col-lg-12">
              <?php
                //$allpo_func->ProductOperationResults();
              ?>
                    </div>


              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header">
                          <h4>List of All Purchase Orders</h4>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-hover table-bordered PagedTable" id="PagedTable">
                                  <thead>
                                  <tr>
                                      <th>O#</th>
                                      <th>Status</th>
                                      <th>Supplier</th>
                                      <th>Total Price<?php echo "(". $allpo->currency(). ")";?></th>
                                      <th>Submitted by</th>
                                      <th>Submitted Date</th>
                                      <th>Approved by</th>
                                      <th>Approved Date</th>
                                      <th>Date paid</th>
                                      <th>Ap/Ca</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php

                                      $allpo_func->fetchAllOrders();

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
<div id="ProductModal"  tabindex="-1" role="dialog" aria-labelledby="ProductsModal" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="ProductsModal" class="modal-title">Inventory Transaction</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Purchase Order Receiving </p>

                <table class="table table-bordered table-hover " id="PagedTable">
                    <thead>
                    <th>PID</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Unit Cost</th>
                    <th>Rec.</th>
                    <th>Rec. Date</th>
                    </thead>
                   <tbody id="mtbody"></tbody>
                </table>

            </div>
            <div class="modal-footer">


            </div>

        </div>
    </div>
</div>



    <?php
    if(isset($_GET['ship_upd_id'])){
$product_update_id = $_GET['ship_upd_id'];
echo $product_update_id;
//$allpo_func->UpdateShipper(22);
    }
    //$allpo_func->UpdateShipper(25);

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
$allpo->footer();
?>
<script type="text/javascript">
    $(document).ready(function () {
        //alert("Loaded");
       $('#PagedTable').DataTable();
      // $(".dataTables_lenght").addClass("bs-select");
      // $('.dataTables_lenght').addClass('bs-select');
        $(document).on('dblclick', '.tblrow',function () {
        Purchase_Order_id  = $(this).attr("id");
        $.ajax({
            method: "POST",
            url: "includes/operate.php",
            data: {Purchase_Order_id: Purchase_Order_id},
            success: function f(data) {
            $('#mtbody').html("");
            $('#mtbody').append(data);
            $('#ProductModal').modal("show");

        }

    })

    });
        $(document).on('click','.Approve', function () {
            Po_id = $(this).attr("id");
            $.ajax({
                method:"post",
                url : "includes/Operate.php",
                data: {Po_id:Po_id},
                success: function(data){
                    alert(data);
                    location.reload();
            }
            })


        })



        $(document).on('click', '.recitem', function () {
            product_id_purchase_order = $(this).attr("id");
            PO_id_purchase_order = $(this).attr("name");
            Qty_purchase_order = $(this).attr("style");
            PoD_purchase_order = $(this).attr("about");
            $.ajax({
                method:"Post",
                url: "includes/Operate.php",
                data: {product_id_purchase_order:product_id_purchase_order,
                    PO_id_purchase_order:PO_id_purchase_order,
                    Qty_purchase_order:Qty_purchase_order,
                    PoD_purchase_order:PoD_purchase_order},
                success: function (data) {
                    alert(data);
                    location.reload();
                }
            })
            }
        )

        $(document).on('click','.Cancel', function () {
            cancel_po_id = $(this).attr("id");

            if(confirm("Are you sure you want to cancel purchase of Order " + cancel_po_id)==true){
            $.ajax({
                method:"post",
                url : "includes/Operate.php",
                data: {cancel_po_id:cancel_po_id},
                success: function(data){
                    alert(data);
                    location.reload();
                }
            })
            }
        })
    });

    </script>

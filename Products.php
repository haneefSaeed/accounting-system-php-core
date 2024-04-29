<!DOCTYPE html>
<html>
<?php
require_once("includes/classes.php");
$products = new AllPageContent();
$products->head("Products | " . COMPANY_NAME);
$products_func = new productsOperation();

$products->startSession("login.php");

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
        $products->main_menu();
        //$index->sec_menu();
        ?>

    </div>
</nav>


<div class="page">
      <!-- navbar-->
    <?php
    $products->navtop();
    ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Products       </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <h1 class="h1 display">Products            </h1>
          </header>
                <div class="row">

                <div class="col-lg-12 ">
                  <div class="card">
                      <div class="card-body float-right ">
                          <?php
                          $products_func->fetchProductsCategory();
                          ?>
                          <form class="form-inline float-right">

                                  <a href="includes/Operate.php?"  class="mr-3 btn btn-info"><i class="fa fa-print"></i> Print List</a>
                                  <a href="product_categories.php"  class="mr-3 btn btn-info"><i class="fa fa-cog"></i> Manage Categories</a>
                                  <button type="button" data-toggle="modal" data-target="#ProductModal" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Product </button>
                          </form>
                      </div>

                  </div>
              </div>

                    <div class="col-lg-12">
              <?php
                $products_func->ProductOperationResults();
              ?>
                    </div>


              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header">
                          <h4>List of Products</h4>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-hover" id="ProductTable">
                                  <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Unit Price <?php echo "(". $products->currency(). ")";?></th>
                                    <th>Category</th>
                                    <th>Supplier</th>
                                    <th>Unit Type</th>
                                    <th>Description</th>
                                    <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  if(isset($_GET['cat_id'])) {
                                      $c_id = $_GET['cat_id'];
                                      $products_func->fetchAllProducts($c_id);
                                  }
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
                <h5 id="ProductsModal" class="modal-title"> Add New Product</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Please fill the required fields.</p>
                <form method="post" class="form form-inner" action="includes/Operate.php">

                    <div class="form-group col-12">
                        <label>Product Name *</label>
                        <input type="text" placeholder="Product Name" required class="form-control" name="prod_name">
                    </div>

                    <div class="form-group col-12 ">
                        <label class="" >Unit Price <?php echo "(". $products->currency(). ")";?>*  </label>
                        <input type="number" placeholder="0.0<?php echo " ". $products->currency();?>" required class="form-control form-inline w-25" name="prod_price">

                    </div>

                    <div class="form-group col-12">
                        <label>Product Category *</label>
                        <select  name='prod_category' class='form-control' contenteditable="true">
                            <?php $products_func->fetchCategories(); ?>
                        </select>
                    </div>



                    <div class="form-group col-12">
                        <label>Unit Type</label>
                        <input type="text" placeholder="Unit type" class="form-control" name="prod_unit">
                    </div>

                    <div class="form-group col-10">
                        <label>Product Supplier *</label>
                        <select  name='prod_supplier' class='form-control'>
                            <?php $products_func->fetchSuppliers(); ?>
                        </select>
                    </div>

                    <div class="form-group col-12">
                        <label>Product Description</label>
                        <textarea name="prod_description" placeholder="Product Description" class="form-control"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" value="Save Product" name="prod_save" class="btn btn-primary">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>

    <div id="UpdateProduct"  tabindex="-1" role="dialog" aria-labelledby="Updateproduct" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="Updateproduct" class="modal-title">Update Product</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form  class="form .updateform">

                        <div class="form-group col-12">
                            <label>Product Name *</label>
                            <input type="text" placeholder="Product Name" required class="form-control" name="prod_name">
                        </div>

                        <div class="form-group col-12 ">
                            <label class="" >Unit Price <?php echo "(". $products->currency(). ")";?>*  </label>
                            <input type="number" placeholder="0.0<?php echo " ". $products->currency();?>" required class="form-control form-inline w-25" name="prod_price">

                        </div>

                        <div class="form-group col-12">
                            <label>Product Category *</label>
                            <select  name='prod_category' class='form-control' contenteditable="true">
                                <?php $products_func->fetchCategories(); ?>
                            </select>
                        </div>



                        <div class="form-group col-12">
                            <label>Unit Type</label>
                            <input type="text" placeholder="Unit type" class="form-control" name="prod_unit">
                        </div>

                        <div class="form-group col-10">
                            <label>Product Supplier *</label>
                            <select  name='prod_supplier' class='form-control'>
                                <?php $products_func->fetchSuppliers(); ?>
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label>Product Description</label>
                            <textarea name="prod_description" placeholder="Product Description" class="form-control"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" value="Save Product" name="prod_save" class="btn btn-primary">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>



    <?php
    if(isset($_GET['ship_upd_id'])){
$product_update_id = $_GET['ship_upd_id'];
echo $product_update_id;
$products_func->UpdateShipper(22);
    }
    //$products_func->UpdateShipper(25);

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
$products->footer();

?>

<script type="text/javascript">
    $('#ProductTable').dataTable();
    $(document).on('click', '.delete', function () {
        produ_del = $(this).attr("id");
        prod_del_name = $(this).attr("style");
        if(confirm(prod_del_name +"  will be deleted?")){
            $.ajax({
                method:"post",
                url:"includes/operate.php",
                data:{prod_del:produ_del,
                    prod_del_name:prod_del_name},
                success:function (data) {
                    alert(prod_del_name + data);
                    location.reload();
                }
            })
        }
    })

    $(document).on('click', '.update', function () {
        prod_upd_id = $(this).attr("id");
        $.ajax({
            dataType: "json",
            method:"post",
            url: "includes/operate.php",
            data:{prod_upd_id:prod_upd_id},
            success:function (data) {
                /*ID = data.cust_id;
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
                $('.cnote').val(Note);*/
                $('#UpdateProduct').modal("show");
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

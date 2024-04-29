<!DOCTYPE html>
<html>
<?php
require_once("includes/classes.php");
$allPO = new AllPageContent();
$allPO->head("All Purchase Orders | " . COMPANY_NAME);
$allPO_func = new purchaseOrderOperation();
$allPO->startSession("login.php");

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
        $allPO->main_menu();
        //$index->sec_menu();
        ?>

    </div>
</nav>


<div class="page">
    <!-- navbar-->
    <?php
    $allPO->navtop();
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
                           // $products_func->fetchProductsCategory();
                            ?>
                            <form class="form-inline float-right">

                                <a href="includes/Operate.php?"  class="mr-3 btn btn-info">Print List</a>
                                <a href="product_categories.php"  class="mr-3 btn btn-info">Manage Categories</a>
                                <button type="button" data-toggle="modal" data-target="#ProductModal" class="btn btn-primary">Add New Product </button>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12">
                    <?php
                    //$allPO_func->ProductOperationResults();
                    ?>
                </div>


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of Products</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Status</th>
                                        <th>Supplier</th>
                                        <th>Total Price<?php echo "(". $allPO->currency(). ")";?></th>
                                        <th>Submitted by</th>
                                        <th>Submitted Date</th>
                                        <th>Approved by</th>
                                        <th>Approved Date</th>
                                        <th>Date paid</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $allPO_func->fetchAllOrders();

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
                    <h5 id="ProductsModal" class="modal-title">Add New Product</h5>
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
                            <label class="" >Unit Price <?php echo "(". $allPO->currency(). ")";?>*  </label>
                            <input type="number" placeholder="0.0<?php echo " ". $allPO->currency();?>" required class="form-control form-inline w-25" name="prod_price">

                        </div>

                        <div class="form-group col-12">
                            <label>Product Category *</label>
                            <select  name='prod_category' class='form-control' contenteditable="true">
                                <?php $allPO_func->fetchCategories(); ?>
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
        $allPO_func->UpdateShipper(22);
    }
    //$products_func->UpdateShipper(25);

    ?>



    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p>Your company &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                    <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Bootstrapious</a></p>
                    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- JavaScript files-->
<?php
$allPO->footer();

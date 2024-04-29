<!DOCTYPE html>
<html>
<?php
require_once("includes/classes.php");
$category = new AllPageContent();
$category->head("Categories | " . COMPANY_NAME);
$category_func = new categories();

$category->startSession("login.php");

?>

<script>
    function confirm(){
        a = confirm("Are you sure you want to delete?");
        if(a){

        }
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
        $category->main_menu();
        //$index->sec_menu();
        ?>

    </div>
</nav>


<div class="page">
      <!-- navbar-->
    <?php
    $category->navtop();
    ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="products.php">Products</a></li>
              <li class="breadcrumb-item active">Products Categories       </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <h1 class="h1 display">Products Categories            </h1>
          </header>
                <div class="row">

                <div class="col-lg-12 ">
                  <div class="card">
                      <div class="card-body float-right ">

                          <form class="form-inline float-right">
                              <a href="products.php?cat_id=1"  class="mr-3 btn btn-info"><i class="fa fa-cog"></i> Manage Products</a>
                              <button type="button" data-toggle="modal" data-target="#CategoryModalDel" class="btn btn-danger"><i class="fa fa-minus-circle"></i> Delete Category </button> &nbsp;&nbsp; &nbsp;

                                  <button type="button" data-toggle="modal" data-target="#CategoryModal" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New Category </button>

                          </form>
                      </div>

                  </div>
              </div>

                    <div class="col-lg-12">
              <?php
                $category_func->CategoryOperationResults();

                ?>

                    </div>


              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header">
                          <h4>All Categories</h4>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-hover">
                                  <?php
                                  $category_func->fetchCategoriesList();
                                  ?>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
        </div>
      </section>




<!-- Modal New Shipper-->
<div id="CategoryModal"  tabindex="-1" role="dialog" aria-labelledby="CategorysModal" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="CategorysModal" class="modal-title">Add New Category</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Please fill the required fields.</p>
                <form method="post" class="form form-inner" action="includes/Operate.php">

                    <div class="form-group col-12">
                        <label>Category Name *</label>
                        <input type="text" placeholder="Category Name" required class="form-control" name="procat_name">
                    </div>

                    <div class="form-group col-12">
                        <label>Category Parent *</label>
                        <select name="procat_parent" class="form-control">
                            <option value="0" name="procat_parent">Root</option>
                            <?php
                               echo $category_func->fetchParentCategory();
                            ?>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" value="Save Category" name="procat_save" class="btn btn-primary">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>


    <div id="CategoryModalDel"  tabindex="-1" role="dialog" aria-labelledby="CategorysModalDel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="CategorysModalDel" class="modal-title">Delete Category</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p>Choose a category to delete.</p>
                    <form method="post" class="form form-inner" action="includes/Operate.php">

                        <div class="form-group col-12">
                            <label>Category Name *</label>
                            <select name="procat_item" class="form-control">
                                <?php
                                $pro = new productsOperation();
                                echo $pro->fetchCategories();

                                ?>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" value="Delete Category" name="procat_del" class="btn btn-danger">
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
$category_func->UpdateShipper(22);
    }
    //$category_func->UpdateShipper(25);

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
<script src="vendor/jquery/jquery.js">
   $("#searchCategory").addEventListener('check', getvalue);
   function getvalue(event)
   {
       event.preventDefault();
       id = $("#category").value();
       alert(id);
   })
    </script>
<?php
$category->footer();

<!DOCTYPE html>
<html>
<?php
require_once("includes/classes.php");
$index = new AllPageContent();
$index->head("Welcome to " . COMPANY_NAME);
$index->StartSession("login.php");

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
            $index->main_menu();
            //$index->sec_menu();
        ?>

    </div>
</nav>

<div class="page">
    <!-- navbar-->
    <?php
    $index->navtop();
    ?>
    <!-- Counts Section -->

    <section class="statistics mt-5">
        <div class="container-fluid">
            <div class="row d-flex">

               <div class="col-lg-8">
                   <div class="row mb-2">
                       <div class="col-lg-3">
                           <!-- Income-->
                           <div class="card income text-center">
                               <div class="icon"><i class="fa fa-user-circle"></i></div>
                               <div class="number"><?php
                                   echo $index->countTable("users");
                                   ?></div>
                               <strong class="text-primary"><a href="#">Employees</a></strong><br>

                           </div>
                       </div>

                       <div class="col-lg-3">
                           <!-- Income-->
                           <div class="card income text-center">
                               <div class="icon"><i class="fa fa-group"></i></div>
                               <div class="number"><?php
                                   echo $index->countTable("customer");
                                   ?></div>
                               <strong class="text-primary"><a href="customers.php">Customers</a></strong><br>

                           </div>
                       </div>

                       <div class="col-lg-3">
                           <!-- Income-->
                           <div class="card income text-center">
                               <div class="icon"><i class="fa fa-tags"></i></div>
                               <div class="number"><?php
                                   echo $index->countTable("products");
                                   ?></div>
                               <strong class="text-primary"><a  href="products.php">Products</a></strong><br>

                           </div>
                       </div>

                       <div class="col-lg-3">
                           <!-- Income-->
                           <div class="card income text-center">
                               <div class="icon"><i class="fa fa-truck"></i></div>
                               <div class="number"><?php
                                   echo $index->countTable("supplier");
                                   ?></div>
                               <strong class="text-primary"><a  href="supplier.php">Suppliers</a></strong><br>

                           </div>
                       </div>

                   </div>
                   <div class="row">
                       <div class="col-lg-12">
                           <div class="card text-left">
                               <div class="icon text-center"><h1 style="color:#333;"><i class="fa fa-bar-chart"></i> Inventory </h1></div>
                               <div class="card-body">
                                    <table class="table table-borderless table-hover">
                                        <tr>
                                            <th>Products</th>
                                            <th>Quantity Available</th>
                                            <th>Quantity Sold</th>
                                        </tr>
                                        <tr>
                                            <td>prod1</td>
                                            <td>12</td>
                                            <td>53</td>
                                        </tr><tr>
                                            <td>prod1</td>
                                            <td>12</td>
                                            <td>53</td>
                                        </tr><tr>
                                            <td>prod1</td>
                                            <td>12</td>
                                            <td>53</td>
                                        </tr>
                                    </table>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card project-progress">
                        <h2 class="display h4">Purchase orders & Sales Orders</h2>
                        <h6>Total <span style="color:green;"> <?php $allpurchase = $index->countPurchases();  echo $index->currency_symbol() . number_format($allpurchase); ?></span> was Purchased </h6>
                        <div class="pie-chart"> <!-- style = Sale, type is Buy , slot profit-->
                            <canvas id="pieChart" slot="" style="223333" type="<?php echo $index->countPurchases();?>" width="300" height="300"></canvas>
                        </div>
                        <a href="new_p_order.php" class="btn btn-success mt-5"><?php echo $index->countPurchaseOrders() ;?> Purchase Orders </a>
                        <a href="new_S_order.php" class="btn btn-info mt-2">Go to Sales Orders</a>
                    </div>

                </div>


                <!--<div class="col-lg-4">
                    <!-- Monthly Usage--
                    <div class="card data-usage">
                        <h2 class="display h4">Monthly Usage</h2>
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-6">
                                <div id="progress-circle"
                                     class="d-flex align-items-center justify-content-center"></div>
                            </div>
                            <div class="col-sm-6"><strong class="text-primary">80.56 Gb</strong><small>Current
                                    Plan</small><span>100 Gb Monthly</span></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- User Actibity--
                    <div class="card user-activity">
                        <h2 class="display h4">User Activity</h2>
                        <div class="number">210</div>
                        <h3 class="h4 display">Social Users</h3>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                 aria-valuemax="100" class="progress-bar progress-bar bg-primary"></div>
                        </div>
                        <div class="page-statistics d-flex justify-content-between">
                            <div class="page-statistics-left"><span>Pages Visits</span><strong>230</strong></div>
                            <div class="page-statistics-right"><span>New Visits</span><strong>73.4%</strong></div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </section>


    <!-- Header Section-->
    <section class="dashboard-header section-padding mt-4">
        <div class="container-fluid">
            <div class="row d-flex align-items-md-stretch">
                <!-- To Do List-->
               <!-- <div class="col-lg-3 col-md-6">
                    <div class="card to-do">
                        <h2 class="display h4">To do List</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <ul class="check-lists list-unstyled">
                            <li class="d-flex align-items-center">
                                <input type="checkbox" id="list-1" name="list-1" class="form-control-custom">
                                <label for="list-1">Similique sunt in culpa qui officia</label>
                            </li>
                            <li class="d-flex align-items-center">
                                <input type="checkbox" id="list-2" name="list-2" class="form-control-custom">
                                <label for="list-2">Ed ut perspiciatis unde omnis iste</label>
                            </li>
                            <li class="d-flex align-items-center">
                                <input type="checkbox" id="list-3" name="list-3" class="form-control-custom">
                                <label for="list-3">At vero eos et accusamus et iusto </label>
                            </li>
                            <li class="d-flex align-items-center">
                                <input type="checkbox" id="list-4" name="list-4" class="form-control-custom">
                                <label for="list-4">Explicabo Nemo ipsam voluptatem</label>
                            </li>
                            <li class="d-flex align-items-center">
                                <input type="checkbox" id="list-5" name="list-5" class="form-control-custom">
                                <label for="list-5">Similique sunt in culpa qui officia</label>
                            </li>
                            <li class="d-flex align-items-center">
                                <input type="checkbox" id="list-6" name="list-6" class="form-control-custom">
                                <label for="list-6">At vero eos et accusamus et iusto </label>
                            </li>
                            <li class="d-flex align-items-center">
                                <input type="checkbox" id="list-7" name="list-7" class="form-control-custom">
                                <label for="list-7">Similique sunt in culpa qui officia</label>
                            </li>
                            <li class="d-flex align-items-center">
                                <input type="checkbox" id="list-8" name="list-8" class="form-control-custom">
                                <label for="list-8">Ed ut perspiciatis unde omnis iste</label>
                            </li>
                        </ul>
                    </div>
                </div>-->
                <!-- Pie Chart-->

                <!-- Line Chart -->

            </div>
        </div>
    </section>
    <!-- Statistics Section-->

    <!-- Updates Section -->

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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper.js/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/charts-home.js"></script>
<!-- Main File-->
<script src="js/front.js"></script>
</body>
</html>
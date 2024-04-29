<?php
class msql{
    private $con;
    public function connect()
    {
        require_once("config.php");
        $this->con = new mysqli(SERVER, DB_USER, DB_PASS, DB_DB);
        if($this->con){
           return $this->con;
        }
        return "DATABASE_CONNECT_ERROR: ". $this->con->connect_error;
    }
}

class AllPageContent
{
    private $con;

    function __construct()
    {
        $db = new msql();
        $this->con = $db->connect() or die("Connection error" . $this->con->connect_error);
    }

    public function head($title)
    {
        echo <<<_HEAD
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>$title</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font 
    Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    
    
<link rel="stylesheet" href="css/tail.select-default.css">    

<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">     
    
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
_HEAD;

    }

    public function footer()
    {
        echo <<<_FOOTER
<script src="vendor/jquery/jquery.min.js"></script>

<script src="js/tail.select.js"></script>
<script src="js/tail.select-full.js"></script>

<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>


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

_FOOTER;

    }

    public function navtop()
    {
        echo <<<_NAVTOP
     <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i
                                    class="icon-bars"> </i></a><a href="index.php" class="navbar-brand">
                            <div class="brand-text d-none d-md-inline-block"> <strong class="text-primary">
_NAVTOP;
       echo COMPANY_NAME;
        echo <<<_NAVTOP

</strong><span> Finance System </span>
                               </div>
                        </a></div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <!-- Notifications dropdown-->
                        <!-- Messages dropdown-->
                        <li class="nav-item dropdown"><a href="mail.php"
                                                          class="nav-link"><i
                                        class="fa fa-envelope"></i> &nbsp;Quick Email</a>
                            <li class="nav-item dropdown"><a href="settings.php"
                                                          class="nav-link"><i
                                        class="fa fa-cog"></i> &nbsp;Settings</a>
                         </li>
                        <!-- Languages dropdown    -->
                        <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#"
                                                         data-toggle="dropdown" aria-haspopup="true"
                                                         aria-expanded="false"
                                                         class="nav-link language dropdown-toggle"><img
                                        src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                            <ul aria-labelledby="languages" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/DE.png"
                                                                                           alt="English"
                                                                                           class="mr-2"><span>German</span></a>
                                </li>
                                <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/FR.png"
                                                                                           alt="English"
                                                                                           class="mr-2"><span>French                                                         </span></a>
                                </li>
                            </ul>
                        </li>
                        <!-- Log out-->
                        <li class="nav-item"><a  href="includes/Operate.php?logout"class="nav-link logout"><?php ?> <span
                                        class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
_NAVTOP;

    }

    public function main_menu()
    {

        echo <<<_MENU
<div class="main-menu">
    <h5 class="sidenav-heading">Main</h5>
    <ul id="side-main-menu" class="side-menu list-unstyled">
        <li><a href="index.php"> <i class="icon-home"></i>Home </a></li>
        <li><a href="customers.php"> <i class="icon-user"></i>Customers </a></li>
        <li><a href="Supplier.php"> <i class="fa fa-support"></i>Suppliers </a></li>
        <li><a href="Shippers.php"> <i class="fa fa-plane"></i>Shippers </a></li>
        
        
        <li><a href="#productDD" aria-expanded="false" data-toggle="collapse"> <i
                    class="fa fa-tag"></i>Products</a>
            <ul id="productDD" class="collapse list-unstyled ">
                <li><a href="products.php?cat_id=1">Manage Products</a></li>
                <li><a href="product_categories.php">Manage Categories</a></li>
                
            </ul>
        </li>
        
        <li><a href="inventory.php"> <i class="fa  fa-archive"></i>Inventory </a></li>
        
        
        <li><a href="#PurchaseOrderDD" aria-expanded="false" data-toggle="collapse"> <i
                    class="fa fa-sticky-note-o"></i>Purchase Orders</a>
            <ul id="PurchaseOrderDD" class="collapse list-unstyled ">
                <li><a href="new_p_order.php">New Purchase Order</a></li>
                <li><a href="View_all_po.php">View All Purchase Orders</a></li>
            </ul>
        </li>
        
        <li><a href="#customerOrderDD" aria-expanded="false" data-toggle="collapse"> <i
                    class="fa fa-sticky-note"></i>Customer Orders</a>
            <ul id="customerOrderDD" class="collapse list-unstyled ">
                <li><a href="new_order.php">New Customer Order</a></li>
                <li><a href="#">View All Customer Orders</a></li>
                <li><a href="#">View Invoices</a></li>
            </ul>
        </li>
        
        <li><a href="register.php"> <i class="fa fa-user"></i>Register Users </a></li>
        <!--<li><a href="#"> <i class="icon-mail"></i>Demo
                <div class="badge badge-warning">6 New</div>
            </a></li>-->
    </ul>
</div>
_MENU;


    }

    public function sec_menu()
    {
        echo <<<_MENU
<div class="admin-menu">
            <h5 class="sidenav-heading">Second menu</h5>
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li><a href="#"> <i class="icon-screen"> </i>Demo</a></li>
                <li><a href="#"> <i class="icon-flask"> </i>Demo
                        <div class="badge badge-info">Special</div>
                    </a></li>
                <li><a href=""> <i class="icon-flask"> </i>Demo</a></li>
                <li><a href=""> <i class="icon-picture"> </i>Demo</a></li>
            </ul>
        </div>
_MENU;


    }

    public function StartSession($location)
    {
        session_start();
        if (!isset($_SESSION['sess_email'])) {
            header("location:$location");
        }
    }

    public function countTable($table)
    {
        $pro_no = $this->con->prepare("SELECT COUNT(*) AS 'counter' FROM $table");
        $pro_no->execute() or die("Error: " . $this->con->error);
        $res = $pro_no->get_result();
        while ($count = $res->fetch_assoc()) {
            $counter = $count['counter'];
        }
        return $counter;

    }

    public function countPurchases(){
            $price = $this->con->prepare("SELECT * FROM po_details;");
            $price->execute();
            $sum = $price->get_result();
            $All = 0;
            while($total = $sum->fetch_assoc()){
                $Qty = $total['pod_quantity'];
                $UP = $total['pod_unit_cost'];
                $CALC = $Qty *$UP;
                $All+=$CALC;
            }
            return $All ;

    }
    public function countPurchaseOrders(){
            $price = $this->con->prepare("SELECT COUNT(po_id) as 'total' from purchase_orders");
            $price->execute();
            $sum = $price->get_result();
            while($total = $sum->fetch_assoc()){
               return $total['total'];
            }

    }

    public function selector(){
        echo <<<_SELECTOR

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        tail.select(".selector",{
            search:true,
            searchMarked: false,
            sortItems:true,
            multiple:false,

        });
    })
</script>
_SELECTOR;

    }

    public function currency()
    {
        require_once("config.php");
        return CURRENCY;
    }
    public function currency_symbol()
    {
        require_once("config.php");
        return CUR_SYMB;
    }
    public function fetchSetting(){
        //Set_Company_name , // Set_Currency , //Set_Currency_Symbol

        $q = $this->con->prepare("SELECT * FROM SETTINGS") OR die($this->con->error);
        $q->execute();
        $res = $q->get_result();
        foreach($res as $set){
            echo '<form id="settingsForm" method="post" action="Operate.php">';
            echo '<div class="form-group">';
            echo '<label>Company Name: </label>';
    echo '<input type="text" class="form-control" required name="comp_name" placeholder="Company Name" value="'.$set["Set_Company_name"].'">';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label>Currency: </label>';
    echo '<input type="text" class="form-control" required name="comp_currency" placeholder ="currency" value="'.$set["Set_Currency"].'">';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<label>Currency Symbol: </label>';
    echo '<input type="text" class="form-control" required name="comp_currency_symbol" placeholder = "currency symbol"value="'.$set["Set_Currency_Symbol"].'">';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<button type="submit" class="btn btn-success" ><i class="fa fa-upload"></i> Update Info</button>';
            echo '</div>';
    echo '</form>';

        }

    }
    public function UpdateSettings($comp, $curr, $curs){
        $q = $this->con->prepare("UPDATE `settings` SET `Set_Company_name`=$comp,`Set_Currency`=$curr,`Set_Currency_Symbol`= $curs WHERE Set_id = 1") or die($this->con->error);
        $q->execute();

    }
    public function AdminSession($location)
    {
        session_start();
        if (!isset($_SESSION['sess_email']) || $_SESSION['sess_type']=="User") {
            header("location:$location");
        }
    }
}

function currency_symbol()
{
    require_once("config.php");
    return CUR_SYMB;
}

class UserOperation{
    private $con;
    function __construct()
    {
        // Creating Database Object
        $db = new msql();
        $this->con = $db->connect() or die("Connection Error");
    }

    private function email_exist($email){
    $pre_stmt = $this->con->prepare("SELECT USER_ID FROM USERS WHERE USER_EMAIL = ?");
    $pre_stmt->bind_param("s", $email);
    $pre_stmt->execute() or die("Error:: ". $this->con->error);
    $res = $pre_stmt->get_result();
    if($res->num_rows > 0){
        return true;
    }else return false;
}
    public function registerForms(){
        echo <<<_REGFORM

        <div class="form-inner">
            <div class="logo text-uppercase"><span>Register</span><strong class="text-primary">Accounting</strong></div>
            <p>You can register your new account into the system by filling the following form, if you need any help please contact admin.</p>
            <form class="text-left form-validate" method="post" id="reg_form">
              <div class="form-group-material">
                <input id="register-username" type="text" name="reg_username" required data-msg="Please enter your username" class="input-material">
                <label for="register-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="register-email" type="email" name="reg_email" required data-msg="Please enter a valid email address" class="input-material">
                <label for="register-email" class="label-material">Email Address      </label>
              </div>
              <div class="form-group-material">
                <input id="register-password" type="password" name="reg_password" required data-msg="Please enter your password" class="input-material">
                <label for="register-password" class="label-material">Password        </label>
              </div>
              <div class="form-group-material">
                <input id="register-cpassword" type="password" name="reg_confirm" required data-msg="Please Confirm Your password" class="input-material">
                <label for="register-password" class="label-material">Password        </label>
              </div>
  
              <div class="form-group terms-conditions text-center">
                <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Your agreement is required" class="form-control-custom">
                <label for="register-agree">I agree with the terms and policy</label>
              </div>
              <div class="form-group text-center">
                <input id="register" type="submit" value="Register" name="Reg_Register" class="btn btn-primary">
              </div>
            </form><small>Already have an account? </small><a href="login.php" class="signup">Login</a>
          </div>
_REGFORM;

    }
    public function reg_register()
    {
        if(isset($_POST['Reg_Register'])){
            if($this->email_exist($_POST['reg_email'])){
                header("location:register.php?email_exist");
            }else{
                $username = $_POST['reg_username'];
                $email = $_POST['reg_email'];
                $password = password_hash($_POST['reg_password'], PASSWORD_BCRYPT, ["cost"=>6]);
                $date = date("Y-m-d");
                $type = "user";
                $pre_stmt = $this->con->prepare("INSERT INTO `users`(`User_Id`, `User_Name`, `User_Email`, `User_Password`, `User_type`, `User_Register_Date`, `User_Last_Login`) VALUES (user_id,?,?,?,?,?,?)");
                $pre_stmt->bind_param("ssssss", $username, $email, $password,$type, $date, $date);
                $register_user = $pre_stmt->execute() or die("Error" . $this->con->error);
                    if($register_user){
                        $this->con->insert_id;
                    }else{
                        die("ERROR: " . $this->con->error);
                    }
            }
        }

    }
    public function lg_login(){
    if(isset($_POST['lg_login'])) {

        $All_Users = $this->con->prepare("SELECT * FROM USERS WHERE USER_EMAIL = ? ");
        $All_Users->bind_param("s", $_POST['lg_email']);
        $All_Users->execute();
        $res = $All_Users->get_result();

        while($user = $res->fetch_assoc())
        {

            if(password_verify( $_POST['lg_password'], $user['User_Password']))
            {
                $_SESSION['sess_user'] = $user['User_Name'];
                $_SESSION['sess_email'] = $user['User_Email'];
                $_SESSION['sess_last_login'] = $user['User_Last_Login'];
                $_SESSION['sess_id'] = $user['User_Id'];
                $_SESSION['sess_type'] = $user['User_type'];
                $date = date("Y-m-d h:i:s");
                $update = $this->con->query("update users set User_Last_Login = '$date' where User_Email = '".$_POST['lg_email']. "'") or die("error : ". $this->con->error);
                return true;
            }
            else return false;
        }

    }
}
    public function loginForm($title, $desc){
        echo <<<_LOGIN
          <div class="form-inner">
            <div class="logo text-uppercase"><span>Login</span><strong class="text-primary">$title</strong></div>
            <p>$desc</p>
            <form method="post" class="text-left form-validate">
              <div class="form-group-material">
                <input id="login-email" type="email" name="lg_email"  data-msg="Please enter your Email Address" class="input-material">
                <label for="login-email" class="label-material">Email</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="lg_password"  data-msg="Please enter your password" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
_LOGIN;
        if(isset($_REQUEST['lg_login'])){
            if ($this->lg_login()) {
                session_start();
                header("location:index.php");
            } else echo "<div class='alert alert-danger'>Email or password is wrong!</div>";

        }
        if(isset($_GET['success'])){
            echo "<div class='alert alert-danger'>Please Login to continue.</div>";}
        echo <<<_LOGIN
              <div class="form-group text-center"><input type="submit" name="lg_login" class="btn btn-primary"  value="login"></a>
                
              </div>
            </form><a href="#" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a>
          </div>
_LOGIN;
        $this->lg_login();
    }
}
class SupplierOperation{
    public function SupplierOperationResults(){
        if(isset($_GET['msg_id']) && $_GET['msg_id']==11){
            echo '<div class="alert alert-success">Record Saved successfully</div>';
        } elseif (isset($_GET['msg_id']) && $_GET['msg_id']==12){
            echo '<div class="alert alert-danger"><b>'.$_GET['name'].'</b> record has been deleted</div>';
        }
    }
    private $con;
    public function SaveSupplier(){
        //get all the inputs
        //run insert query
        //pass true
        $name = $_POST['sup_name'];
        $email = $_POST['sup_email'];
        $job = $_POST['sup_job'];
        $phone = $_POST['sup_phone'];
        $add = $_POST['sup_add'];
        $note = $_POST['sup_note'];
        $company = $_POST['sup_company'];
        $prestat = $this->con->prepare("INSERT INTO `Supplier` VALUES (supplier_id, ?,?,?,?,?,?,?)");
        $prestat->bind_param("ssissss", $name, $email, $phone, $job, $company, $add, $note) or die("Bind Error: " . $this->con->error);
        $insert = $prestat->execute();
        if($insert){
            return true;
        }
        else{
            return false;
        }

    }
    function __construct()
    {
        $db = new msql();
        $this->con = $db->connect() or die ("Error: " . $this->con->connect_error);
    }
    public function fetchAllSuppliers(){
        $fetch = $this->con->query("SELECT * FROM Supplier");

        while($data = $fetch->fetch_assoc()){
            echo "<tr>";
            echo "<td>". $data['supplier_id']."</td>";
            echo "<td>". $data['supplier_name']."</td>";
            echo "<td>". $data['supplier_email']."</td>";
            echo "<td>". $data['supplier_phone']."</td>";
            echo "<td>". $data['supplier_company']."</td>";
            echo "<td>". $data['supplier_job']."</td>";
            echo "<td>". $data['supplier_address']."</td>";
            echo "<td>". $data['supplier_note']."</td>";
            echo "<td><a href='includes/Operate.php?sup_del=". $data['supplier_id']."&name=".$data['supplier_company']."' onclick='confirm()' class='btn btn-sm btn-outline-danger fa fa-minus-square'></a> <a class='btn btn-sm btn-outline-info fa fa-plus-square' data-toggle='modal' data-target='#SupplierUpdate' ></a></td>";
            echo "</tr>";
        }
    }
    public function DeleteSupplier($id){
        $prestat = $this->con->prepare("DELETE FROM SUPPLIER WHERE SUPPLIER_ID = ?");
        $prestat->bind_param("s", $id);
        $prestat->execute();
        if($prestat->execute()){
            return true;
        }return false;
    }
    public function UpdateSupplier($id){
        $fetch = $this->con->query("SELECT * FROM CUSTOMER where customer_id = $id");
        while($data = $fetch->fetch_assoc()) {
            $name = $data['customer_name'];
            $email = $data['customer_email'];
            $job = $data['customer_job'];
            $phone = $data['customer_phone'];
            $add = $data['customer_address'];
            $note = $data['customer_note'];
            echo <<<_CUSTOMER_UPDATE_MODAL
<div id="CustomerUpdate"  tabindex="-1" role="dialog" aria-labelledby="CustomersUpdate" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="CustomersUpdate" class="modal-title">Update Customer</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p>Please fill the required fields.</p>
                    <form method="post" action="includes/Operate.php?cust_update=$id">
                        <div class="form-group">
                            <label>Customer Name *</label>
                            <input type="text" placeholder="Customer Name" required class="form-control" value="$name" name="cust_name">
                        </div>
                        <div class="form-group">
                            <label>Customer Email *</label>
                            <input type="email" placeholder="Customer Email" required class="form-control" value="$email" name="cust_email">
                        </div>
                        <div class="form-group">
                            <label>Customer Job Title</label>
                            <input type="text" placeholder="Job Title" class="form-control" value="$job" name="cust_job">
                        </div>

                        <div class="form-group">
                            <label>Customer Phone Number *</label>
                            <input type="text" placeholder="Customer Phone Number" required class="form-control" value="$phone" name="cust_phone">
                        </div>
                        <div class="form-group">
                            <label>Customer Address</label>
                            <input type="text" placeholder="Customer Address" class="form-control" value="$add" name="cust_add">
                        </div>
                        <div class="form-group">
                            <label>Notes</label>
                            <input type="text" placeholder="Job Title" class="form-control" value="$note" name="cust_note">
                        </div>


                </div>
                <div class="modal-footer">
                    <input type="submit" value="Update Customer Detail" name="cust_update" class="btn btn-primary">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>
_CUSTOMER_UPDATE_MODAL;
        }
    }
}
class CustomerOperation{
    private $con;
    function __construct()
    {
        $db = new msql();
        $this->con = $db->connect() or die ("Error: " . $this->con->connect_error);
    }
    public function SaveCustomer()
    {
        //get all the inputs
        //run insert query
        //pass true
        $name = $_POST['cust_name'];
        $email = $_POST['cust_email'];
        $job = $_POST['cust_job'];
        $phone = $_POST['cust_phone'];
        $add = $_POST['cust_add'];
        $note = $_POST['cust_note'];
        $prestat = $this->con->prepare("INSERT INTO `customer`(`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_job`, `customer_address`, `customer_note`) VALUES (customer_id, ?,?,?,?,?,?)");
        $prestat->bind_param("ssisss", $name, $email, $phone, $job, $add, $note) or die("Bind Error: " . $this->con->error);
        $insert = $prestat->execute();
        if ($insert) {
            return true;
        } else {
            return false;
        }

    }
    public function fetchAllCustomers(){
        $fetch = $this->con->query("SELECT * FROM CUSTOMER");

        while($data = $fetch->fetch_assoc()){
            echo "<tr>";
                echo "<td>". $data['customer_id']."</td>";
                echo "<td>". $data['customer_name']."</td>";
                echo "<td>". $data['customer_email']."</td>";
                echo "<td>". $data['customer_phone']."</td>";
                echo "<td>". $data['customer_job']."</td>";
                echo "<td>". $data['customer_address']."</td>";
                echo "<td>". $data['customer_note']."</td>";
                echo "<td>
    <button type='button' class='btn btn-xs btn-danger delete' id='".$data['customer_id']."' style='".$data['customer_name']."' ><i class='fa fa-minus'></i></button>"
. " <button type='button' class='btn btn-xs btn-info update' id='".$data['customer_id']."'><i class='fa fa-plus'></i></button></td>";
            echo "</tr>";
        }
    }
    public function DeleteCustomer($id){
        $prestat = $this->con->prepare("DELETE FROM CUSTOMER WHERE CUSTOMER_ID = ?");
        $prestat->bind_param("s", $id);
        $prestat->execute();
        if($prestat->execute()){
            print DELETE_SUCCESS;
        }else print OPERATION_ERROR;
    }
    public function UpdateCustomer($id){
        $fetch = $this->con->query("SELECT * FROM CUSTOMER where customer_id = $id");
        while($data = $fetch->fetch_assoc()) {
            $ar['cust_id'] = $data['customer_id'];
            $ar['cust_name'] = $data['customer_name'];
            $ar['cust_email'] = $data['customer_email'];
            $ar['cust_job'] = $data['customer_job'];
            $ar['cust_phone'] = $data['customer_phone'];
            $ar['cust_add'] = $data['customer_address'];
            $ar['cust_note'] = $data['customer_note'];
        }
        return $ar;
    }
    public function UpdateCustomerInfo($id, $name, $email, $job, $phone, $add, $note){

       $insert = $this->con->prepare("UPDATE `customer` SET `customer_name`= ? , `customer_email`= ? ,`customer_phone`=? ,`customer_job`=? ,`customer_address`=? ,`customer_note`=? WHERE customer_id = ?") or die($this->con->error);
       $insert->bind_param("ssisssi", $name, $email, $phone, $job, $add, $note, $id);
       $insert->execute();
       $res = $insert->get_result();
        if($res){
            echo $name . " Has been Updated";
        }

    }
}
class ShipperOperation{
    private $con;
    function __construct()
    {
        $db = new msql();
        $this->con = $db->connect() or die ("Error: " . $this->con->connect_error);
    }
    public function SaveShipper(){
        //get all the inputs
        //run insert query
        //pass true
        $name = $_POST['ship_name'];
        $email = $_POST['ship_email'];
        $job = $_POST['ship_job'];
        $phone = $_POST['ship_phone'];
        $add = $_POST['ship_add'];
        $note = $_POST['ship_note'];
        $company = $_POST['ship_company'];
        $prestat = $this->con->prepare("INSERT INTO `Shipper` VALUES (shipper_id, ?,?,?,?,?,?,?)");
        $prestat->bind_param("ssssiss", $company, $name, $email, $job, $phone, $add, $note) or die("Bind Error: " . $this->con->error);
        $insert = $prestat->execute();
        if($insert){
            return true;
        }
        else{
            return false;
        }

    }
    public function ShipperOperationResults(){
        if(isset($_GET['msg_id']) && $_GET['msg_id']==21){
            echo '<div class="alert alert-success">Record Saved successfully</div>';
        } elseif (isset($_GET['msg_id']) && $_GET['msg_id']==22){
            echo '<div class="alert alert-danger"><b>'.$_GET['name'].'</b> record has been deleted</div>';
        }
    }
    public function fetchAllShippers(){
        $fetch = $this->con->query("SELECT * FROM shipper");

        while($data = $fetch->fetch_assoc()){
            echo "<tr>";
                echo "<td>". $data['shipper_id']."</td>";
                echo "<td>". $data['shipper_company']."</td>";
                echo "<td>". $data['shipper_name']."</td>";
                echo "<td>". $data['shipper_email']."</td>";
                echo "<td>". $data['shipper_phone']."</td>";
                echo "<td>". $data['shipper_job']."</td>";
                echo "<td>". $data['shipper_address']."</td>";
                echo "<td>". $data['shipper_note']."</td>";
                echo "<td><a href='includes/Operate.php?ship_del=". $data['shipper_id']."&name=".$data['shipper_company']."' onclick='confirm()' class='btn btn-sm btn-outline-danger fa fa-minus-square'></a> <a class='btn btn-sm btn-outline-info fa fa-plus-square' data-toggle='modal' data-target='#ShipperUpdate' ></a></td>";
            echo "</tr>";
        }
    }
    public function DeleteShipper($id){
        $prestat = $this->con->prepare("DELETE FROM shipper WHERE shipper_ID = ?");
        $prestat->bind_param("s", $id);
        $prestat->execute();
        if($prestat->execute()){
            return true;
        }return false;
    }
    public function UpdateShipper($id){
        $fetch = $this->con->query("SELECT * FROM CUSTOMER where customer_id = $id");
        while($data = $fetch->fetch_assoc()) {
            $name = $data['customer_name'];
            $email = $data['customer_email'];
            $job = $data['customer_job'];
            $phone = $data['customer_phone'];
            $add = $data['customer_address'];
            $note = $data['customer_note'];
            echo <<<_CUSTOMER_UPDATE_MODAL
<div id="ShipperUpdate"  tabindex="-1" role="dialog" aria-labelledby="ShippersUpdate" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="ShippersUpdate" class="modal-title">Update Customer</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p>Please fill the required fields.</p>
                    <form method="post" action="includes/Operate.php?ship_update=$id">
                        <div class="form-group">
                            <label>Customer Name *</label>
                            <input type="text" placeholder="Shipper Name" required class="form-control" value="$name" name="ship_name">
                        </div>
                        <div class="form-group">
                            <label>Customer Email *</label>
                            <input type="email" placeholder="Customer Email" required class="form-control" value="$email" name="cust_email">
                        </div>
                        <div class="form-group">
                            <label>Customer Job Title</label>
                            <input type="text" placeholder="Job Title" class="form-control" value="$job" name="cust_job">
                        </div>

                        <div class="form-group">
                            <label>Customer Phone Number *</label>
                            <input type="text" placeholder="Customer Phone Number" required class="form-control" value="$phone" name="cust_phone">
                        </div>
                        <div class="form-group">
                            <label>Customer Address</label>
                            <input type="text" placeholder="Customer Address" class="form-control" value="$add" name="cust_add">
                        </div>
                        <div class="form-group">
                            <label>Notes</label>
                            <input type="text" placeholder="Job Title" class="form-control" value="$note" name="cust_note">
                        </div>


                </div>
                <div class="modal-footer">
                    <input type="submit" value="Update Customer Detail" name="cust_update" class="btn btn-primary">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>
_CUSTOMER_UPDATE_MODAL;
        }
    }
}
class productsOperation{
    private $con;
    function __construct()
    {
        $db = new msql;
        $this->con = $db->connect() or die("Error Connecting : " . $this->con->connect_error);
    }

    public function setGlobalFKC($mode){
        switch($mode){
            case 0 : {return $disable = $this->con->query('SET GLOBAL FOREIGN_key_checks = 0;');} break;
            case 1 : {return $enable = $this->con->query('SET GLOBAL FOREIGN_key_checks = 1;');} break;
            default: {return "INVALID!";}
        }
    }
    public function fetchProductsCategory()
                {
                    $fetchCategory = $this->con->prepare("SELECT * FROM PRO_CATEGORY");
                    $fetchCategory->execute();
                    $AllCategory = $fetchCategory->get_result();
                    echo "<form method='post' action='includes/Operate.php'>";
                    echo "Category : <select  name='product_categories' class='form-control d-inline w-25'>";
                    while($cat = $AllCategory->fetch_assoc()){
                        if($cat['category_parent_id']==0) {
                            echo "<option name='product_categories' style='font-weight: bold' value='".$cat['category_id']."'>" . $cat['category_name'] . "</option>";
                            $q = $this->con->query("Select * from pro_category where category_parent_id =". $cat['category_id']);
                            while($sub = $q->fetch_assoc())
                            {
                                echo "<option name='product_categories' value='".$sub['category_id']."'>". $sub['category_name'] . "</option>";
                            }
                        }

        }echo "</select>";
            echo "     <input type='submit' value='Search' class='btn btn-dark'>";
            echo "</form>";

            if(isset($_POST['product_categories'])) {
                $cat_id = $_POST['product_categories'];
                return $cat_id;
            }

    }
    public function fetchCategories()
    {
        $fetchCategory = $this->con->prepare("SELECT * FROM PRO_CATEGORY");
            $fetchCategory->execute();
            $AllCategory = $fetchCategory->get_result();
           while($cat = $AllCategory->fetch_assoc()){
            if($cat['category_parent_id']==0 && $cat['category_id']!=1   ) {
                echo "<option style='font-weight: bold' value='".$cat['category_id']."'>" . $cat['category_name'] . "</option>";
                $q = $this->con->query("Select * from pro_category where category_parent_id =". $cat['category_id']);
                while($sub = $q->fetch_assoc())
                {
                    echo "<option value='".$sub['category_id']."'>". $sub['category_name'] . "</option>";
                }
            }

        }

    }
    public function fetchSuppliers()
    {
        $fetchSupplier = $this->con->prepare("SELECT * FROM supplier");
            $fetchSupplier->execute();
            $AllSuppliers = $fetchSupplier->get_result();
           while($sup = $AllSuppliers->fetch_assoc())
           {
                echo "<option value='".$sup['supplier_id']."'>" . $sup['supplier_company'] . "</option>";
           }

    }
    public function fetchAllProducts($cid){
        $gc = new AllPageContent();
        $cat_id = $cid;
        $findId = $this->con->prepare("SELECT * FROM pro_category where category_id = ? or category_parent_id = ?");
        $findId->bind_param("ii", $cat_id, $cat_id);
        $findId->execute();
        $res = $findId->get_result();
        while($sbid = $res->fetch_assoc()) {
            if($sbid['category_id']==1) {
                $prep = $this->con->query("SELECT * FROM PRODUCTs");
            }else{
                $prep = $this->con->query("SELECT * FROM PRODUCTs WHERE PRODUCT_CATEGORY_ID IN(" . $sbid['category_id'] . ")");
            }
        //$prep->bind_param("a", $sbid);
        //$prep->execute();
        //$products = $prep->get_result();
        while ($pro = $prep->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $pro['product_id'] . "</td>";
            echo "<td>" . $pro['product_name'] . "</td>";
            echo "<td>" . $gc->currency_symbol() . number_format($pro['product_price']) ."</td>";
            $pci = $pro['product_category_id'];

            $findcatname = $this->con->query("SELECT CATEGORY_NAME FROM PRO_CATEGORY WHERE CATEGORY_ID = $pci ");
            if($findcatname->num_rows>0) {
                while ($can = $findcatname->fetch_assoc()) {
                    echo "<td>" . $can['CATEGORY_NAME'] . "</td>";
                }
            }
            $psi = $pro['product_supplier_id'];
            $findsuppname = $this->con->query("SELECT Supplier_company FROM supplier WHERE supplier_id = $psi");
            if($findsuppname->num_rows>0) {
                while ($sn = $findsuppname->fetch_assoc()) {
                    echo "<td>" . $sn['Supplier_company'] . "</td>";
                }
            }
            echo "<td>" . $pro['product_unit'] . "</td>";
            echo "<td>" . $pro['product_description'] . "</td>";
            echo "<td>
    <button type='button' class='btn btn-xs btn-danger delete' id='".$pro['product_id']."' style='".$pro['product_name']."' ><i class='fa fa-minus'></i></button>"
                . " <button type='button' class='btn btn-xs btn-info update' id='".$pro['product_id']."'><i class='fa fa-plus'></i></button></td>";
            echo "</tr>";
        }}
    }
    public function deleteProduct($id){
        $this->setGlobalFKC(0);
        $prestat = $this->con->prepare("DELETE FROM PRODUCTS WHERE product_id = ?") or die($this->con->error);
        $prestat->bind_param("i", $id);
        $prestat->execute() or die($this->con->error);
        if($prestat->execute()){
            print DELETE_SUCCESS;
        }else print OPERATION_ERROR;
        $this->setGlobalFKC(1);
    }
    public function SaveProduct(){
        $name = $_POST['prod_name'];
        $price = $_POST['prod_price'];
        $cat = $_POST['prod_category'];
        $unit = $_POST['prod_unit'];
        $desc = $_POST['prod_description'];
        $supplier = $_POST['prod_supplier'];

        $prestate = $this->con->prepare("INSERT INTO PRODUCTS VALUES(product_id, ?,?,?,?,?,?)");
        $prestate->bind_param("siiiss", $name, $price,$supplier, $cat, $unit, $desc);
        $prestate->execute();
        if($prestate){
            return true;
        }
        else{
            return false;
        }
    }
    public function ProductOperationResults(){
        if(isset($_GET['msg_id']) && $_GET['msg_id']==31){
            echo '<div class="alert alert-success">Record Saved successfully</div>';
        } elseif (isset($_GET['msg_id']) && $_GET['msg_id']==32){
            echo '<div class="alert alert-danger"><b>'.$_GET['name'].'</b> record has been deleted</div>';
        }
    }
    public function UpdateProduct($id){
        $fetch = $this->con->query("SELECT * FROM products where product_id = $id");
        while($data = $fetch->fetch_assoc()) {
            $ar['product_id'] = $data['product_id'];
            $ar['product_name'] = $data['product_name'];
            $ar['product_price'] = $data['product_price'];
            $ar['product_supplier'] = $data['product_supplier_id'];
            $ar['product_category'] = $data['product_category_id'];
            $ar['product_unit'] = $data['product_unit'];
            $ar['product_description'] = $data['product_description'];
        }
        return $ar;
    }
    public function UpdateProductInfo($id, $name, $email, $job, $phone, $add, $note){

        $insert = $this->con->prepare("UPDATE `customer` SET `customer_name`= ? , `customer_email`= ? ,`customer_phone`=? ,`customer_job`=? ,`customer_address`=? ,`customer_note`=? WHERE customer_id = ?") or die($this->con->error);
        $insert->bind_param("ssisssi", $name, $email, $phone, $job, $add, $note, $id);
        $insert->execute();
        $res = $insert->get_result();
        if($res){
            echo $name . " Has been Updated";
        }

    }
}
class categories{
    private $con;
    function __construct()
    {
        $db = new msql;
        $this->con = $db->connect() or die("Error Connecting : " . $this->con->connect_error);
    }
    public  function fetchIDs($cat){
        $c_id = $cat;
        $pro_no = $this->con->prepare("SELECT COUNT(*) AS 'counter' FROM products  WHERE product_category_id= ?");
        $pro_no->bind_param("i", $c_id);
        $pro_no->execute() or die("Error: ". $this->con->error);
        $res = $pro_no->get_result();
        while($count = $res->fetch_assoc())
        {
            $counter =  $count['counter'];
        }
        return $counter;
    }

    public function fetchCategoriesList()
    {

        $fetchCategory = $this->con->prepare("SELECT * FROM PRO_CATEGORY");
        $fetchCategory->execute();
        $AllCategory = $fetchCategory->get_result();

        $c1 =0; $c2 = 0; $co1= $co2 = 0; $temp =0;

        while($cat = $AllCategory->fetch_assoc())
        {
                if ($cat['category_parent_id'] == 0 && $cat['category_id'] != 1)
                {
                    $id1 = $cat['category_id'];
                    $c1 = $this->fetchIDs($id1);

                    echo "<ul>";
                    echo "<li><b>" . $cat['category_name'] . " (" . $c1 . ")</b> </li>";
                    $q = $this->con->query("Select * from pro_category where category_parent_id =" . $cat['category_id']);
                    echo "<ul>";
                    while ($sub = $q->fetch_assoc())
                    {
                        $id = $sub['category_id'];
                        $c2 = $this->fetchIDs($id);

                        echo "<li>" . $sub['category_name'] . " <b>(" . $c2 . ")</b> </li>";
                        $co2 += $c2;


                    }
                    echo "</ul>";
                    $co1 = $c1 + $co2;
                    $temp = $co1;
                    echo "<li><i>Total: " . $cat['category_name'] . " (" . $co1 . ")</i> </li>";
                    $co1= $co2 = 0;

                }

            echo "</ul>";

        }


    }

    public function fetchParentCategory(){
        $fetchCategory = $this->con->prepare("SELECT * FROM PRO_CATEGORY");
        $fetchCategory->execute();
        $AllCategory = $fetchCategory->get_result();
        while($cat = $AllCategory->fetch_assoc()){
            if($cat['category_parent_id']==0 && $cat['category_id']!=1  ) {
                echo "<option value='".$cat['category_id']."'>" . $cat['category_name'] . "</option>";
            }

        }
    }
    public function AddCategory(){
        $parent = $_POST['procat_parent'];
        $name = $_POST['procat_name'];
        $prestat = $this->con->prepare("INSERT INTO `pro_category` VALUES (category_id, ?,?)");
        $prestat->bind_param("is", $parent, $name) or die("Bind Error: " . $this->con->error);
        $insert = $prestat->execute();
        if($insert){
            return true;
        }
        else{
            return false;
        }

    }
    public function CategoryOperationResults(){
        if(isset($_GET['msg_id']) && $_GET['msg_id']==41){
            echo '<div class="alert alert-success">Category Added</div>';
        } elseif (isset($_GET['msg_id']) && $_GET['msg_id']==42){
            echo '<div class="alert alert-danger"><b>Category has been Deleted</div>';
        }
    }
    public function DeleteCategory($id){
        $deletepro = $this->con->prepare("DELETE FROM PRODUCTS WHERE PRODUCT_CATEGORY_ID = ?");
        $deletepro->bind_param("i", $id);
        $deletepro->execute() or die ("Error Deleting : " . $this->con->error);
        $deletecat = $this->con->prepare("DELETE FROM PRO_CATEGORY WHERE CATEGORY_ID = ?");
        $deletecat->bind_param("i", $id);
        $deletecat->execute() or die ("Error Deleting : " . $this->con->error);
    }
}
class purchaseOrderOperation
{
    private $con, $cur;

    function __construct()

    {
        $db = new msql();
        $this->con = $db->connect() or die($db->connect()->connect_error);
        $this->cur = new AllPageContent();

    }

    public function fetchSupplierList()
    {
        $fetchSupplier = $this->con->prepare("SELECT * FROM supplier");
        $fetchSupplier->execute();
        $AllSuppliers = $fetchSupplier->get_result();
        while ($sup = $AllSuppliers->fetch_assoc()) {
            echo "<option value='" . $sup['supplier_id'] . "' name='po_sup_name'>" . $sup['supplier_company'] . "</option>";
        }
    }
    public function fetchProducts()
    {
        $fetchProducts = $this->con->prepare("SELECT * FROM products");
        $fetchProducts->execute();
        $AllProducts = $fetchProducts->get_result();
        while ($pro = $AllProducts->fetch_assoc()) {
            echo "<option name='products_opt'  value='" . $pro['product_id'] . "'>" . $pro['product_name'] . "</option>";
        }
    }
    public function getSupplierbyId($id){
        $suppliers = $this->con->prepare("SELECT supplier_company from supplier where supplier_id = ?");
        $suppliers->bind_param("i", $id);
        $suppliers->execute();
        $names = $suppliers->get_result();
        foreach ($names as $sup){
            return $sup['supplier_company'];
        }
    }
    public  function getTotalPricebyOrderId($oid){
       // $price = $this->con->prepare("SELECT SUM(pod_unit_cost) as 'po_sum' FROM po_details WHERE pod_po_id = ?;");
        $price = $this->con->prepare("SELECT * FROM po_details WHERE pod_po_id = ?;");
        $price->bind_param("i", $oid);
        $price->execute();
        $sum = $price->get_result();
        $All = 0;
        while($total = $sum->fetch_assoc()){
            $Qty = $total['pod_quantity'];
            $UP = $total['pod_unit_cost'];
            $CALC = $Qty *$UP;
            $All+=$CALC;
        }
        return  $All ;
    }
    public  function getEmpNamebyId($uid){
        $getUser = $this->con->prepare("SELECT user_name from users where user_id = ?;");
        $getUser->bind_param("i", $uid);
        $getUser->execute();
        $users = $getUser->get_result();
        foreach($users as $user){
            return $user['user_name'];
        }
    }
    public function fetchProductsById($pid)
    {

        $fetchProducts = $this->con->prepare("SELECT * FROM products where product_id = ?");
        $fetchProducts->bind_param("i", $pid);
        $fetchProducts->execute();
        $AllProducts = $fetchProducts->get_result();
        while ($pro = $AllProducts->fetch_assoc()) {
            return $pro['product_price'];

        }
    }
    public  function getProductNameById($id){
        $getProduct = $this->con->prepare("SELECT product_name from products where product_id = ?;");
        $getProduct->bind_param("i", $id);
        $getProduct->execute();
        $products = $getProduct->get_result();
        foreach($products as $prod){
            return $prod['product_name'];
        }
    }
    public function setStatusPermission()
    {
        if ($_SESSION['sess_type'] == LEVEL_1) {

            echo <<<_PER
            <option value="New">New</option>
            <option value="Submitted">Submitted</option>
            <option value="Approved">Approved</option>
            <option value="Closed">Closed</option>
_PER;
        } else {
            echo <<<_NOPER
            <option value="New">New</option>
            <option value="Submitted">Submitted</option>
_NOPER;
        }
    }
    public function FindMaxPOID()
    {
        $get_order_no = $this->con->prepare("SELECT MAX(po_id) as 'po_id' FROM purchase_orders;");
        $get_order_no->execute();
        $order_ids = $get_order_no->get_result();
        if($order_ids->num_rows==1) {
            foreach ($order_ids as $id) {
                return ($id['po_id']) + 1;
            }
        }
    }
    public function placeNewOrder()
    {
        $sup = $_POST['po_supplier_name'];
        $user = $_POST['po_user_name'];
        $subDate = $_POST['po_submit_date'];
        $status = $_POST['po_status'];
        $shipdate = $_POST['po_ship_date'];
        $paymethod = $_POST['po_pay_method'];
        $note = $_POST['po_notes'];

        if (!isset($_POST['po_approved_by'])) {
            $get_user_id = $this->con->prepare("SELECT User_id FROM users where User_name = ?");
            $get_user_id->bind_param("s", $user);
            $get_user_id->execute();
            $user_ids = $get_user_id->get_result();
            while ($id = $user_ids->fetch_assoc()) {
                $uid = $id['User_id'];
                $order_submit = $this->con->prepare("INSERT INTO purchase_orders VALUES (po_id,?,?,?,?,?,?,NULL,0,?)");
                $order_submit->bind_param("iisssss",  $sup, $uid, $subDate, $status, $shipdate, $paymethod, $note);
                $order_submit->execute() or die("Could not insert, Duplicate Order Number!!!!! ". $this->con->error);
                return true;
            }
        } else
            if (isset($_POST['po_approved_by'])) {
                $appby = $_POST['po_approved_by'];
                $appdate = $_POST['po_approved_date'];

                $get_user_id = $this->con->prepare("SELECT User_id FROM users where User_name = ?");
                $get_user_id->bind_param("s", $user);
                $get_user_id->execute() or die("Could not insert, Duplicate ?? Number!" . $this->con->error);
                $user_ids = $get_user_id->get_result();
                foreach ($user_ids as $id) {
                    $uid = $id['User_id'];
                    $order_submit = $this->con->prepare("INSERT INTO purchase_orders VALUES (po_id, ?,?,?,?,?,?,?,?,?)");
                    $order_submit->bind_param("iissssiss", $sup, $uid, $subDate, $status,  $shipdate, $paymethod, $appby, $appdate, $note);
                    $order_submit->execute();
                    return true;
                }
            }
    }
    public function PlaceOrderDetails()
    {
        $this->placeNewOrder();
            $po_num = $_POST['po_number'];
            $pnarr = $_POST['pod_product_name'];
            $pquant = $_POST['pod_quantity'];
            $punit = $_POST['pod_unit_cost'];
            $pro_num = count($_POST['pod_product_name']);
            //echo $pro_num;
            for($i = 0; $i<$pro_num; $i++){
                $product = $pnarr[$i];
                $quantity = $pquant[$i];
                $unit = $punit[$i];
                $insert = $this->con->prepare("INSERT INTO `po_details`(`pod_id`, `pod_po_id`, `pod_product_id`, `pod_quantity`, `pod_unit_cost`, `pod_date_rec`, `pod_is_posted`, `pod_inventory_id`) values (pod_id,?,?,?,?,NULL,NULL,NULL)");
                $insert->bind_param("iiii", $po_num, $product, $quantity, $unit);
                $insert->execute() or die("Error Inserting" . $this->con->error);


            //return true;
        }//else return false;
    }
    public function fetchAllOrders(){
        $getOrders = $this->con->prepare("SELECT * FROM purchase_orders");
        $getOrders->execute();
        $All_orders = $getOrders->get_result();
        foreach($All_orders as $order) {
            $supId = $order['po_supplier_id'];
            $poId = $order['po_id'];
            $EmpId = $order['po_submitted_by'];
            $EmpIdA = $order['po_approved_by'];
            $supName = $this->getSupplierbyId($supId);
            $totalp = $this->getTotalPricebyOrderId($poId);
            $submitby = $this->getEmpNamebyId($EmpId);
            $approveby = $this->getEmpNamebyId($EmpIdA);
            if ($_SESSION['sess_id'] == $EmpId && $_SESSION['sess_type'] ==LEVEL_2 && $order['po_status'] != "Closed") {
                echo "<tr class='tblrow' id='" . $order['po_id'] . "'>";
                echo "<td>" . $order['po_id'] . "</td>";
                echo "<td>" . $order['po_status'] . "</td>";
                echo "<td>" . $supName . "</td>";
                echo "<td>" . currency_symbol() . number_format($totalp) . "</td>";
                echo "<td>" . $submitby . "</td>";
                echo "<td>" . $order['po_submitted_date'] . "</td>";
                echo "<td>" . $approveby . "</td>";
                echo "<td>" . $order['po_approved_date'] . "</td>";
                echo "<td>" .$order['po_payment_date']. "</td>";
                if ($_SESSION['sess_type'] == LEVEL_1 && $order['po_status'] != "Approved") {
                    echo '<td><button id="' . $order['po_id'] . '" class="Approve btn btn-xs btn-info" aria-details="Approve"><i class="fa fa-check">  </i> </button> <button id="' . $order['po_id'] . '" class="Cancel btn btn-xs btn-secondary"><i class="fa fa-minus"></i></button></td>';
                } else if ($_SESSION['sess_type'] == LEVEL_1 && $order['po_status'] != "Closed") {
                    echo '<td><button id="' . $order['po_id'] . '" class="Cancel btn btn-xs btn-secondary"><i class="fa fa-minus"></i></button></td>';
                } else {
                    echo "<td></td>";
                }

                echo "</tr>";
            }else if ($_SESSION['sess_type'] ==LEVEL_1  && $order['po_status'] != "Closed") {
                echo "<tr class='tblrow' id='" . $order['po_id'] . "'>";
                echo "<td>" . $order['po_id'] . "</td>";
                echo "<td>" . $order['po_status'] . "</td>";
                echo "<td>" . $supName . "</td>";
                echo "<td>" . currency_symbol() . number_format($totalp)  . "</td>";
                echo "<td>" . $submitby . "</td>";
                echo "<td>" . $order['po_submitted_date'] . "</td>";
                echo "<td>" . $approveby . "</td>";
                echo "<td>" . $order['po_approved_date'] . "</td>";
                echo "<td>".$order['po_payment_date']. "</td>";
                if ($_SESSION['sess_type'] == LEVEL_1 && $order['po_status'] != "Approved") {
                    echo '<td><button id="' . $order['po_id'] . '" class="Approve btn btn-xs btn-info" aria-details="Approve"><i class="fa fa-check">  </i> </button> <button id="' . $order['po_id'] . '" class="Cancel btn btn-xs btn-secondary"><i class="fa fa-minus"></i></button></td>';
                } else if ($_SESSION['sess_type'] == LEVEL_1 && $order['po_status'] != "Canceled") {
                    echo '<td><button id="' . $order['po_id'] . '" class="Cancel btn btn-xs btn-secondary"><i class="fa fa-minus"></i></button></td>';
                } else {
                    echo "<td></td>";
                }

                echo "</tr>";
            }

        }
    }
    public function fetchCanceledOrders(){
        $getOrders = $this->con->prepare("SELECT * FROM purchase_orders");
        $getOrders->execute();
        $All_orders = $getOrders->get_result();
        foreach($All_orders as $order) {
            $supId = $order['po_supplier_id'];
            $poId = $order['po_id'];
            $EmpId = $order['po_submitted_by'];
            $EmpIdA = $order['po_approved_by'];
            $supName = $this->getSupplierbyId($supId);
            $totalp = $this->getTotalPricebyOrderId($poId);
            $submitby = $this->getEmpNamebyId($EmpId);
            $approveby = $this->getEmpNamebyId($EmpIdA);
            if ($_SESSION['sess_id'] == $EmpId && $_SESSION['sess_type'] ==LEVEL_2 && $order['po_status'] == "Closed") {
                echo "<tr class='tblrow' id='" . $order['po_id'] . "'>";
                echo "<td>" . $order['po_id'] . "</td>";
                echo "<td>" . $order['po_status'] . "</td>";
                echo "<td>" . $supName . "</td>";
                echo "<td>" . ($totalp) . "</td>";
                echo "<td>" . $submitby . "</td>";
                echo "<td>" . $order['po_submitted_date'] . "</td>";
                echo "<td>" . $approveby . "</td>";
                echo "<td>" . $order['po_approved_date'] . "</td>";
                echo "<td>Paydate" . "</td>";
                echo "</tr>";

            }else if ($_SESSION['sess_type'] ==LEVEL_1  && $order['po_status'] == "Closed") {
                echo "<tr class='tblrow' id='" . $order['po_id'] . "'>";
                echo "<td>" . $order['po_id'] . "</td>";
                echo "<td>" . $order['po_status'] . "</td>";
                echo "<td>" . $supName . "</td>";
                echo "<td>" . ($totalp) . "</td>";
                echo "<td>" . $submitby . "</td>";
                echo "<td>" . $order['po_submitted_date'] . "</td>";
                echo "<td>" . $approveby . "</td>";
                echo "<td>" . $order['po_approved_date'] . "</td>";
                echo "<td>Paydate" . "</td>";
                echo "</tr>";
            }

        }
    }
    public  function getOrderStatusbyId($id){
        $getStatus = $this->con->prepare("SELECT po_status FROM purchase_orders where po_id = ?");
        $getStatus->bind_param("i", $id);
        $getStatus->execute() or die ($this->con->error);
        $Statuses = $getStatus->get_result();
        foreach($Statuses as $status){
            return $status['po_status'];
        }
    }
    public function setGlobalFKC($mode){
        switch($mode){
            case 0 : {return $disable = $this->con->query('SET GLOBAL FOREIGN_key_checks = 0;');} break;
            case 1 : {return $enable = $this->con->query('SET GLOBAL FOREIGN_key_checks = 1;');} break;
            default: {return "INVALID!";}
        }
    }
    public function fetchProductsbyOrderId($oid){
        $getProducts = $this->con->prepare("SELECT * FROM po_details where pod_po_id = ?");
        $getProducts->bind_param("i", $oid);
        $getProducts->execute() or die ($this->con->error);
        $All_products = $getProducts->get_result();
        foreach($All_products as $product){
            $pid = $product['pod_product_id'];
            $oid = $product['pod_po_id'];
            $po_stat = $this->getOrderStatusbyId($oid);
            $productName = $this->getProductNameById($pid);
            echo "<tr class='tblrow' style='cursor: pointer;' id='".$product['pod_id'] ."'>";
            echo "<td>" .$product['pod_product_id'] . "</td>";
            echo "<td>" .$productName . "</td>";
            echo "<td>" .$product['pod_quantity'] . "</td>";
            echo "<td>" .currency_symbol().$product['pod_unit_cost'] .  "</td>";

            //if order status if approved than show.
            if( $product['pod_is_posted']==0 && $po_stat=="Approved"){
                    echo "<td><button id='".$product['pod_product_id']."' name='".$product['pod_po_id']."'  style='". $product['pod_quantity'] ."' about='". $product['pod_id'] ."' class='recitem btn btn-secondary btn-xs' >Recieved</button></td>";
                    if($product['pod_date_rec']!=NULL){
                        echo "<td>".$product['pod_date_rec']."</td>";
                    }else{
                        echo "<td>No Rec.</td>";
                    }

                }else{
                echo "<td></td>";
                echo "<td></td>";
            }

            echo "</tr>";
        }

    }
    public function ApprovePOById($id){
        $ApprovedBy = $_SESSION['sess_id'];
        $approveDate = date("Y-m-d");
        $this->setGlobalFKC(0);
        $upd = $this->con->prepare("UPDATE `purchase_orders` SET po_status = 'approved', `po_approved_by` = ?, `po_approved_date` = ? WHERE `po_id` = ?;");
        $upd->bind_param("sss", $ApprovedBy,$approveDate, $id);
        $upd->execute() or die("ERROR" . $this->con->error);
        echo "Approved!";
        $this->setGlobalFKC(1);
    }
    public function CancelOrder($id){
        $this->setGlobalFKC(0);
        $operation = "Closed";
        $cancel = $this->con->prepare("UPDATE purchase_orders SET po_status= ? where po_id = ?");
        $cancel->bind_param("si", $operation, $id);
        $cancel->execute()or die("Error!" . $this->con->error);
        echo "Purchase Order ". $id . " Has been Canceled!";
        $this->setGlobalFKC(1);
    }
}
class invTransOperations{
    private $con;
    function __construct()
    {
        $db = new msql();
        $this->con = $db->connect();
    }
    public  function AddPOtoInventory($product_id, $po_id, $qty, $podid){
        $poo = new purchaseOrderOperation();
        $create_date = date("Y-m-d");
        $addPO = $this->con->prepare("INSERT INTO INV_TRANS VALUES (trans_id, 'purchase', ?, ?,?,?, NULL, NULL)");
        $addPO->bind_param("siii",$create_date,$product_id, $qty, $po_id);
        $addPO->execute() or die($this->con->error);
        $trans_id =  $addPO->insert_id;

        $poo->setGlobalFKC(0);
        $upd_stat = $this->con->prepare("UPDATE po_details set pod_is_posted = 1, pod_date_rec = ?, pod_inventory_id = ? where pod_id = ?");
        $upd_stat->bind_param("sii", $create_date, $trans_id, $podid);
        $upd_stat->execute();
        $poo->setGlobalFKC(1);
        echo CONFIRM_INVENTORY_RECEIVING;
    }

    public function getItemQuantitybyProductId($pid){
        $qty = $this->con->prepare("SELECT SUM(`trans_quantity`) as quantitiy FROM inv_trans WHERE`trans_product_id` = ?");
        $qty->bind_param("i", $pid);
        $qty->execute() or die ($this->con->error);
        $Quantities = $qty->get_result();
        foreach($Quantities as $qt){
            return $qt['quantitiy'];
        }
    }
    public function getProductCatfromProductId($pid){
        $getProduct = $this->con->prepare("SELECT product_category_id from products where product_id = ?;");
        $getProduct->bind_param("i", $pid);
        $getProduct->execute();
        $products = $getProduct->get_result();
        foreach($products as $prod){
            $cat_id = $prod['product_category_id'];
            $getCat = $this->con->prepare("SELECT category_name from pro_category where category_id = ?;");
            $getCat->bind_param("i", $cat_id);
            $getCat->execute();
            $cats = $getCat->get_result();
            foreach($cats as $cat){
                return $cat['category_name'];
            }
        }
    }

    public  function getProductNameById($id){
        $getProduct = $this->con->prepare("SELECT product_name from products where product_id = ?;");
        $getProduct->bind_param("i", $id);
        $getProduct->execute();
        $products = $getProduct->get_result();
        foreach($products as $prod){
            return $prod['product_name'];
        }
    }
    public  function getQtyofItemsByProductId($pid, $mode){
        switch ($mode){
            case 0: $type="purchase"; break;
            case 1: $type="sale"; break;
            case 2: $type="on Hold";break;
            case 3: $type="waste";break;
            default: $type="purchase";
        }

        $qty = $this->con->prepare("SELECT SUM(`trans_quantity`) as quantitiy FROM inv_trans WHERE`trans_product_id` = ? AND `trans_type` = ?") or die($this->con->error);
        $qty->bind_param("is", $pid, $type);
        $qty->execute() or die($this->con->error);
        $qtys = $qty->get_result();
        foreach($qtys as $qt){
            return $qt['quantitiy'];
        }
    }
    public function FetchInventoryItems(){
    $products = $this->con->prepare("SELECT DISTINCT `trans_product_id` from inv_trans");
    $products->execute();
    $items = $products->get_result();
    foreach($items as $item){
        $pid = $item['trans_product_id'];
        $TotalQuantity = $this->getItemQuantitybyProductId($pid);
        $Product_name = $this->getProductNameById($pid);
        $totalin = $this->getQtyofItemsByProductId($pid, 0);
        $totalout = $this->getQtyofItemsByProductId($pid, 1);
        $catname = $this->getProductCatfromProductId($pid);
        $available = $totalin-$totalout;
        echo "<tr>";
            echo "<td>" . $pid . "</td>";
            echo "<td>" . $Product_name . "</td>";
            echo "<td>" . $catname . "</td>";
            echo "<td>" . $TotalQuantity . "</td>";
            echo "<td>" . $totalin . "</td>";
            echo "<td>" . $totalout . "</td>";
            echo "<td>" . $available . "</td>";

        echo "</tr>";
    }
    }
}

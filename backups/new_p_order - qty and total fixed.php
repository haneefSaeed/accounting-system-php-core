<!DOCTYPE html>
<html>
<?php
require_once("includes/classes.php");
$purchse_order = new AllPageContent();
$purchse_order->head("Purchase Orders | Accounting");
$purchse_order_func = new purchaseOrderOperation();
$purchse_order->startSession("login.php");

?>

<body>
<!-- Side Navbar -->
<nav class="side-navbar">
<div class="side-navbar-wrapper">
<!-- Sidebar Header    -->
<div class="sidenav-header d-flex align-items-center justify-content-center">
    <!-- User Info-->
    <div class="sidenav-header-inner text-center">
        <h2 class="h5"><?php echo "Hi," . $_SESSION['sess_user']; ?></h2>
        <span><?php echo $_SESSION['sess_email']; ?></span>
    </div>
    <!-- Small Brand information, appears on minimized sidebar-->
    <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center">
            <strong>A</strong><strong class="text-primary">S</strong></a></div>
</div>
<!-- Sidebar Navigation Menus-->
<?php
$purchse_order->main_menu();
//$index->sec_menu();
?>

</div>
</nav>


<div class="page">
<!-- navbar-->
<?php
$purchse_order->navtop();
?>
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
<div class="container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="All_POS.php"> Purchase Orders</a></li>
        <li class="breadcrumb-item active">New Purchase Orders</li>
    </ul>
</div>
</div>
<section class="forms">
<div class="container-fluid">
    <!-- Page Header-->
    <header>
        <h1 class="h1 display">New Purchase Order </h1>
    </header>
    <div class="row">
         <!--Top Form Input Box-->
        <div class="col-lg-12 ">
            <div class="card">

<!--                        Form Inputs-->
                <div class="card-body float-right ">
                    <form class="form-inline float-right" action="includes/Operate.php" method="post">
                        <button type="submit" name="po_new" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Place Order</button> &nbsp;
                </div>

            </div>
        </div>
        <!--Error Message Success Message-->
        <div class="col-lg-12">
            <?php
            //              $purchse_order_func->ProductOperationResults();
            ?>
        </div>

        <!--
        Purchase Order form
        po_supplier_name - class selector
        po_user_name-  value sess_user
        po_submit_date - value date();
        po_status - select , id = status , permissions();
        div - id=approved
        -->
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Purchase Order</h4>
                </div>
                <div class="card-body">
                    <p>Create A New Purchase Order:</p>
                    <label>Suppliers</label>&nbsp;<br>
                    <div class="form-group form-inline">
                        <select name="po_supplier_name" class="selector">
                            <?php
                            $purchse_order_func->fetchSupplierList();
                            ?>
                        </select>&nbsp;
                        <a class="btn btn-info ml-2" href="supplier.php">Suppliers </a>
                    </div>
                    <!-- Form Inputs -->
                    <div class="form-group">
                        <table border="0" cellpadding="2">
                            <tr>
                                <td><label class="col-form-label">Submitted By Employee: </label></td>
                                <td><label class="col-form-label">Submitted Date: </label></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="po_user_name"
                                           value="<?php echo ucfirst(strtolower($_SESSION['sess_user'])); ?>"
                                           readonly class="form-control col-lg-12">
                                    <small><?php echo $_SESSION['sess_email']; ?></small></td>
                                <td>
                                    <input type="date" name="po_submit_date"
                                           value="<?php echo date("Y-m-d"); ?>" readonly
                                           class="form-control col-lg-12">
                                    <small>mm-dd-yyyy</small></td>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div class="form-group form-inline">
                        <label class="mr-2">Order Status</label>
                        <select id='status' name="po_status" class="form-control col-lg-4">
                            <?php $purchse_order_func->setStatusPermission();
                            ?>
                        </select>
                    </div>
                    <div class="form-group" id="approved"></div>
                    <br>
                </div>
            </div>
        </div>

        <!--po_ship_fee
        po_ship_date value = date()
        po_pay_method  values = cash, cheque, bank
        po_notes-->

        <div class="col-lg-5">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Shipment and Payment info:</h4>
                </div>
                <div class="card-body">
                    <p>Shipping information:</p>
                    <div class="form-group">
                        <table border="0" cellpadding="2">
                            <tr>
                                <td>
                                    <label>Shipping Fee <?php echo " (" . $purchse_order->currency() . ")"; ?></label>
                                </td>
                                <td><label class="col-form-label">Shipment Date: </label></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="po_ship_fee"
                                           placeholder="0.0<?php echo " " . $purchse_order->currency_symbol(); ?>"
                                           class="form-control col-lg-12">
                                </td>
                                <td>
                                    <input type="date" name="po_ship_date" value="<?php echo date("Y-m-d"); ?>"
                                           class="form-control col-lg-12">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div class="form-group form-inline">
                        <label class="mr-2">Shipping Payment Method:</label>
                        <select class=" form-control col-lg-5 selected" name="po_pay_method">
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="bank">Bank</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <textarea name="po_notes" class="form-control"></textarea>

                    </div>

                </div>
            </div>
        </div>

        <!--
        pod_product_name[], options = fetchProducts(), val= product_id
        pod_quantity[], id=qty
        pod_unit_cost[] , id = unitPrice, value = fetchproductbyid(id);
        id = total,
        button ) id = add, name=add,
        button ) id = remove, name = remove , class btn_remove
        -->

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Purchase Order Details:</h4>
                </div>
                <div class="card-body  text-center align-content-center">

                    <div class="form-group">
                        <table id="dynamic_field" class="table-bordered p-lg-3" cellpadding="3">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Cost ( <?php echo $purchse_order->currency_symbol() ?> )</th>
                                <th>Total ( <?php echo $purchse_order->currency_symbol(); ?> )</th>
                                <th>Add/Del</th>
                            </tr>
                            <tr>
                                <td>
                                    <select class="selector name_list" name="pod_product_name[]">
                                        <?php $purchse_order_func->fetchProducts(); ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" id='qty' placeholder="Quantity" name="pod_quantity[]"
                                           class="form-control">
                                </td>
                                <td>
                                    <input type="number" id="unitPrice"
                                           name="pod_unit_cost[]"  class="form-control" value="<?php echo $purchse_order_func->fetchProductsById(7);?>">
                                </td>
                                <td>
                                    <input type="number" id="total"
                                           placeholder="Total Price <?php echo $purchse_order->currency_symbol(); ?>"
                                           readonly class="form-control total">
                                </td>
                                <td>
                                    <button type="button" id="add" name="add" value="+" class="btn btn-xs btn-info"><i class="fa fa-plus-circle"></i></button>
                                    <button type="button" id="remove" name="remove" value="-" class="btn btn-xs btn-danger btn_remove"><i class="fa fa-minus"></i></button>
                                </td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Quantity</td>
                                    <td><input type="number" id="Quantity" readonly value="" placeholder="Total Quantity" class="form-control Quantity"></td>
                                    <td><h3>Grand Total</h3></td>
                                    <td><input type="number" id="GrandTotal" readonly value="" placeholder="Grand Total" class="form-control GrandTotal"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        </form>
    </div>
</section>


<footer class="main-footer">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <p>Your company &copy; 2017-2019</p>
        </div>
        <div class="col-sm-6 text-right">
            <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Bootstrapious</a>
            </p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
        </div>
    </div>
</div>
</footer>
<!--End of Page-->
</div>


<!-- JavaScript files-->


<?php
$purchse_order->selector();
$purchse_order->footer();
?>
<script type="text/javascript">


$(document).ready(function(){

    var i=1;
    $('#add').click(function(){
        i++;

 html = "<tr id='row"+i+"'>" +
"<td>" +
    "<select class=\"selector\" name=\"pod_product_name[]\">" +
        "<?php $purchse_order_func->fetchProducts(); ?>" +
    "</select>" +
"</td>" +
"<td>" +
    "<input type=\"number\" id='QTY"+i+"' placeholder=\"Quantity\" name=\"pod_quantity[]\"" + "class=\"form-control quantity \">" +
"</td>" +
"<td>" +
    "<input type=\"number\" id=\"UP"+i+" \"" +
    "placeholder=\"Unit Price <?php echo $purchse_order->currency_symbol(); ?>\" " +
    "name=\"pod_unit_cost[]\" class=\"form-control unit_price\">" +
"</td>" +
"<td>" +
    "<input type=\"number\"  id=\"total"+i+"\"" +
    "placeholder=\"Total Price <?php echo $purchse_order->currency_symbol(); ?>\" " +
    "readonly class=\"form-control total\">" +
"</td>" +
"<td>" +
    "<button type=\"button\" id=\"add\" name=\"add\" value=\"+\" class=\"btn btn-xs btn-info\"><i " +
    "class=\"fa fa-plus-circle\"></i></button>" +
    "<button type=\"button\" id=\""+i+"\" name=\"remove\" value=\"-\" class=\"btn btn-xs btn-danger btn_remove\">" +
    "<i class=\"fa fa-minus\"></i></button>" +
"</td> " +
"</tr>";

        $('#dynamic_field').append(html);
        tail.select(".selector",{
            search:true,
            searchMarked: false,
            sortItems:true,
            multiple:false,
        });


    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
        i--;
        if(i==1) {
            var x = document.getElementById("total").value;
            document.getElementById('GrandTotal').value = Number(x);
        }
        else if(i>1){
            var x = document.getElementById("total").value;
            y = document.getElementById("total"+i).value;
            all = Number(x)+ Number(y);
            document.getElementById('GrandTotal').value = Number(all);
        }
        if(i==1) {
            var x = document.getElementById("qty").value;
            document.getElementById('Quantity').value = Number(x);
        }
        else if(i>1){
            var x = document.getElementById("qty").value;
            y = document.getElementById("QTY"+i).value;
            all = Number(x)+ Number(y);
            document.getElementById('Quantity').value = Number(all);
        }
    });

        $(document).on('keyup', '.unit_price', function() {
            var upid = $(this).attr("id");
            var unitp = document.getElementById(upid).value;//$('#'+id+'').value;
            var quan = document.getElementById("QTY"+i).value;
            document.getElementById("total"+i).value = (unitp *quan);
        });

    $(document).on('keyup', '.quantity', function() {
        var qtid = $(this).attr("id");
        var qtid = document.getElementById(qtid).value;//$('#'+id+'').value;
        var unitp = document.getElementById("UP"+i).value;
        document.getElementById("total"+i).value = (unitp *qtid);
    });

    $(document).on('change onchange keyup blur focus', '.total', function () {

        if(i==1) {
            var x = document.getElementById("total").value;
            document.getElementById('GrandTotal').value = Number(x);
        }
         else if(i>1){
            var x = document.getElementById("total").value;
              y = document.getElementById("total"+i).value;
              all = Number(x)+ Number(y);
              document.getElementById('GrandTotal').value = Number(all);
          }
    })
$(document).on('keydown mousedown mouseup', '.quantity', function () {

        if(i==1) {
            var x = document.getElementById("qty").value;
            document.getElementById('Quantity').value = Number(x);
        }
         else if(i>1){
            var x = document.getElementById("qty").value;
              y = document.getElementById("QTY"+i).value;
              all = Number(x)+ Number(y);
              document.getElementById('Quantity').value = Number(all);
          }
    })

});
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('status').addEventListener("change", function () {
        x = document.getElementById('status').value;
        if (x == "Approved") {
            data = '<table border="0" cellpadding="2"><tr><td><label class="col-form-label">Approved By Employee: </label></td><td><label class="col-form-label">Approved Date: </label></td></tr><tr><td><input type="text" name="po_approved_by" value="<?php echo ucfirst(strtolower($_SESSION["sess_user"]));?>" readonly class="form-control col-lg-12"><small><?php echo $_SESSION["sess_email"]; ?></small></td><td><input type="date" name="po_approved_date" value="<?php echo date("Y-m-d");?>" readonly class="form-control col-lg-12"><small>mm-dd-yyyy</small></td></tr></table>';
            document.getElementById('approved').innerHTML = data;
        } else {
            document.getElementById('approved').innerHTML = "";
        }
    });
    document.getElementById('unitPrice').addEventListener("keyup", function () {
        qty = document.getElementById('qty').value;
        unitprice = document.getElementById('unitPrice').value;
        sum = qty * unitprice;
        document.getElementById('total').value = sum.toFixed(2);
    });
    document.getElementById('qty').addEventListener("keyup", function () {
        qty = document.getElementById('qty').value;
        unitprice = document.getElementById('unitPrice').value;
        sum = qty * unitprice;
        document.getElementById('total').value = sum.toFixed(2);
    });


})

</script>

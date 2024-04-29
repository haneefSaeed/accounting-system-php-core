<?php
require_once("classes.php");
$operate = new AllPageContent();
$operate->StartSession("login.php?success");


    $customers = new CustomerOperation();
    //customer operations
    if (isset($_POST['cust_save'])) {

        $customers->SaveCustomer();
            header("location:../customers.php?msg_id=1"); // save successfull id 1

    }

    if (isset($_POST['cust_del'])) {
        $customer_del_id = $_POST['cust_del'];
        $name = $_POST['cust_del_name'];
        $customers->DeleteCustomer($customer_del_id);
    }

    if(isset($_POST['cust_upd_id'])){
        $ar = $customers->UpdateCustomer($_POST['cust_upd_id']);
        echo json_encode($ar);
    }
    if(isset($_POST['cust_name'])){
        $id = $_POST['cust_id'];
        $name = $_POST['cust_name'];
        $email = $_POST['cust_email'];
        $phone = $_POST['cust_phone'];
        $job = $_POST['cust_job'];
        $add = $_POST['cust_add'];
        $note = $_POST['cust_note'];
        $customers->UpdateCustomerInfo($id, $name,$email,$job,$phone,$add, $note);
    }

    $suppliers = new SupplierOperation();
    if (isset($_POST['sup_save'])) {

        $suppliers->SaveSupplier();
        header("location:../supplier.php?msg_id=11"); // save successfull id 1

    }

    if (isset($_GET['sup_del'])) {
        $Supplier_del_id = $_GET['sup_del'];
        $name = $_GET['name'];
        $suppliers->DeleteSupplier($Supplier_del_id);
        header("location:../supplier.php?msg_id=12&name=$name");
    }

    if(isset($_POST['sup_update'])){
        echo "customer will be updated";
    }


    $shipper = new ShipperOperation();
    if (isset($_POST['ship_save'])) {

        $shipper->SaveShipper();
        header("location:../shippers.php?msg_id=21"); // save successfull id 1

    }

    if (isset($_GET['ship_del'])) {
        $shipper_del_id = $_GET['ship_del'];
        $name = $_GET['name'];
        $shipper->DeleteShipper($shipper_del_id);
        header("location:../Shippers.php?msg_id=22&name=$name");
    }

    if(isset($_POST['ship_update'])){
        echo "customer will be updated";
    }



    $products = new productsOperation();
    if(isset($_POST['product_categories'])) {
        $cat_id = $products->fetchProductsCategory();
        header("location:../products.php?cat_id=$cat_id");
    }

    if(isset($_POST['prod_save'])){
        $products->SaveProduct();
        header("location:../products.php?msg_id=31");
    }
    if(isset($_POST['prod_del'])){
        $id = $_POST['prod_del'];
        $products->deleteProduct($id);
    }
    //----------------------category operation-----------

    if(isset($_POST['procat_save'])){
        $category = new categories();
        $category->AddCategory();
        header("location:../product_categories.php?msg_id=41");
    }

if(isset($_POST['prod_upd_id'])){
    $ar = $products->UpdateProduct($_POST['cust_upd_id']);
    echo json_encode($ar);
}
if(isset($_POST['prod_name'])){
    $id = $_POST['cust_id'];
    $name = $_POST['cust_name'];
    $email = $_POST['cust_email'];
    $phone = $_POST['cust_phone'];
    $job = $_POST['cust_job'];
    $add = $_POST['cust_add'];
    $note = $_POST['cust_note'];
    $products->UpdateProductInfo($id, $name,$email,$job,$phone,$add, $note);
}


//----------------- Purchase Order Operation ----------------


    if(isset($_POST['po_new'])){
        echo $_POST['pod_posted'];
    }

    if(isset($_POST['item'])){
        $purchse_order_func = new  purchaseOrderOperation();
        $id =$_POST['item'];
        echo $purchse_order_func->fetchProductsById($id);
    }
    if(isset($_POST['item2'])){
        $purchse_order_func = new  purchaseOrderOperation();
        $id =$_POST['item2'];
        echo $purchse_order_func->fetchProductsById($id);
    }

    if(isset($_POST['po_number'])) {
        $purchse_order_func = new  purchaseOrderOperation();
        $purchse_order_func->PlaceOrderDetails();

    }

if(isset($_POST['Purchase_Order_id'])) {
    $purchse_order_func = new  purchaseOrderOperation();
    $id = $_POST['Purchase_Order_id'];
    $purchse_order_func->fetchProductsbyOrderId($id);
    //$purchse_order_func->loadPOUpdateForm($id);
}

if(isset($_POST['Po_id'])) {
    $purchse_order_func = new purchaseOrderOperation();
    $id = $_POST['Po_id'];
    $purchse_order_func->ApprovePOById($id);
}

//add receiving to inventory
if(isset($_POST['product_id_purchase_order'])){
    $purchse_order_func = new invTransOperations();
    $pid = $_POST['product_id_purchase_order'];
    $poid = $_POST['PO_id_purchase_order'];
    $podid = $_POST['PoD_purchase_order'];
    //echo "product id: " .$pid . " po id" . $poid;
    $qty = $_POST['Qty_purchase_order'];
    //echo "pod id" . $podid . " qty" . $qty;
    $purchse_order_func->AddPOtoInventory($pid, $poid, $qty, $podid);
}
if(isset($_POST['cancel_po_id'])){
    $purchse_order_func = new purchaseOrderOperation();
    $id = $_POST['cancel_po_id'];
    $purchse_order_func->CancelOrder($id);
}
//logout
    if(isset($_GET['logout'])){
        session_start();
        if(isset($_SESSION['sess_email'])) {
            session_destroy();
            session_regenerate_id();
            header("location:../login.php?success");
        }
    }

if(isset($_POST['comp_name'])){
    $upd = new AllPageContent();
    $comp = $_POST['comp_name'];
    $curr = $_POST['comp_currency'];
    $curs = $_POST['comp_currency_symbol'];
    $upd->UpdateSettings($comp, $curr, $curs);
}

    /////AJAX FORMS//////////////

if(isset($_POST['Purchase_Order_id'])){
    echo "Yes";
}

//EMAIL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['emailto'])) {
    $to = $_POST['emailto'];
    $sub = $_POST['emailsubject'];
    $body = $_POST['emailbody'];

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(TRUE);

    try {
        $eAdd = $_SESSION['sess_email'];
        $name = $_SESSION['sess_user'];

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '587';
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;

        $mail->Username = EMAIL_USER;
        $mail->Password = EMAIL_PASS;
        $mail->setFrom(EMAIL_USER, EMAIL_NAME);
        $mail->addAddress($to, '');


        $mail->Subject = $sub;
        $mail->Body = $body;
        if(!$mail->send()){
             echo "Mail not sent" . $mail->ErrorInfo;
         }else { echo "Email Has been Successfully Sent to " . $to ;}
    } catch (Exception $e) {
        $em = $e->errorMessage();
        if ($em != 'SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting') {
            echo "Could Not Send Email due to Exception Error! Please Contact Developers!";
        } else echo "Error!";
    }
}
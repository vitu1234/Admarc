<?php
include("../../admin/syst/connection/Functions.php");
$operation = new Functions();
session_start();
//
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
//return;

if (isset($_POST['phone']) && isset($_POST['payment_type']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['address']) && !empty($_POST['phone']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['address'])) {
    $email = 'customer@admarc.com';
    $phone = addslashes($_POST['phone']);
    $fname = addslashes($_POST['fname']);
    $lname = addslashes($_POST['lname']);
    $city_name = addslashes($_POST['address']);
    $payment_type = addslashes($_POST['payment_type']);
    $pass1 = 'password';
    $user_role = 'customer';
    $password = password_hash($pass1, PASSWORD_DEFAULT);

    $table = 'users';
    $data = [
        'address' => "$city_name",
        'fname' => "$fname",
        'lname' => "$lname",
        'email' => "$email",
        'phone' => "$phone",
        'password' => "$password",
        'account_status' => "0",
        'user_role' => "$user_role",
    ];
    //check email if already taken
    $checkEmail = $operation->retrieveSingle("SELECT *FROM users WHERE phone='$phone' AND user_role = '$user_role'");
    if (!empty($checkEmail)) {
        //update user records
        $where = "phone='$phone' AND user_role = '$user_role'";
        $operation->updateData($table, $data, $where);
    } else {
        $operation->insertData($table, $data);
    }
    $getUser = $operation->retrieveSingle("SELECT * FROM `users` WHERE phone='$phone' AND user_role = '$user_role'");
    if (empty($getUser)) {
        echo json_encode(array("code" => 2, "msg" => "something is keeping you from proceeding, please try again later!"));
        return;
    }
    $cart_total = 0;
    $user_id = $getUser['user_id'];
    foreach ($_SESSION['cart_customer'] as $item) {
        $prod_id = $item['prod_id'];
        $product_name = $item['product_name'];
        $price = $item['price'];
        $qty = $item['qty'];
        $cart_total += ($price * $qty);
    }

    $tbl = 'admarc_sales';
    $dt = [
        'total' => $cart_total,
        'user_id' => $user_id,
        'payment_type' => $payment_type
    ];
    $operation->insertData($tbl, $dt);
    $getSale = $operation->retrieveSingle("SELECT * FROM `admarc_sales` WHERE user_id = '$user_id' AND total='$cart_total' ORDER BY sale_id DESC ");
    $sale_id = $getSale['sale_id'];
    //insert details
    $table = 'admarc_sale_details';
    foreach ($_SESSION['cart_customer'] as $item) {
        $prod_id = $item['prod_id'];
        $product_name = $item['product_name'];
        $price = $item['price'];
        $qty = $item['qty'];
        $cart_total += ($price * $qty);
        $data = [
            'sale_id' => $sale_id,
            'product_id' => $prod_id,
            'qty' => $qty,
            'prod_total' => $price * $qty,
        ];
        $operation->insertData($table, $data);

        $getProduct = $operation->retrieveSingle("SELECT * FROM `admarc_products` WHERE product_id = '$prod_id'");
        $qty_remaining = $getProduct['qty_remaining'] - $qty;

        $tbl = 'admarc_products';
        $dat = [
            'qty_remaining' => $qty_remaining
        ];
        $where = "product_id = '$prod_id'";
        $operation->updateData($tbl, $dat, $where);
    }

    unset($_SESSION['cart_customer']); //remove old item
    echo json_encode(array("code" => 1, "msg" => "Products checked out!"));
    return;


}
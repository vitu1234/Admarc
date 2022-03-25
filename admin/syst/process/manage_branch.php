<?php
include("../connection/Functions.php");
$operation = new Functions();
session_start();
//register
//print_r($_POST);
if (isset($_POST['branch_name']) && isset($_POST['branch_phone']) && isset($_POST['city_name']) && !empty($_POST['branch_name']) && !empty($_POST['branch_phone']) && !empty($_POST['city_name'])) {
    $branch_name = addslashes($_POST['branch_name']);
    $branch_phone = addslashes($_POST['branch_phone']);

    $city_name = addslashes($_POST['city_name']);

    $table = 'branch';
    //check email if already taken
    $countEmail = $operation->countAll("SELECT *FROM branch WHERE branch_name='$branch_name' AND branch_phone = '$branch_name'");
    if ($countEmail > 0) {
        echo json_encode(array("code" => 2, "msg" => "Branch name is already taken"));
    } else {
        $data = [
            'branch_name' => "$branch_name",
            'branch_phone' => "$branch_phone",
            'address' => "$city_name",
        ];
        if ($operation->insertData($table, $data) == 1) {
            echo json_encode(array("code" => 1, "msg" => "Success, redirecting"));
        } else {
            echo json_encode(array("code" => 2, "msg" => "An error occured, please try again later"));
        }
    }
}
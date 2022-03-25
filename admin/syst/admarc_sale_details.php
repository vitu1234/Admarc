<?php
session_start();
include('connection/Functions.php');
$operation = new Functions();
//unset($_SESSION['user']);
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}

if (!isset($_GET['sale']) || empty($_GET['sale'])) {
    header('Location:admarc_sales.php');
}
$logged_user = $_SESSION['user'];
$user_id = $logged_user['user_id'];
$sale_id = $_GET['sale'];
$sale = $operation->retrieveSingle("SELECT *FROM admarc_sales JOIN users ON admarc_sales.user_id = users.user_id WHERE sale_id = '$sale_id'");
$products_bought = $operation->retrieveMany("SELECT * FROM `admarc_sale_details` JOIN admarc_products ON admarc_sale_details.product_id = admarc_products.product_id  WHERE sale_id = '$sale_id'");

?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/css.php'); ?>
<body>
<script src="../assets/js/preloader.js"></script>
<div class="body-wrapper">

    <?php include('includes/aside.php'); ?>
    <div class="main-wrapper mdc-drawer-app-content">

        <?php include('includes/header.php'); ?>


        <!-- partial -->
        <div class="page-wrapper mdc-toolbar-fixed-adjust">
            <main class="content-wrapper">
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__inner">

                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                            <div class="mdc-card p-0">
                                <h6 class="card-title card-padding pb-0 text-center">ADMARC SALE DETAILS</h6>


                                <div class="mdc-layout-grid " style="width: 100%;">
                                    <div class="mdc-layout-grid__inner">
                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 ">


                                            <div id="openModal"
                                                 class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2 ">
                                                <a href="admarc_sales.php" class="mdc-button mdc-button--outlined ">
                                                    <span class="mdi mdi-arrow-left"></span> Back
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="mdc-layout-grid " style="width: 100%;">
                                    <div class="mdc-layout-grid__inner">
                                        <!--                                        <h3 class="text-center">Cart Totals</h3>-->
                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-10  "
                                             style="width: 100%;">

                                            <table class="table " style="width: 70%; border: 0px solid white;">
                                                <tr>
                                                    <th width="60%">Customer Name</th>
                                                    <td width="20%"><?= $sale['fname'] . ' ' . $sale['lname'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th width="60%">Customer Phone</th>
                                                    <td width="20%"><?= $sale['phone'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th width="60%">Payment Type</th>
                                                    <td width="20%"><?= $sale['payment_type'] ?></td>
                                                </tr>

                                                <tr>
                                                    <th width="60%">Sale Total</th>
                                                    <td width="20%">K <?= number_format($sale['total'], 2) ?></td>
                                                </tr>
                                            </table>


                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hoverable">
                                        <thead>
                                        <tr class="bg-light ">
                                            <th class="text-left "><b>Product Name</b></th>
                                            <th class="text-left "><b>Product Price (K)</b></th>
                                            <th class="text-left "><b>Qty Bought</b></th>
                                            <th class="text-left "><b>Total</b></th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($products_bought as $product) {

                                            $category_id = $product['category_id'];
                                            $category = $operation->retrieveSingle("SELECT *FROM product_categories WHERE category_id = '$category_id'");

                                            echo '<tr>
                                                        <td class="text-left"><b>' . $product['product_name'] . '</b> - <small>' . $category['category_name'] . '</small></td>
                                                        <td class="text-left">' . number_format($product['selling_price'], 2) . '</td>
                                                        <td class="text-left ">' . $product['qty'] . '</td>
                                                        <td class="text-left ">' . number_format($product['selling_price'], 2) . '</td>
                                                       
                                                    </tr>';

                                        }
                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
            <?php include("includes/footer.php"); ?>

            <!-- partial -->
        </div>
    </div>
</div>

<?php include('includes/scripts.php'); ?>

</body>
</html>
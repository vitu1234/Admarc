<?php
session_start();
//unset($_SESSION['user']);
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}

include('connection/Functions.php');
$operation = new Functions();
$logged_user = $_SESSION['user'];
$user_id = $logged_user['user_id'];
$products = $operation->retrieveMany("SELECT *FROM products WHERE user_id = '$user_id'");


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
                                <h6 class="card-title card-padding pb-0 text-center">PRODUCTS</h6>


                                <div class="mdc-layout-grid " style="width: 100%;">
                                    <div class="mdc-layout-grid__inner">
                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 ">

                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-10  "
                                                 style="width: 100%;">
                                                <button type="button"
                                                        class="mdc-button mdc-button--outlined material-icons mx-2">
                                                    <div class="mdc-icon-button__ripple"></div>
                                                    picture_as_pdf
                                                </button>

                                                <button type="button"
                                                        class="mdc-button mdc-button--outlined material-icons mx-2 ">
                                                    <span class="mdi mdi-file-excel"></span>

                                                </button>

                                            </div>

                                            <div id="openModal"
                                                 class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2 ">

                                                <?php
                                                if ($logged_user['user_role'] == 'admin') {
                                                    ?>

                                                    <!--                                                    <a href="manage_product.php" class="mdc-button mdc-button--outlined ">-->
                                                    <!--                                                        Add Products-->
                                                    <!--                                                    </a>-->
                                                    <a href="categories.php"
                                                       class="mdc-button mdc-button--outlined mx-2">
                                                        Categories
                                                    </a>


                                                    <?php
                                                } else if ($logged_user['user_role'] == 'agent' || $logged_user['user_role'] == 'supplier') {
                                                    ?>

                                                    <a href="manage_product.php"
                                                       class="mdc-button mdc-button--outlined ">
                                                        Add Products
                                                    </a>
                                                    <!--                                                    <a href="categories.php" class="mdc-button mdc-button--outlined mx-2">-->
                                                    <!--                                                        Categories-->
                                                    <!--                                                    </a>-->


                                                    <?php
                                                }
                                                ?>



                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hoverable">
                                        <thead>
                                        <tr class="bg-light ">
                                            <th class="text-left "><b></b></th>
                                            <th class="text-left "><b>Product Name</b></th>
                                            <th class="text-left "><b>Category</b></th>
                                            <th class="text-left "><b>Price (K)</b></th>
                                            <th class="text-left "><b>Qty </b></th>

                                            <th><b></b></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($products as $product) {
                                            $status = '';
                                            if ($product['qty'] >= 10) {
                                                $status = '<i class="text-success">' . $product['qty'] . '</i>';
                                            } else {
                                                $status = '<i class="text-danger">' . $product['qty'] . '</i>';

                                            }
                                            $category_id = $product['category_id'];
                                            $category = $operation->retrieveSingle("SELECT *FROM product_categories WHERE category_id = '$category_id'");

                                            echo '<tr>
                                                        <td class="text-left"><img src="../assets/images/products/' . $product['img_url'] . '" height="60px" width="60px"/></td>
                                                        <td class="text-left">' . $product['product_name'] . '</td>
                                                        <td class="text-left">' . $category['category_name'] . '</td>
                                                        <td class="text-left">' . number_format($product['price'], 2) . '</td>
                                                        <td class="text-left ">' . $status . '</td>
                                                       
                                                        <td>
                                                        <a href="manage_product.php?user=' . $product['product_id'] . '" class="mdc-button mdc-button--outlined ">
                                                            Manage
                                                        </a>
                                                        </td>
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
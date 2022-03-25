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

$get_id = '';
$title = '';
if (isset($_GET) && !empty($_GET)) {
    $title = 'Edit Product';
} else {
    $title = 'Add Product';
}

$categories = $operation->retrieveMany("SELECT *FROM product_categories");


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
                        <div class="mdc-layout-grid__cell--span-12">
                            <div class="mdc-card">
                                <h6 class="card-title"><?= $title ?></h6>

                                <div class="template-demo">
                                    <form id="addProductForm" enctype="multipart/form-data">
                                        <div class="mdc-layout-grid__inner">
                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                                                <div class="mdc-text-field mdc-text-field--outlined">
                                                    <input type="file" class="mdc-text-field__input" id="prod_pic"
                                                           name="prod_pic" required
                                                           autocomplete="off">
                                                    <div class="mdc-notched-outline">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">

                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
                                                    <i class="material-icons mdc-text-field__icon">word</i>
                                                    <input autocomplete="off" type="tel" required
                                                           class="mdc-text-field__input "
                                                           name="prod_name"
                                                           id="prod_name">
                                                    <div class="mdc-notched-outline">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                            <label for="prod_name"
                                                                   class="mdc-floating-label">Product Name</label>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                                <div class="mdc-select " style="width: 100%;"
                                                     data-mdc-auto-init="MDCSelect">
                                                    <input type="hidden" required name="category_id" id="category_id">
                                                    <i class="mdc-select__dropdown-icon"></i>
                                                    <div class="mdc-select__selected-text"></div>
                                                    <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                                                        <ul class="mdc-list">

                                                            <li class="mdc-list-item mdc-list-item--selected"
                                                                data-value="" aria-selected="true">
                                                            </li>
                                                            <?php
                                                            foreach ($categories as $category) {
                                                                echo '
                                                                        <li class="mdc-list-item" data-value="' . $category['category_id'] . '">
                                                                            ' . $category['category_name'] . '
                                                                        </li>
                                                                        ';
                                                            }
                                                            ?>

                                                        </ul>
                                                    </div>
                                                    <span class="mdc-floating-label">Pick a category</span>
                                                    <div class="mdc-line-ripple"></div>
                                                </div>
                                            </div>


                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
                                                    <i class="material-icons mdc-text-field__icon">money</i>
                                                    <input autocomplete="off" type="text" required
                                                           class="mdc-text-field__input "
                                                           name="prod_price"
                                                           id="prod_price">
                                                    <div class="mdc-notched-outline">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                            <label for="prod_price"
                                                                   class="mdc-floating-label">Product Price (K)</label>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
                                                    <i class="material-icons mdc-text-field__icon">amount</i>
                                                    <input autocomplete="off" type="number" required
                                                           class="mdc-text-field__input "
                                                           name="prod_qty"
                                                           id="prod_qty">
                                                    <div class="mdc-notched-outline">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                            <label for="prod_qty"
                                                                   class="mdc-floating-label">Product Quantity</label>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="mt-2 mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                                <button id="loginBtn" type="submit"
                                                        class="mdc-button mdc-button--raised w-100">
                                                    SAVE
                                                </button>
                                            </div>
                                    </form>
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
<script>


</script>
</body>
</html>
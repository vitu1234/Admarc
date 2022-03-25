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
    $title = 'Edit User';
} else {
    $title = 'Add User';
}


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
                                    <form id="addUserForm">
                                        <div class="mdc-layout-grid__inner">
                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                                <div class="mdc-text-field mdc-text-field--outlined">
                                                    <input type="text" class="mdc-text-field__input" id="fname"
                                                           name="fname" required
                                                           autocomplete="off">
                                                    <div class="mdc-notched-outline">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                            <label for="fname"
                                                                   class="mdc-floating-label">First name</label>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                                <div class="mdc-text-field mdc-text-field--outlined">
                                                    <input type="text" class="mdc-text-field__input" id="lname"
                                                           name="lname" required
                                                           autocomplete="off">
                                                    <div class="mdc-notched-outline">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                            <label for="lname"
                                                                   class="mdc-floating-label">Last name</label>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
                                                    <i class="material-icons mdc-text-field__icon">phone</i>
                                                    <input autocomplete="off" type="tel" required
                                                           class="mdc-text-field__input "
                                                           name="phone"
                                                           id="phone">
                                                    <div class="mdc-notched-outline">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                            <label for="phone"
                                                                   class="mdc-floating-label">Phone</label>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-trailing-icon">
                                                    <i class="material-icons mdc-text-field__icon">email</i>
                                                    <input autocomplete="off" type="email" required
                                                           class="mdc-text-field__input "
                                                           name="email"
                                                           id="email">
                                                    <div class="mdc-notched-outline">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                            <label for="text-field-hero-input"
                                                                   class="mdc-floating-label">Email</label>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                                <div class="mdc-select " style="width: 100%;"
                                                     data-mdc-auto-init="MDCSelect">
                                                    <input type="hidden" required name="role" id="role">
                                                    <i class="mdc-select__dropdown-icon"></i>
                                                    <div class="mdc-select__selected-text"></div>
                                                    <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                                                        <ul class="mdc-list">
                                                            <li class="mdc-list-item mdc-list-item--selected"
                                                                data-value="" aria-selected="true">
                                                            </li>
                                                            <li class="mdc-list-item" data-value="admin">
                                                                Admin
                                                            </li>
                                                            <li class="mdc-list-item" data-value="agent">
                                                                Agent
                                                            </li>
                                                            <li class="mdc-list-item" data-value="supplier">
                                                                Supplier
                                                            </li>
                                                            <li class="mdc-list-item" data-value="stock_manager">
                                                                Stock Manager
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <span class="mdc-floating-label">Pick a role</span>
                                                    <div class="mdc-line-ripple"></div>
                                                </div>
                                            </div>

                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
                                                    <i class="material-icons mdc-text-field__icon">lock</i>
                                                    <input autocomplete="off" type="password" required
                                                           class="mdc-text-field__input"
                                                           id="pass1" name="pass1"/>
                                                    <div class="mdc-notched-outline">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                            <label for="pass1"
                                                                   class="mdc-floating-label">Password</label>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3 mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">


                                                <label class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea mdc-text-field--no-label">
                                                        <textarea placeholder="Address" class="mdc-text-field__input"
                                                                  id="city_name" name="city_name" rows="2" cols="40"
                                                                  aria-label="Label"></textarea>
                                                    <div class="mdc-notched-outline">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                            <label for="city_name"
                                                                   class="mdc-floating-label">Address</label>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                                </label>
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
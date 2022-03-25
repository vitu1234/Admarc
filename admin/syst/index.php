<?php
session_start();
//unset($_SESSION['user']);
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}
$logged_user = $_SESSION['user'];
//print_r($_SESSION);
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
        <div class="page-wrapper mdc-toolbar-fixed-adjust">
            <main class="content-wrapper">
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                            <div class="mdc-card info-card info-card--success">
                                <div class="card-inner">
                                    <h5 class="card-title">Farm Produce</h5>
                                    <h5 class="font-weight-light pb-2 mb-1 border-bottom">62,000</h5>
                                    <!--                                    <p class="tx-12 text-muted">48% target reached</p>-->
                                    <div class="card-icon-wrapper">
                                        <i class="material-icons">dvr</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                            <div class="mdc-card info-card info-card--danger">
                                <div class="card-inner">
                                    <h5 class="card-title">Annual Sales</h5>
                                    <h5 class="font-weight-light pb-2 mb-1 border-bottom">K1,958,104.00</h5>
                                    <!--                                    <p class="tx-12 text-muted">55% target reached</p>-->
                                    <div class="card-icon-wrapper">
                                        <i class="material-icons">attach_money</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                            <div class="mdc-card info-card info-card--primary">
                                <div class="card-inner">
                                    <h5 class="card-title">Profits</h5>
                                    <h5 class="font-weight-light pb-2 mb-1 border-bottom">K234,769.00</h5>
                                    <!--                                    <p class="tx-12 text-muted">87% target reached</p>-->
                                    <div class="card-icon-wrapper">
                                        <i class="material-icons">trending_up</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                            <div class="mdc-card info-card info-card--info">
                                <div class="card-inner">
                                    <h5 class="card-title">All Users</h5>
                                    <h5 class="font-weight-light pb-2 mb-1 border-bottom">10</h5>
                                    <!--                                    <p class="tx-12 text-muted">87% target reached</p>-->
                                    <div class="card-icon-wrapper">
                                        <i class="material-icons">credit_card</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                            <div class="mdc-card">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title mb-0">Sales by location</h4>
                                    <div>
                                        <i class="material-icons refresh-icon">refresh</i>
                                        <i class="material-icons options-icon ml-2">more_vert</i>
                                    </div>
                                </div>
                                <div class="d-block d-sm-flex justify-content-between align-items-center">
                                    <h5 class="card-sub-title mb-2 mb-sm-0">Sales performance based by
                                        branch</h5>
                                    <div class="menu-button-container">
                                        <button class="mdc-button mdc-menu-button mdc-button--raised button-box-shadow tx-12 text-dark bg-white font-weight-light">
                                            Last 7 days
                                            <i class="material-icons">arrow_drop_down</i>
                                        </button>
                                        <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                            <ul class="mdc-list" role="menu" aria-hidden="true"
                                                aria-orientation="vertical">
                                                <li class="mdc-list-item" role="menuitem">
                                                    <h6 class="item-subject font-weight-normal">Today</h6>
                                                </li>
                                                <li class="mdc-list-item" role="menuitem">
                                                    <h6 class="item-subject font-weight-normal">Last 30 days</h6>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdc-layout-grid__inner mt-2">
                                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-6-tablet"></div>
                                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                                        <div class="table-responsive">
                                            <table class="table dashboard-table">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        Likuni Branch
                                                    </td>
                                                    <td>K100,671.10</td>
                                                    <!--                                                    <td class=" font-weight-medium"> 39%</td>-->
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Zolozolo Branch
                                                    </td>
                                                    <td>K103,64.75</td>
                                                    <!--                                                    <td class=" font-weight-medium"> 30%</td>-->
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Katete
                                                        Branch
                                                    </td>
                                                    <td>K31,055.08</td>
                                                    <!--                                                    <td class=" font-weight-medium"> 45%</td>-->
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Kabudula Branch
                                                    </td>
                                                    <td>111,045.49</td>
                                                    <!--                                                    <td class=" font-weight-medium"> 80%</td>-->
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--                                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">-->
                                    <!--                                        <div id="revenue-map" class="revenue-world-map"></div>-->
                                    <!--                                    </div>-->
                                </div>
                            </div>
                        </div>

                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                            <div class="mdc-card">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-2 mb-sm-0">Sales Overview</h4>
                                    <div class="d-flex justtify-content-between align-items-center">
<!--                                        <p class="d-none d-sm-block text-muted tx-12 mb-0 mr-2">Goal reached</p>-->
<!--                                        <i class="material-icons options-icon">more_vert</i>-->
                                    </div>
                                </div>
                                <div class="d-block d-sm-flex justify-content-between align-items-center">
<!--                                    <h6 class="card-sub-title mb-0">Sales performance revenue based by country</h6>-->

                                </div>
                                <div class="chart-container mt-4">
                                    <canvas id="revenue-chart" height="260"></canvas>
                                </div>
                            </div>
                        </div>
<!--                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-8-tablet">-->
<!--                            <div class="mdc-card">-->
<!--                                <div class="d-flex d-lg-block d-xl-flex justify-content-between">-->
<!--                                    <div>-->
<!--                                        <h4 class="card-title">Order Statistics</h4>-->
<!--                                        <h6 class="card-sub-title">Customers 58.39k</h6>-->
<!--                                    </div>-->
<!--                                    <div id="sales-legend" class="d-flex flex-wrap"></div>-->
<!--                                </div>-->
<!--                                <div class="chart-container mt-4">-->
<!--                                    <canvas id="chart-sales" height="260"></canvas>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>
            </main>
            <?php include("includes/footer.php"); ?>
        </div>
    </div>
</div>
<?php include('includes/scripts.php'); ?>
</body>
</html> 
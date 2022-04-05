<!-- partial:partials/_navbar.html -->
<?php
$html = '';
$counter = 0;
$cart_total = 0;
if (!empty($_SESSION['cart']) && isset($_SESSION['cart'])) {

    $html = '';
    $html .= '
        <table style="width: 100%" class="table ">
            <tbody>
                <tr>
                   <th style="text-align: left; padding-left:  30px; width: 40%;"><small>Product Name</small></th>
                    <th style="text-align: left; width: 30%;" ><small>Price (K)</small></th>
                    <th style="text-align: left;width: 20%; " ><small>Quantity</small></th>
                    <th style="text-align: left; width: 10%;"></th>
            ';
    foreach ($_SESSION['cart'] as $item) {

        $prod_id = $item['prod_id'];
        $product_name = $item['product_name'];

        $qty = $item['qty'];
        $cart_total += $item['price'];
        $html .= '
				<tr>
				<td style="text-align: left">' . $item["product_name"] . '</td>
				<td style="text-align: left">' . $item["price"] . '</td>
				<td  style="text-align: left">' . $item["qty"] . '</td>
				<td style="text-align: left">
				    <a onclick="deleteFromCart(\'' . $item['prod_id'] . '\')" href="#" class="mdc-button mdc-button--danger icon-sm">
                                                <i class="mdi mdi-trash-can-outline mr-2 tx-16"></i>
                     </a>
                </td>
				</tr>
            ';
    }

    $html .= '
            </tbody>
            </table>
            ';

    $counter = count($_SESSION['cart']);
} else {
    $html = '<span class="p-5">No Items in your cart</span>';


}


?>
<header class="mdc-top-app-bar">
    <div class="mdc-top-app-bar__row">
        <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">
                menu
            </button>
            <!--                    <span class="mdc-top-app-bar__title">Greetings -->
            <? //=$user['fname']?><!--!</span>-->

        </div>
        <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
            <div class="menu-button-container menu-profile d-none d-md-block">
                <button class="mdc-button mdc-menu-button">
                <span class="d-flex align-items-center">
                  <span class="figure">
                    <img src="../assets/images/faces/face1.jpg" alt="user" class="user">
                  </span>
                  <span class="user-name"><?= $logged_user['fname'] ?></span>
                </span>
                </button>
                <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                        <li class="mdc-list-item" role="menuitem">
                            <div class="item-thumbnail item-thumbnail-icon-only">
                                <i class="mdi mdi-account-edit-outline text-primary"></i>
                            </div>
                            <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="item-subject font-weight-normal">Edit profile</h6>
                            </div>
                        </li>
                        <li class="mdc-list-item" role="menuitem">
                            <div class="item-thumbnail item-thumbnail-icon-only">
                                <i class="mdi mdi-settings-outline text-primary"></i>
                            </div>
                            <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="item-subject font-weight-normal">Logout</h6>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="divider d-none d-md-block"></div>

            <div class="menu-button-container">
                <button class="mdc-button mdc-menu-button">
                    <i class="mdi mdi-bell"></i>
                </button>
                <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                    <h6 class="title"><i class="mdi mdi-bell-outline mr-2 tx-16"></i> Notifications</h6>
                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                        <li class="mdc-list-item" role="menuitem">
                            <div class="item-thumbnail item-thumbnail-icon">
                                <i class="mdi mdi-email-outline"></i>
                            </div>
                            <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="item-subject font-weight-normal">You received a new message</h6>
                                <small class="text-muted"> 6 min ago </small>
                            </div>
                        </li>
                        <li class="mdc-list-item" role="menuitem">
                            <div class="item-thumbnail item-thumbnail-icon">
                                <i class="mdi mdi-account-outline"></i>
                            </div>
                            <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="item-subject font-weight-normal">New user registered</h6>
                                <small class="text-muted"> 15 min ago </small>
                            </div>
                        </li>
                        <li class="mdc-list-item" role="menuitem">
                            <div class="item-thumbnail item-thumbnail-icon">
                                <i class="mdi mdi-alert-circle-outline"></i>
                            </div>
                            <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="item-subject font-weight-normal">System Alert</h6>
                                <small class="text-muted"> 2 days ago </small>
                            </div>
                        </li>
                        <li class="mdc-list-item" role="menuitem">
                            <div class="item-thumbnail item-thumbnail-icon">
                                <i class="mdi mdi-update"></i>
                            </div>
                            <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="item-subject font-weight-normal">You have a new update</h6>
                                <small class="text-muted"> 3 days ago </small>
                            </div>
                        </li>
                    </ul>
                </div>


            </div>

            <div class="menu-button-container">
                <button class="mdc-button mdc-menu-button">
                    <i class="mdi mdi-cart"></i>
                    <span class="count-indicator">
                  <span id="cartCounter" class="count"><?= $counter ?></span>
                </span>
                </button>
                <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                    <h6 class="title"><i class="mdi mdi-cart-outline mr-2 tx-16"></i> Cart Items | <a
                                href="checkout.php"><i class="mdi mdi-paypal-outline mr-2 tx-16"></i> Checkout
                            Cart >>></a> <small id="cart_total" class="title"><b>Total:</b>
                            K<?= number_format($cart_total, 2) ?></small></h6>


                    <div style="width: 500px" class="table-responsive" id="cartItems">
                        <?= $html ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- partial -->
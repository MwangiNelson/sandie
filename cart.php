<?php
$session = session_start();
require_once("methods.php");


if (isset($_POST["deleteItem"])) {
    if (isset($_SESSION["cart"])) {
        $removableElement = $_POST['currentItem'];
        $itemTotal = $_POST['currentItemTotal'];
        $itemQuantity = $_POST['currentItemQuantity'];
        $varTotalPrice =  $_SESSION["totals"]["totalPrice"];

        array_splice($_SESSION['cart'], $removableElement, 1);


        if ($varTotalPrice < 0) {
            $_SESSION["totals"]["totalQuantity"] = 0;
        } else {
            $_SESSION["totals"]["totalQuantity"] -= $itemQuantity;
        }

        if ($varTotalPrice <= 0) {
            $_SESSION["totals"]["totalPrice"] = 0;
        } else {
            $varTotalPrice -= $itemTotal;
            $_SESSION["totals"]["totalPrice"] = $varTotalPrice;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("components/header.php"); ?>
</head>

<body>
    <?php include("components/navbar.php"); ?>
    <div class="cart">
        <div class="head py-3">
            <h2>CART</h2>
        </div>
        <span class="line3"></span>
        <div class="cart-table">
            <div class="table">
                <table class="cart-products">
                    <thead class="thead">
                        <tr>
                            <td>Item</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['cart'])) : ?>
                            <?php $currentItem = 0; ?>
                            <?php if (!empty($_SESSION['cart'])) : ?>
                                <?php foreach ($_SESSION['cart'] as $cartItem) : ?>
                                    <tr>
                                        <td class="product-image">
                                            <img src="images/<?php echo $cartItem['product_img']; ?>" alt="">
                                            <h6><?php echo $cartItem['product_name']; ?></h6>
                                        </td>
                                        <td id="price">
                                            $ <?php echo $cartItem['product_price']; ?> .00
                                        </td>
                                        <td class="product-amt">
                                            <button id="add">+</button>
                                            <span id="value"><?php echo $cartItem['product_quantity']; ?></span>
                                            <button id="minus">-</button>
                                        </td>
                                        <td>
                                            <form action="cart.php" method="post">

                                                <button class="btn btn-danger" type="submit" name="deleteItem">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                                <input type="hidden" class="cat_id" name="currentItem" value="<?php echo $currentItem; ?>">
                                                <input type="hidden" class="cat_id" name="currentItemQuantity" value="<?php echo $cartItem['product_quantity']; ?>">
                                                <input type="hidden" class="cat_id" name="currentItemTotal" value="<?php echo ($cartItem['product_price'] * $cartItem['product_quantity']); ?>">

                                            </form>
                                        </td>
                                    </tr>

                                    <?php $currentItem++; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr class="w-100 p-4">
                                    <td class="w-100 p-3 empty">
                                        <?php echo "No products in cart"; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php else : ?>
                            <tr class="w-100 p-4">
                                <td class="w-100 p-3 empty">
                                    <?php echo "No products in cart"; ?>
                                </td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
            <div class="checkout">
                <div class="checkout-head">
                    <h2>CHECKOUT</h2>
                </div>
                <span class="line2"></span>
                <div class="totals-tbl">
                    <table>
                        <tr>
                            <td>Total Items:</td>
                            <td id="c-items"> <?php
                                                if (!isset($_SESSION['totals'])) {
                                                    echo '0';
                                                } else {
                                                    echo $_SESSION["totals"]["totalQuantity"];
                                                }
                                                ?></td>
                        </tr>
                        <tr>
                            <td>Total Payable:</td>
                            <td id="totals"><?php
                                            if (!isset($_SESSION['totals'])) {
                                                echo '0';
                                            } else {
                                                echo $_SESSION["totals"]["totalPrice"];
                                            }
                                            ?></td>
                        </tr>
                    </table>
                </div>
                <span class="line2"></span>
                <div class="terms">
                    <input type="checkbox" name="tnc" id="tnc" class="form-check-input mx-2">
                    I agree to <b>Terms $ Conditions</b>
                </div>
                <span class="line2"></span>
                <div class="checkout-btns">
                    <button class="btn-checkout" onclick="alert_user()">Checkout</button>
                </div>
                <div class="exit">
                    <a href="store.php"><button class="btn btn-text">Continue Shopping <i class="fa-solid fa-cart-plus px-2"></i></button></a>
                </div>
            </div>
        </div>

    </div>
    <?php include("components/footer.php"); ?>
    <script>
        var open_mod = document.getElementById("pane");

        function close_log() {
            open_mod.style.display = "none";
        }

        function open_log() {
            open_mod.style.display = "inline-flex";
        }

        function alert_user() {
            alert("Sorry but our lazy developer is working on it...");
        }
    </script>
</body>

</html>
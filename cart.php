<?php
$session = session_start();
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
                        <tr>
                            <td class="product-image">
                                <img src="images/sweater.jpg" alt="">
                                <h6>100% Cotton Sweater</h6>
                            </td>
                            <td id="price">
                                50.00
                            </td>
                            <td class="product-amt">
                                <button id="add">+</button>
                                <span id="value">1</span>
                                <button id="minus">-</button>
                            </td>
                            <td>
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
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
                            <td id="c-items"> 1</td>
                        </tr>
                        <tr>
                            <td>Total Payable:</td>
                            <td id="totals"> 50.00</td>
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
                    <button class="btn-checkout">Checkout</button>
                </div>
                <div class="exit">
                    <a href="store.php"><button class="btn btn-text">Continue Shopping <i class="fa-solid fa-cart-plus px-2"></i></button></a>
                </div>
            </div>
        </div>

    </div>
    <?php include("components/footer.php"); ?>
    <script>
        var add = document.getElementById("add");
        var c_items = document.getElementById("c-items");
        var minus = document.getElementById("minus");
        var items = document.getElementById("value");
        var price = document.getElementById("price").innerHTML;
        var totals = document.getElementById("totals");
        var valueprod = items.innerHTML;
        var product_amount = parseInt(valueprod);

        add.addEventListener('click', function() {
            product_amount++;
            items.innerHTML = product_amount;
            c_items.innerHTML = product_amount;
            totals.innerHTML = price * product_amount;
        })
        minus.addEventListener('click', function() {
            if (product_amount > 1) {
                product_amount--;
                items.innerHTML = product_amount;
                c_items.innerHTML = product_amount;
                totals.innerHTML = price * product_amount;
            }

        })
    </script>
</body>

</html>
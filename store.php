<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("components/header.php"); ?>
</head>

<body>
    <?php include("components/navbar.php"); ?>
    <div class="store">
        <div class="py-4 w-100 head">
            <h2>SANDYSTORE</h2>
        </div>
        <div class="category-links">
            <ul>
                <li><button class="category-btn-active" id="b-1">All</button> </li>
                <li><button class="category-btn" id="b-2">Mens</button> </li>
                <li><button class="category-btn" id="b-3">Women</button> </li>
                <li><button class="category-btn" id="b-4">Kids</button> </li>
            </ul>
            <span class="line"></span>
        </div>
        <div class="card-display">
            <div class="item-card">
                <div class="img-sect">
                    <img src="images/sweater.jpg" alt="">
                </div>
                <div class="item-details">
                    <span class="cost">$50.00</span>
                    <p>100% Cotton sweater</p>
                    <div class="count">
                        <button id="add">+</button>
                        <span id="value" style="width:2vw; font-size:2.5vh; align-items:center;">1</span>
                        <button id="minus">-</button>
                    </div>
                    <button class="add-2-cart">
                        Add To Cart
                    </button>
                </div>
            </div>
        </div>

    </div>
    <?php include("components/footer.php"); ?>

    <script>
        var b1 = document.getElementById("b-1");
        var b2 = document.getElementById("b-2");
        var b3 = document.getElementById("b-3");
        var b4 = document.getElementById("b-4");
        var add = document.getElementById("add");
        var minus = document.getElementById("minus");
        var items = document.getElementById("value");
        var valueprod = document.getElementById("value").innerHTML;
        var product_amount = parseInt(valueprod);
        b1.addEventListener('click', function() {
            b1.className = "category-btn-active"
            b2.className = "category-btn"
            b3.className = "category-btn"
            b4.className = "category-btn"
        })
        b2.addEventListener('click', function() {
            b2.className = "category-btn-active"
            b1.className = "category-btn"
            b3.className = "category-btn"
            b4.className = "category-btn"
        })
        b3.addEventListener('click', function() {
            b3.className = "category-btn-active"
            b2.className = "category-btn"
            b1.className = "category-btn"
            b4.className = "category-btn"
        })
        b4.addEventListener('click', function() {
            b4.className = "category-btn-active"
            b2.className = "category-btn"
            b3.className = "category-btn"
            b1.className = "category-btn"
        })

        add.addEventListener('click', function() {
            product_amount++;
            items.innerHTML = product_amount;
        })
        minus.addEventListener('click', function() {
            if (product_amount > 1) {
                product_amount--;
                items.innerHTML = product_amount;
            }

        })
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("components/header.php") ?>
</head>

<body>
    <?php include("components/navbar_sp.php"); ?>
    <div class="admin-container">
        <div class="head-admin py-2">
            <h2>ADMINISTRATOR MENU</h2>
        </div>
        <div class="display">
            <div class="admin-options mx-2">
                <ul>
                    <li><button class="btn btn-text">Add Items</button></li>
                    <li><button class="btn btn-text">View Items</button></li>
                    <li><button class="btn btn-text">View Users</button></li>
                    <li><button class="btn btn-text">Edit Profile</button></li>
                </ul>
            </div>
            <div class="panel m-2">
                <div class="panel-head">
                    <h2>Add Items</h2>
                </div>
                <span class="line2"></span>
                <div class="panel-actions">
                    <div class="image-update">
                        <img src="images/add-image.png" id="product_img" alt="">
                        <input type="file" name="" id="product_img_select" class="mx-2">
                    </div>
                    <div class="product-details">
                        <h2>Product details</h2>
                        <span class="line2"></span>
                        <div class="form-group w-100 p-2">
                            <small>Product name:</small>
                            <input type="text" name="prduct_name" id="p_name" placeholder="Product name" class="form-control">
                        </div>
                        <div class="form-group w-100 p-2">
                            <small>Product quantity:</small>
                            <input type="number" name="prduct_qty" id="p_qty" placeholder="Product quantity" class="form-control">
                        </div>
                        <div class="form-group w-100 p-2">
                            <small>Product gender:</small>
                            <select name="gender" id="" class="form-control">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Kids</option>
                            </select>
                        </div>
                        <button class="btn btn-primary m-3 ">Add Item</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        const imageSelect = document.getElementById("product_img_select");
        const imagecontainer = document.getElementById("product_img");

        imageSelect.addEventListener("change", function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function() {
                    imagecontainer.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            }
        })
    </script>
</body>

</html>
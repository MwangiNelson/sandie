<?php
require_once("methods.php");
session_start();

?>



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
                    <li><button onclick="showPanel_1()" class="btn btn-text">Add Items</button></li>
                    <li><button onclick="showPanel_2()" class="btn btn-text">View Users</button></li>
                    <li><button onclick="showPanel_3()" class="btn btn-text">View Products</button></li>
                    <li><a href="landing.php"><button class="btn btn-text">Exit To App</button></a></li>
                </ul>
            </div>
            <div class="panel-main m-2" id="1">
                <div class="panel-head">
                    <h2>Add Items</h2>
                </div>
                <span class="line2"></span>
                <div class="panel-actions">
                    <form class="add-Prod-form" action="product_conn.php" method="post" enctype="multipart/form-data">
                        <div class="image-update">
                            <img src="images/search.png" id="product_img" alt="">
                            <input type="file" name="product_image" id="product_img_select" class="mx-2">
                        </div>
                        <div class="product-details p-3">
                            <h2>Product details</h2>
                            <span class="line2"></span>
                            <div class="form-group w-100 p-2">
                                <small>Product name:</small>
                                <input type="text" name="product_name" id="p_name" placeholder="Product name" class="form-control">
                            </div>
                            <div class="form-group w-100 p-2">
                                <small>Product quantity:</small>
                                <input type="number" name="product_quantity" id="p_qty" placeholder="Product quantity" class="form-control">
                            </div>
                            <div class="form-group w-100 p-2">
                                <small>Product price:</small>
                                <input type="number" name="product_price" id="p_price" placeholder="Product price" class="form-control">
                            </div>
                            <div class="form-group w-100 p-2">
                                <small>Product gender:</small>
                                <select class="form-control" name="product_gender">
                                    <option value="1">Female</option>
                                    <option value="2">Male</option>
                                    <option value="3">Kids</option>
                                    <option value="4">Uneedsex</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary m-3 ">Add Item</button>
                        </div>
                    </form>
                </div>


            </div>
            <div class="panel m-2" id="2">
                <div class="panel-head">
                    <h2>Users Display</h2>
                </div>
                <span class="line2"></span>
                <div class="panel-actions">
                    <div class="user_tbl w-100">
                        <table>
                            <thead class="user_head">
                                <tr>
                                    <td>User Id</td>
                                    <td>User Email</td>
                                    <td>User Name</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql_Select = "SELECT * FROM tbl_users WHERE user_role = 1;"; //Obtaining all products
                                $data = getDat2($sql_Select);

                                if ($data != 0) {
                                    for ($i = 0; $i < count($data); $i++) {
                                        $user_name = $data[$i]["users_name"];
                                        $user_email = $data[$i]["user_email"];
                                        $user_id = $data[$i]["users_id"];
                                ?>

                                        <tr class="user-row">
                                            <td><?php echo $user_id; ?></td>
                                            <td><?php echo $user_email; ?></td>
                                            <td><?php echo $user_name; ?></td>
                                            <td><button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></td>
                                        </tr>

                                <?php
                                    }
                                } else {
                                    echo "No Users found";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>


            </div>
            <div class="panel m-2" id="3">
                <div class="panel-head">
                    <h2>Products Display</h2>
                </div>
                <span class="line2"></span>
                <div class="panel-actions">
                    <div class="user_tbl w-100">
                        <table>
                            <thead class="user_head">
                                <tr>
                                    <td>Product Id</td>
                                    <td>Product Image</td>
                                    <td>Product Name</td>
                                    <td>Product Price</td>
                                    <td>Product Quantity</td>
                                    <td>Product Category</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql_Select_prods = "SELECT * FROM tbl_products;"; //Obtaining all products
                                $data_products = getDat2($sql_Select_prods);

                                if ($data_products != 0) {
                                    for ($i = 0; $i < count($data_products); $i++) {
                                        $product_gender = $data_products[$i]["product_gender"];
                                        $product_price = $data_products[$i]["product_price"];
                                        $product_name = $data_products[$i]["product_name"];
                                        $product_quantity = $data_products[$i]["product_quantity"];
                                        $product_id = $data_products[$i]["product_id"];
                                        $product_image = $data_products[$i]["product_image"];
                                ?>

                                        <tr class="user-row">
                                            <td><?php echo $product_id; ?></td>
                                            <td><img class="prod_img" src="images/<?php echo $product_image; ?>" alt=""></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td><?php echo $product_price; ?></td>
                                            <td><?php echo $product_quantity; ?></td>
                                            <td><?php if ($product_gender == "1") {
                                                    echo "Female";
                                                }
                                                if ($product_gender == "2") {
                                                    echo "Male";
                                                }
                                                if ($product_gender == "3") {
                                                    echo "Kids";
                                                } elseif ($product_gender == "4") {
                                                    echo "Unisex";
                                                }

                                                ?></td>
                                            <td>
                                                <form action="delete.php" method="post">
                                                    <input class="cat_id" value="<?php echo $product_id; ?>" name="product_id">
                                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                } else {
                                    echo "No Users found";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <script>
        const imageSelect = document.getElementById("product_img_select");
        const imagecontainer = document.getElementById("product_img");

        const panel_1 = document.getElementById("1");
        const panel_2 = document.getElementById("2");
        const panel_3 = document.getElementById("3");
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

        function showPanel_1() {
            panel_2.style.display = "none";
            panel_1.style.display = "inline-flex";
            panel_3.style.display = "none";
        }

        function showPanel_2() {
            panel_1.style.display = "none";
            panel_2.style.display = "inline-flex";
            panel_3.style.display = "none";
        }

        function showPanel_3() {
            panel_1.style.display = "none";
            panel_2.style.display = "none";
            panel_3.style.display = "inline-flex";
        }
    </script>
</body>

</html>
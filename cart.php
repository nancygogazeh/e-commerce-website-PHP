<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "e-commerce-website-php");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
if (isset($_POST['checkout'])) {
    header('location:./checkout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CART</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./includes/bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<!-- Navbar -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light text-black">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="index.php">
                    <img class="rounded-circle" height="40" src="./image/bookstore.png" height="15" alt="book Logo" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Baghdad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="store.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact-us</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <a class="text-reset me-3" href="#">
                    <i class="fas fa-shopping-cart"></i>
                </a>

                <!-- Notifications -->
                <div class="mr-3">
                    <a href="./cart.php"><img class="rounded-circle" height="25" src="./image/icon.png" /> </a>
                </div>


                <!-- Avatar -->
                <div class="mx-3">
                    <a href="./accountpage.php"><img class="rounded-circle" height="25" src="./image/user.png" /> </a>
                </div>


            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
</header>
<!-- Navbar -->
<div class="container-fluid bg-light h-100">
    <div class="container text-center ">
        <h1 style="font-size: 64px; color:#54595f;" class="p-5">Cart</h1>

    </div>
    <table class="table cart align-middle ">
        <thead class="bg-white">
            <tr>
                <th colspan="2"></th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>

            <?php

            if (isset($_SESSION['cart'])) {
                $array = array();
                for ($j = 0; $j < count($_SESSION['cart']); $j++) {
                    array_push($array, $_SESSION['cart'][$j]['id_item']);
                }

                $non_dublicates = array_count_values($array);
                $_SESSION['nondublicate'] = $non_dublicates;
                if (count($non_dublicates) > 0) {
                    $sum = 0;
                    foreach ($non_dublicates as $k => $v) {

                        $sql = "SELECT id,image, name,price FROM products where id= " . $k;

                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($result);
                        $sum += $v * $row[3];
            ?>
                        <tr>
                            <td class="product-remove">
                                <form action="" method="post">
                                    <button type="submit" name="delete" value="<?php echo $row[0]; ?>" class="btn" onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <img src="<?php echo "./admin/images/" . $row[1] ?>" alt="book image" srcset="" style="width:150px;height:150px;">
                            </td>
                            <td>
                                <a href="./single-product.php?id=<?php echo $row[0] ?>" class="text-decoration-none"><?php echo $row[2] ?></a>
                            </td>
                            <td>
                                <bdi>
                                    <?php echo $row[3]; ?>
                                </bdi>
                            </td>
                            <td>
                                <input type="number" class="input-group-text ms-auto" min="0" value="<?php echo $v ?>">
                            </td>
                            <td>
                                <bdi>
                                    <?php echo "$" . ($v * $row[3]); ?>
                                </bdi>
                            </td>
                        </tr>
            <?php
                    }
                }
            }


            ?>


        </tbody>
        <!-- <div class=" col-md-3 row">
            <input type="text" class="input-group-text  col-md-6">
            <button class="btn btn-success ms-auto col-md-6">Apply Coupon</button>
        </div>
 -->

    </table>
    <div class="container-fluid my-5">
        <div class="row">
            <table class="col-4 ms-auto table  table-bordered cart-totals">
                <thead>
                    <tr class="bg-white">
                        <th colspan="2">
                            <h3 class="p-3">Cart totals</h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td>Subtotal</td>
                        <td>
                            <bdi><?php if (!isset($sum)) {
                                        $sum = 0;
                                        echo "$" . $sum;
                                    } else {

                                        echo $sum;
                                    } ?></bdi>
                        </td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Shipping to 21, as'salt, as'saly, 156189.</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>
                            <?php if (!isset($sum)) {
                                $sum = 0;
                                echo "$" . $sum;
                            } else {
                                echo "$" . ($sum + 10);
                            } ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">

                            <?php
                            if (empty($_SESSION['login']) || $sum == 0) {
                                echo "
                                <form method='get' action='./store.php'>
                                <div class='alert alert-warning' role='alert'>
                                You must login to checkout order OR You have an EMPTY CART! <a href='./login.php'>login</a>
                                </div>
                                <button class='cart-btn w-100' type='submit' disabled style='background-color:grey;'>Checkout</button>
                                </form>
                                ";
                            } else {
                                $_SESSION['sum'] = $sum;
                            ?>

                                <form method='post' action='./checkout.php'>
                                    <input type="hidden" name="nondublicate" value="<?php $non_dublicates ?>">
                                    <input type="hidden" name="sum" value="<?php $sum ?>">
                                    <button class='cart-btn w-100' name='checkout' type='submit'>Checkout</button>
                                </form>
                            <?php                            }
                            ?>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>





<!-- Footer -->
<footer class="bg-dark text-center text-white mt-5">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg><i class="fab fa-facebook-f"></i></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg><i class="fab fa-twitter"></i></a>

            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com/" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                </svg><i class="fab fa-google"></i></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg><i class="fab fa-instagram"></i></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                </svg><i class="fab fa-linkedin-in"></i></a>



        </section>
        <!-- Section: Social media -->




        <!--Grid column-->
    </div>
    <!--Grid row-->
    </form>
    </section>
    <!-- Section: Form -->

    <!-- Section: Text -->

    <!-- Section: Text -->

    <!-- Section: Links -->
    <section class="">
        <!--Grid row-->
        <div class="row justify-content-center">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Quick Links</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="index.php" class="text-white">Home</a>
                    </li>
                    <li>
                        <a href="contact.php" class="text-white">Contact</a>
                    </li>
                    <li>
                        <a href="account-page.php" class="text-white">Account page</a>
                    </li>
                    <li>
                        <a href="cart.php" class="text-white">Cart</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->



            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Category</h5>
                <?php



                $sql = "SELECT id,category_name FROM category limit 5";
                $result = $conn->query($sql);


                if ($result->num_rows > 0) {
                    // output data of each row
                ?>

                    <div class="col-12 pb-5">
                        <ul class="list-unstyled mb-0">
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <li>
                                    <a href="./category.php?category_name=<?php echo $row['category_name']; ?>" class="text-white"><?php echo $row['category_name'] ?></a>
                                </li>



                        <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </div>



            </div>
            <!--Grid column-->

            <!--Grid column-->

            <!--Grid column-->
        </div>
        <!--Grid row-->
    </section>
    <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">Baghdad.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->



<script src="./includes/bootstrap-5.2.1-dist/js/bootstrap.min.js"></script>
</body>

</html>
<?php

if (isset($_POST['delete'])) {

    for ($j = 0; $j < count($_SESSION['cart']); $j++) {
        if ($_SESSION['cart'][$j]['id_item'] == $_POST['delete']) {
            unset($_SESSION['cart'][$j]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
?>
            <script>
                alert("Product Updated Successfully");
                window.location.href = "cart.php";
            </script>
<?php
        }
    }
}
?>
<?php
include "./includes/header.php";
?>
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
            <tr>
                <td class="product-remove">
                    <i class="bi bi-x-circle"></i>
                </td>
                <td>
                    <img src="https://via.placeholder.com/150" alt="book image" srcset="">
                </td>
                <td>
                    <a href="#" class="text-decoration-none">Book name</a>
                </td>
                <td>
                    <bdi>
                        99.99$
                    </bdi>
                </td>
                <td>
                    <input type="number" class="input-group-text ms-auto" min="0">
                </td>
                <td>
                    <bdi>
                        99.99$
                    </bdi>
                </td>
            </tr>
            <tr>
                <td colspan="6 ">
                    <div class="coupon-section ">
                        <div class="apply-coupon">
                            <input type="text" class="me-2">
                            <button class="ms-auto cart-btn">Apply Coupon</button>
                        </div>
                        <div class="update-cart">
                            <button class="cart-btn">Update Cart</button>
                        </div>
                    </div>

                </td>
            </tr>
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
                            <bdi>99.99$</bdi>
                        </td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Shipping to 21, as'salt, as'saly, 156189.</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>99.99$</td>
                    </tr>
                    <tr>
                        <td colspan="2">

                            <div class="cart-btn w-100">Checkout</div>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>


<?php
include "./includes/footer.php";
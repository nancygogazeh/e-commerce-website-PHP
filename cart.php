<?php
include "./includes/header.php";
?>
<div class="container-fluid bg-light h-100">
    <div class="container text-center ">
        <h1 style="font-size: 64px;" class="p-5">Cart</h1>

    </div>
    <table class="table cart">
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
                <td>X</td>
                <td>
                    <img src="https://via.placeholder.com/150" alt="" srcset="">
                </td>
                <td>
                    <p>Book name</p>
                </td>
                <td>
                    <bdi>
                        99.99$
                    </bdi>
                </td>
                <td>
                    <input type="number" class="input-group-text">
                </td>
                <td>
                    <bdi>
                        99.99$
                    </bdi>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <td colspan="6">
                <div class="d-flex mb-3">
                    <div class=""><input type="text" class="input-group-text  me-3"></div>
                    <div class=""> <button class="btn btn-success ">Apply Coupon</button></div>
                    <div class="ms-auto"><button class="btn btn-success ">Update Cart</button></div>
                </div>
            </td>
        </tfoot>
    </table>
    <div class="container-fluid my-5">
        <div class="row">
            <table class="col-4 ms-auto table" style="width:40%;">
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
                            
                            <div class="btn btn-success w-100 mx-auto">Checkout</div>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>


<?php
include "./includes/footer.php";
?>
<?php
session_start();
require_once "connect.php";
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $res = mysqli_query($conn, "Select * from user where UserId = '$id'");
    $user = mysqli_fetch_array($res);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once "partials/_navbar.php"; ?>
    <section id="cart-home" class="pt-5 mt-5 container">
        <h2 class="font-weigth-bold">Shopping Cart</h2>
        <hr>
    </section>
    <section id="cart-container" class="container">
        <table width="100%" class="table">
            <thead>
                <tr>
                    <td>Product Image</td>
                    <td>Product Name</td>
                    <td>Product Price</td>
                    <td>Product Description</td>
                    <td>Quantity</td>
                    <td>Total</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    foreach ($cart as $key => $item) {
                ?>
                        <tr class="mb-2">
                            <td data-title="Image"><img src="<?php echo $item['image'] ?>" alt="" class="mt-2"></td>
                            <td data-title="Product Name"><?php echo $item['product_name'] ?></td>
                            <td data-title="Price">
                                <span class="span-price">
                                    <?php echo $item['price'] ?>
                                </span>
                            </td>
                            <td data-title="Product Description"><?php echo $item['description'] ?></td>
                            <td data-title="Quantity">
                                <button data-id="<?php echo $key ?>" data-type="0" class="btn btn-primary btn-sm btn-update-quantity">-</button>
                                <span class="span-quantity">
                                    <?php echo $item['quantity'] ?>
                                </span>
                                <button data-id="<?php echo $key ?>" data-type="1" class="btn btn-primary btn-sm btn-update-quantity">+</button>

                            </td>
                            <td data-title="Total Price">
                                <span class="span-total">
                                    <?php echo $item['price']  *  $item['quantity'] ?>
                                </span>
                            </td>
                            <td data-title="Action">
                                <a class="btn btn-danger btn-delete-product-cart" data-id="<?php echo $key ?>">Delete</a>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </section>
    <!--  -->
    <section id="cart-bottom" class="container">
        <div class="row">
            <div class="receiver-infor col-lg-6 col-md-6 col-12 mt-5 me-5">
                <form id="receiver-form">
                    <div class="mb-3">
                        <h2 class="font-weigth-bold">Receiver Information</h2>
                        <hr>
                        <label class="form-label">Name receiver</label>
                        <input type="text" class="form-control" name="name_receiver" value="<?php echo ($user['FirstName'] ?? '') . ' ' . ($user['LastName'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $user['Address'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone number</label>
                        <input type="number" class="form-control" name="phone" value="<?php echo $user['Phone'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $user['Email'] ?? '' ?>">
                    </div>
                </form>
            </div>
            <div class="total-cart col-lg-4 col-md-6 col-12">
                <div>
                    <h2 class="font-weigth-bold mt-5">CART TOTAL</h2>
                    <hr>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $total = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            $total += $item['price'] * $item['quantity'];
                        }
                    }
                    ?>
                    <div class="d-flex justify-content-between">
                        <h6>Subtotal</h6>
                        <span class="span-sub-total">
                            <p><?php if (isset($_SESSION['cart'])) echo $total ?></p>
                        </span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Shipping</h6>
                        <p>50.000</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h6>Cart total</h6>
                        <span class="span-cart-total">
                            <p><?php if (isset($_SESSION['cart'])) echo $total + 500000 ?></p>
                        </span>
                    </div>
                    <button type="submit" form="receiver-form">PROCESS TO CHECK OUT</button>
                </div>
            </div>
        </div>
    </section>
    <div class="container text-center mt-5 py-5">

    </div>

    <?php require_once "partials/_footer.php";
    ?>
    <script>
        $(document).ready(function() {
            $('.btn-update-quantity').click(function() {
                let btn = $(this);
                let type = parseInt($(this).data('type'));
                let id = $(this).data('id');
                // console.log(type);
                $.ajax({
                    type: "GET",
                    url: "update_cart_quantity.php",
                    data: {
                        type,
                        id
                    },
                    success: function() {
                        let tr_parent = btn.parents('tr');
                        let quantity = tr_parent.find('.span-quantity').text();
                        let price = tr_parent.find('.span-price').text();
                        if (type == 1) {
                            quantity++;
                        } else
                            quantity--;
                        if (quantity < 1) {
                            tr_parent.remove();
                        } else {
                            tr_parent.find('.span-quantity').text(quantity);
                            let sum = price * quantity;
                            tr_parent.find('.span-total').text(sum);
                        }
                        getTotal();
                    }
                });
            })
            $('.btn-delete-product-cart').click(function() {
                let id = $(this).data('id')
                let btn = $(this);
                $.ajax({
                    type: "GET",
                    url: "delete_cart.php",
                    data: {
                        id
                    },
                    success: function() {
                        tr_parent = btn.parents('tr');
                        tr_parent.remove();
                        getTotal();
                    }
                });
            });
        });

        function getTotal() {
            let total = 0;
            $('.span-total').each(function() {
                total += parseFloat($(this).text());
            });
            $('.span-sub-total').text(total);
            $('.span-cart-total').text(total + 50000);
        }
        $().ready(function() {
            $("#receiver-form").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "name_receiver": {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    "address": {
                        required: true,
                        maxlength: 255
                    },
                    "email": {
                        required: true,
                        email: true,
                        maxlength: 255
                    },
                    "phone": {
                        required: true,
                        minlength: 10,
                        maxlength: 11
                    }
                },
                messages: {
                    "name_receiver": {
                        required: "Bắt buộc nhập tên người nhận",
                        minlength: "Nhập ít nhất 3 ký tự",
                        maxlength: "Nhập tối đa 50 ký tự"
                    },
                    "address": {
                        required: "Bắt buộc nhập địa chỉ",
                        maxlength: "Nhập tối đa 255 ký tự"
                    },
                    "email": {
                        required: "Bắt buộc nhập email",
                        email: "Sai định dạng email",
                        maxlength: "Nhập tối đa 255 ký tự"
                    },
                    "phone": {
                        required: "Bắt buộc nhập số điện thoại",
                        minlength: "Số điện thoại ít nhất 10 ký tự",
                        maxlength: "Số điện thoại tối đa là 11 ký tự"
                    }
                },
                submitHandler: function() {
                    $.ajax({
                        type: "POST",
                        url: "check_out_process.php",
                        data: $("#receiver-form").serializeArray(),
                        // dataType: "dataType",
                        success: function (response) {
                            if(response == 1){
                                alert('Thanh toan thanh cong');
                                location.reload();
                            }
                            else{
                                alert(response);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
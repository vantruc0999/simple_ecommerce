<?php
session_start();
require_once "connect.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
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
    <!-- NAVIGATION -->
    <?php require_once "partials/_navbar.php";
    ?>
    <!-- HOME BANNER -->
    <section id="home">
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Price This Year </span></h1>
            <p>YOUR SATISFACTION IS OUR PRIORITY</p>
            <button>SHOP NOW</button>
        </div>
    </section>
    <!-- BRAND -->
    <section id="brand" class="container">
        <div class="container text-center mt-5">
            <h3>Brands we work with</h3>
            <hr class="mx-auto">
        </div>
        <div class="row m-0 py-3">
            <div class="col-lg-2  col-md-4 col-6">
                <img src="images/apple.png" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <img src="images/samsung.png" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <img src="images/oppo-brand.jpg" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <img src="images/samsung.png" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <img src="images/apple.png" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <img src="images/samsung.png" alt="">
            </div>
        </div>
    </section>
    <!-- PRODUCT -->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our featured products</h3>
            <hr class="mx-auto">
            <p>Check out our new products with fair price</p>
        </div>

        <div class="row mx-auto container">
                <?php  
                    
                    $products = mysqli_query($conn, "Select * from product");
                    foreach($products as $item){
                ?>
                <div class="product text-center col-lg-3 col-md-4 col-12 mb-5">
                    <img src="<?php echo $item['Image'] ?>" alt="" class="mb-3 mt-3">
                    <h3 class="p-name"><?php echo $item['ProductName'] ?> </h3>
                    <h4 class="p-price"><?php echo $item['Price'] ?> </h4>
                    <h5 class="p-description"><?php echo $item['Description'] ?> </h5>
                    <button class="add-to-cart mb-3" data-id="<?php echo $item['ProductId'] ?>">Add to cart</button>
                </div>
                <?php } ?>
        </div>
    </section>


    <!-- FOOTER -->
    <?php require_once "partials/_footer.php"; ?>
    <script>
       $(document).ready(function () {
            $(".add-to-cart").click(function(){
                let id = $(this).data('id')
                $.ajax({
                    type: "GET",
                    url: "add_to_cart.php",
                    data: {id},
                    success: function (response) {
                        if(response == 1){
                            alert("Thêm vào giỏ hàng thành công");
                        }
                        else
                            alert("Thêm thất bại");
                    }
                });
            })
       });
    </script>
</body>

</html>
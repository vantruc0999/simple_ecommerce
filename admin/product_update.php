<?php
session_start();
if ($_SESSION['admin'] !== '1')
    header("Location: ../index.php");
else {
    require_once "../connect.php";
    $id = $_GET['id'];
    $res = mysqli_query($conn, "Select * from product where ProductId = '$id'");
    $product = mysqli_fetch_array($res);


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Product Management</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <?php
        ?>
        <?php require_once "partials/_nav.php" ?>
        <div id="layoutSidenav">
            <?php require_once "partials/_sidebar.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update <strong><?php echo $product['ProductName'] ?></strong></h1>
                        <form id="product-form" enctype="multipart/form-data" method="POST">
                            <div class="alert alert-danger" role="alert" id="div-error" style="display: none">

                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" value="<?php echo $product['ProductId'] ?>" id="product_id"><br>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image"><br>
                                <img src="../<?php echo $product['Image'] ?>" alt="" style="width:150px">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $product['ProductName'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" id="price" value="<?php echo $product['Price'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="category" id="category_id" class="form-select">
                                    <option value="<?php echo $product['CategoryId'] ?>">
                                        <?php
                                        $categoryId = $product['CategoryId'];
                                        $res = mysqli_query($conn, "Select CategoryName from category where CategoryId = '$categoryId'");
                                        echo mysqli_fetch_array($res)['CategoryName'];
                                        ?>
                                    </option>
                                    <?php
                                    $categories = mysqli_query($conn, "Select * from category");
                                    foreach ($categories as $item) {
                                    ?>
                                        <option value="<?php echo $item['CategoryId'] ?>"><?php echo $item['CategoryName'] ?></option>>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" value="<?php echo $product['Description'] ?>"><?php echo $product['Description'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </form>
                    </div>
                </main>
                <?php require_once "partials/_footer.php" ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
        <script src="js/scripts.js"></script>

        <script src="js/datatables-simple-demo.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#product-form").validate({
                    onfocusout: false,
                    onkeyup: false,
                    onclick: false,
                    rules: {
                        "product_name": {
                            required: true,
                            maxlength: 100
                        },
                        "price": {
                            required: true,
                            maxlength: 100
                        },
                        "category": {
                            required: true
                        },
                        "description": {
                            maxlength: 255
                        }
                    },
                    messages: {
                        "product_name": {
                            required: "Bắt buộc nhập product name",
                            maxlength: "Hãy nhập tối đa 15 ký tự",
                        },
                        "price": {
                            required: "Bắt buộc nhập price",
                            maxlength: 100
                        },
                        "category": {
                            required: "Bắt buộc chọn category"
                        },
                        "description": {
                            maxlength: "Chỉ được nhập tối đa 255 ký tự",
                        }
                    },
                    submitHandler: function() {
                        var file_data = $('#image').prop('files')[0];
                        var form_data = new FormData();
                        //thêm files vào trong form data
                        form_data.append('file', file_data);
                        form_data.append('product_id', $('#product_id').val());
                        form_data.append('product_name', $('#product_name').val());
                        form_data.append('price', $('#price').val());
                        form_data.append('description', $('#description').val());
                        form_data.append('category', $("#category_id option:selected").val());
                        $.ajax({
                            type: "POST",
                            url: "product_update_process.php",
                            data: form_data,
                            // dataType: 'html',
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                if (response !== '1') {
                                    $('#div-error').text(response);
                                    $('#div-error').show();
                                } else {
                                    alert('Cập nhật thành công');
                                    location.reload();
                                }
                            }
                        });
                    }
                });

            });
        </script>
    </body>

    </html>
<?php } ?>
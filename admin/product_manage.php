<?php
session_start();
require_once "../connect.php";

if ($_SESSION['admin'] !== '1')
    header("Location: ../index.php");
else {
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
                        <h1 class="mt-4">Manage product</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $product = mysqli_query($conn, "Select * from product");
                                foreach ($product as $key => $item) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $key + 1 ?></th>
                                        <td><img src="../<?php echo $item['Image'] ?>" alt="" style="width: 100px"> </td>
                                        <td><?php echo $item['ProductName'] ?></td>
                                        <td><?php echo number_format($item['Price']) ?></td>
                                        <td><?php echo $item['Description'] ?></td>
                                        <td>
                                            <?php 
                                                $categoryId = $item['CategoryId'];
                                                $category = mysqli_query($conn, "Select CategoryName from category where CategoryId = '$categoryId'");
                                                echo mysqli_fetch_array($category)['CategoryName'];
                                            ?>
                                        </td>
                                        <td>
                                            <a href="product_delete.php?id=<?php echo $item['ProductId'] ?>" class="btn btn-danger">Delete</a>
                                            <a href="product_update.php?id=<?php echo $item['ProductId'] ?>" class="btn btn-success">Update</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </main>
                <?php require_once "partials/_footer.php" ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script type="text/javascript">

        </script>
    </body>

    </html>
<?php } ?>
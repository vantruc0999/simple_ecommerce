<?php
session_start();
if ($_SESSION['admin'] !== '1')
    header("Location: ../index.php");
else {
    require_once "../connect.php";
    $id = $_GET['id'];
    $res = mysqli_query($conn, "Select * from orders where OrderId = '$id'");
    $order = mysqli_fetch_array($res);

    $customerId = $order['CustomerId'];
    // var_dump($customerId);
    // exit;
    $res2 = mysqli_query($conn, "Select * from user where UserId = '$customerId'");
    $customer = mysqli_fetch_array($res2);
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
                        <h1 class="mt-4">Update Order Id <strong><?php echo $order['OrderId'] ?></strong></h1>
                        <form id="order_detail_form" method="post" action="order_detail_process.php">
                            <div class="mb-3">
                                <input type="hidden" class="form-control"  value="<?php echo $id ?>" name="order_id">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">OrderId</label>
                                <input type="text" class="form-control" id="" value="<?php echo $order['OrderId'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Order Date</label>
                                <input type="text" class="form-control" id="" value="<?php echo $order['CreatedAt'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="" value="<?php echo $customer['FirstName'] . ' ' . $customer['LastName']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Receiver Name</label>
                                <input type="text" class="form-control" id="" value="<?php echo $order['NameReceiver'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Receiver Phone</label>
                                <input type="text" class="form-control" id="" value="<?php echo $order['PhoneReceiver'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Receiver Email</label>
                                <input type="text" class="form-control" id="" value="<?php echo $order['Email'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Receiver Address</label>
                                <input type="text" class="form-control" id="" value="<?php echo $order['Address'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="<?php echo $order['Status'] ?>"><?php echo $order['Status'] ?></option>
                                    <option value="delivering">delivering</option>
                                    <option value="canceled">canceled</option>
                                    <option value="done">done</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Price</label>
                                <input type="text" class="form-control" id="" value="<?php echo $order['TotalPrice'] ?>" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Edit</button>
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
     
        </script>
    </body>

    </html>
<?php } ?>
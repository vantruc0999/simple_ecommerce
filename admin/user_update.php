<?php
session_start();
if ($_SESSION['admin'] !== '1')
    header("Location: ../index.php");
else {
    require_once "../connect.php";
    $id = $_GET['id'] ?? '';
    $res = mysqli_query($conn, "Select * from user where UserId = '$id'");
    $user = mysqli_fetch_array($res);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User management</title>
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
            <div class="container">
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Update user</h1>
                            <form id="update-user-form">
                                <div class="alert alert-danger" role="alert" id="div-error" style="display: none">

                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" name="user_id" value="<?php echo $user['UserId'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" value="<?php echo $user['FirstName'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" value="<?php echo $user['LastName'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $user['Email'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $user['Address'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone number</label>
                                    <input type="number" class="form-control" name="phone" value="<?php echo $user['PhoneNumber'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" value="<?php echo $user['Password'] ?>" readonly>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                            </form>
                        </div>
                    </main>
                    <?php require_once "partials/_footer.php" ?>
                </div>
            </div>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
        <script src="js/scripts.js"></script>

        <script src="js/datatables-simple-demo.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#update-user-form").validate({
                    onfocusout: false,
                    onkeyup: false,
                    onclick: false,
                    rules: {
                        "first_name": {
                            required: true,
                            maxlength: 30,
                            minlength: 3
                        },
                        "last_name": {
                            required: true,
                            maxlength: 30,
                            minlength: 3
                        },
                        "email": {
                            required: true,
                            email: true,
                            maxlength: 80
                        },
                        "password": {
                            required: true,
                            minlength: 6
                        },
                        "re-password": {
                            equalTo: "#password",
                            minlength: 6
                        }
                    },
                    messages: {
                        "first_name": {
                            required: "Bắt buộc nhập First Name",
                        },
                        "last_name": {
                            required: "Bắt buộc nhập Last Name",
                        },
                        "email": {
                            required: "Bắt buộc nhập email",
                            maxlength: "Hãy nhập tối đa 15 ký tự",
                            email: "Vui lòng nhập email hợp lệ"
                        },
                        "password": {
                            required: "Bắt buộc nhập password",
                            minlength: "Hãy nhập ít nhất 8 ký tự"
                        },
                        "re-password": {
                            equalTo: "Hai password phải giống nhau",
                            minlength: "Hãy nhập ít nhất 8 ký tự"
                        }
                    },
                    submitHandler: function() {
                        $.ajax({
                            type: "POST",
                            url: "user_update_process.php",
                            data: $('#update-user-form').serializeArray(),
                            dataType: "html",
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
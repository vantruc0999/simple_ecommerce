<?php
session_start();
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
                            <h1 class="mt-4">Add new user</h1>
                            <form id="add-user-form">
                                <div class="alert alert-danger" role="alert" id="div-error" style="display: none">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone number</label>
                                    <input type="number" class="form-control" name="phone">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm password</label>
                                    <input type="password" class="form-control" name="re-password">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Add</button>
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
                $("#add-user-form").validate({
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
                            required: "B???t bu???c nh???p First Name",
                        },
                        "last_name": {
                            required: "B???t bu???c nh???p Last Name",
                        },
                        "email": {
                            required: "B???t bu???c nh???p email",
                            maxlength: "H??y nh???p t???i ??a 15 k?? t???",
                            email: "Vui l??ng nh???p email h???p l???"
                        },
                        "password": {
                            required: "B???t bu???c nh???p password",
                            minlength: "H??y nh???p ??t nh???t 8 k?? t???"
                        },
                        "re-password": {
                            equalTo: "Hai password ph???i gi???ng nhau",
                            minlength: "H??y nh???p ??t nh???t 8 k?? t???"
                        }
                    },
                    submitHandler: function() {
                        $.ajax({
                            type: "POST",
                            url: "user_add_process.php",
                            data: $('#add-user-form').serializeArray(),
                            dataType: "html",
                            success: function(response) {
                                if (response !== '1') {
                                    $('#div-error').text(response);
                                    $('#div-error').show();
                                } else {
                                    alert('Th??m ng?????i d??ng th??nh c??ng');
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
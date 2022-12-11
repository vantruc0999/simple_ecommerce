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
        <title>Category Management</title>
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
                        <h1 class="mt-4">Add new Category</h1>
                        <form id="category-form">
                            <div class="alert alert-danger" role="alert" id="div-error-1" style="display: none">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Add</button>
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
                $("#category-form").validate({
                    onfocusout: false,
                    onkeyup: false,
                    onclick: false,
                    rules: {
                        "category": {
                            required: true,
                            maxlength: 100
                        },
                        "description": {
                            maxlength: 255
                        }
                    },
                    messages: {
                        "category": {
                            required: "Bắt buộc nhập category",
                            maxlength: "Hãy nhập tối đa 15 ký tự",
                        },
                        "description": {
                            maxlength: "Chỉ được nhập tối đa 255 ký tự",
                        }
                    },
                    submitHandler: function() {
                        $.ajax({
                            type: "POST",
                            url: "category_add_process.php",
                            data: $('#category-form').serializeArray(),
                            dataType: "html",
                            success: function(response) {
                                if (response !== '1') {
                                    $('#div-error-1').text(response);
                                    $('#div-error-1').show();
                                } else {
                                    alert('Thêm thành công');
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
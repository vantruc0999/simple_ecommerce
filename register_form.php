<div class="modal fade" id="register-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="register_process.php" method="post" id="register_form">
                    <div class="alert alert-danger" role="alert" id="div-error-2" style="display: none">

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
                    <button type="submit" class="btn btn-primary" name="submit">Sign up</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#register_form").validate({
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
                    url: "register_process.php",
                    data: $('#register_form').serializeArray(),
                    dataType: "html",
                    success: function(response) {
                        if (response !== '1') {
                            $('#div-error-2').text(response);
                            $('#div-error-2').show();
                        } else {
                            alert('Dang ky thanh cong');
                            location.reload();
                        }
                    }
                });
            }
        });

    });
</script>
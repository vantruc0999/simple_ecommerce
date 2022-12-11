<div class="modal fade" id="login-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="login_form" action="login_process.php" method="POST">
                    <div class="alert alert-danger" role="alert" id="div-error-1" style="display: none">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#login_form").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "email": {
                    required: true,
                    email: true,
                    maxlength: 80
                },
                "password": {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                "email": {
                    required: "Bắt buộc nhập email",
                    maxlength: "Hãy nhập tối đa 15 ký tự",
                    email: "Vui lòng nhập email hợp lệ"
                },
                "password": {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                }
            },
            submitHandler: function() {
                $.ajax({
                    type: "POST",
                    url: "login_process.php",
                    data: $('#login_form').serializeArray(),
                    dataType: "html",
                    success: function(response) {
                        if (response !== '1') {
                            $('#div-error-1').text(response);
                            $('#div-error-1').show();
                        } else {
                            // alert('Dang ky thanh cong');
                            location.reload();
                        }
                    }
                });
            }
        });

    });
</script>
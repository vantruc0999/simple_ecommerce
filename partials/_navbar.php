<?php session_start(); ?>
<nav class="navbar navbar-expand-lg bg-light py-3 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><b>Shopping Online</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                        Category
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <?php 
                                $categories = mysqli_query($conn, "Select * from category");
                                foreach($categories as $item){
                            ?>
                            <a class="dropdown-item" href="#" class="nav-item dropdown"><?php echo $item['CategoryName'] ?></a>
                            <?php } ?>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="cart.php">Cart</a>
                </li>
                <?php if (isset($_SESSION['id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="order_history.php">Order History</a>
                    </li>
                <?php } ?>
                <?php if (!isset($_SESSION['id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#login-form" aria-current="page" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#register-form" aria-current="page" href="#">Register</a>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION['id'])) { ?>
                    <li class="nav-item">
                        <?php echo "Hello " . $_SESSION['name']; ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logout.php">Log out</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <p class="nav-link active" aria-current="page"></p>
                </li>

        </div>
    </div>
</nav>
<?php require_once "login_form.php" ?>
<?php require_once "register_form.php" ?>
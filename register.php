<?php
include 'functions.php';
include 'include/header.php'
?>
<body class="bg-light">
    


<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-5 m-2 bg-light shadow-lg">
            <form method="POST" class="m-5 " action="register.php">
             <?php
                    $func = registerpage($conn)
                ?>
                <input class="form-control m-3" type="text" placeholder="Username" name="username">

                <input class="form-control m-3" type="password" placeholder="password" name="password">

                <input class="form-control  m-3" type="password" placeholder="confirm_password" name="cpassword">

                <input class="form-control btn btn-secondary m-3" type="submit" name="submit">
                <hr class="offset-1">
                <p class="offset-3">already have an account</p>
                <a class="offset-5" href="login.php">sign-in</a>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
</body>
<?php
    include 'include/footer.php'
?>
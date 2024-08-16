<?php
    require_once 'functions.php';
    include 'include/header.php'
?>

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
            <form method="POST" class="m-5 " action="login.php">
             <?php
                    $funcal = loginpage($conn);
                ?>
                <input class="form-control m-3" auto-complete="off" type="text" placeholder="Username" name="username">

                <input class="form-control m-3" type="password" placeholder="password" name="password">

                <input class="form-control btn btn-secondary m-3" type="submit" name="submit">
                <hr class="offset-1">
                <p class="offset-3">do'nt have an account</p>
                <a class="offset-5" href="register.php">sign-up</a>
            </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <br>

    <div class="fixed-bottom bg-secondary p-3 text-light  d-flex">
    <p class="m-2">design by: Egbe Innocent Simple</p>
    <p class="m-2">RegNo 2023/HND/36913/CS</p>
    </div>

<?php
    // include 'include/footer.php';
?>
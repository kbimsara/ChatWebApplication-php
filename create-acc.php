<!doctype html>
<html lang="en">
<?php
ob_start();
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- costom css -->
    <link rel="stylesheet" href="./src/style.css">

    <!-- ChatNest -->
    <title>Home</title>

    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="./src/img/logo/icon.png">
</head>

<body>
    <?php require_once './pg/nav.php'; ?>
    <?php
    require_once './config.php';
    if (isset($_POST['create'])) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $pw = $_POST["pw"];
        $pw2 = $_POST["pw2"];


        if ($pw == $pw2) {
            //Check email exist
            $query_check = "SELECT * FROM `user` WHERE `email`='$email';";
            $query_check_run = mysqli_query($Connector, $query_check);
            if (mysqli_num_rows($query_check_run) < 1) {

                $query_insert = "INSERT INTO `user` (`email`, `name`, `pw`, `img`) VALUES ('$email', '$name','$pw',0);";
                $query_run = mysqli_query($Connector, $query_insert);

                echo "
            <script>
            Swal.fire(
                'Account Created!',
                'Please login New Account',
                'success'
              ).then(function() {
                window.location.href = './login.php';
            })
            </script>
            ";
            } else {
                echo "
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email Already exist!'
          }).then(function() {
            window.location.href = './login.php';
        })
        </script>
        ";
            }
        } else {
            echo "
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Password fields are not match !'
          })
        </script>
        ";
        }
    }
    ?>
    <!-- section 01 -->
    <div class="container-fluid" style="background-color: whitesmoke;" id="sec1">
        <div class="row">
            <div class="col-12 col-sm-11 col-md-8 col-lg-6 col-xl-6 d-flex align-items-center justify-content-center text-center">
                <div class="card col-12 col-sm-11 col-md-10 col-lg-8 col-xl-8" style=" text-align: left; padding: 25px; border-radius: 15px; margin-top: 20px;margin-bottom: 20px;">
                    <form method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Jhone Wick" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="sample@mail.com" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="pw" name="pw" required placeholder="samplePW@1234">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Re-Password</label>
                            <input type="password" class="form-control" id="pw2" name="pw2" required placeholder="Re Enter your password">
                        </div>
                        <div class="form-group">
                            <a href="./login.php">Do you have account?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-sm" name="create">Create Account</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-12 col-sm-11 col-md-8 col-lg-6 col-xl-6 d-flex align-items-center justify-content-center text-center">
                <img src="./src/img/bg-1.png" alt="banner" class="img-fluid">
            </div>
        </div>
    </div>


    <?php require_once './pg/footer.php'; ?>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>
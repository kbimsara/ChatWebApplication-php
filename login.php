<!doctype html>
<html lang="en">
<?php
ob_start();
session_start();
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
    if (isset($_POST['login'])) {

        $email = $_POST["email"];
        $pw = $_POST["pw"];

        $sql = "SELECT * FROM `user` WHERE email='$email';";
        $result = mysqli_query($Connector, $sql);
        $i = 0;

        while ($row = mysqli_fetch_array($result)) {
            $i++;

            $resuly_email = $row['email'];
            $resuly_pw = $row['pw'];

            if ($email === $resuly_email && $pw === $resuly_pw) {
                $_SESSION["email"] = $resuly_email;
                $url = "./user/home.php";
                header('location: ./' . $url . '');
                ob_end_flush();
            } else {
                echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid Login Details Check Again!'
                  })
                </script>
                ";
            }
        }
        if ($i < 1) {
            echo "
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid Login Details Check Again!'
              })
            </script>
            ";
        }
    }
    ?>
    <!-- section 01 -->
    <div class="container-fluid" style="background-color: whitesmoke; padding-top: 20px;padding-bottom: 20px;" id="sec1">
        <div class="row">
            <div class="col-12 col-sm-11 col-md-8 col-lg-6 col-xl-6 d-flex align-items-center justify-content-center text-center">
                <div class="card col-12 col-sm-11 col-md-10 col-lg-8 col-xl-8" style=" text-align: left; padding: 25px; border-radius: 15px; margin-top: 20px;margin-bottom: 20px;">
                    <form method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="pw" name="pw" required>
                        </div>
                        <div class="form-group">
                            <a href="./create-acc.php">Dont have account?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-sm" name="login">Login</button>
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
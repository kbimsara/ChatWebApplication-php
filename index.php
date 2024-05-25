<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- costom css -->
    <link rel="stylesheet" href="./src/style.css">

    <!-- ChatNest -->
    <title>Home</title>
    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="./src/img/logo/icon.png">
</head>

<body>
    <?php require_once './pg/nav.php'; ?>
    <!-- section 01 -->
    <div class="container-fluid" style="background-color: whitesmoke;" id="sec1">
        <div class="row">
            <div class="col-12 col-sm-11 col-md-8 col-lg-6 col-xl-6 d-flex align-items-center justify-content-center text-center">
                <center>
                    <h1 class="col-12 col-sm-11 col-md-8 col-lg-6 col-xl-10">Message privately</h1>
                    <p style="margin-top: 30px; font-weight: 300;" class="col-11 col-sm-11 col-md-9 col-lg-8 col-xl-9">Simple, reliable, private messaging and calling for free*, available all over the world.</p>
                    <div class=" col-11 col-sm-11 col-md-9 col-lg-8 col-xl-9">
                        <a href="#sec3">
                            <button type="button" class="btn btn-outline-primary">Discover more
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </center>
            </div>
            <div class="col-12 col-sm-11 col-md-8 col-lg-6 col-xl-6">
                <img src="./src/img/bg-1.png" alt="banner" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- section 02 -->
    <div class="container-fluid" style="background-color: white; padding-top: 20px;padding-bottom: 20px;" id="sec2">
        <div class="row">
            <div class="col-12 col-sm-11 col-md-8 col-lg-6 col-xl-6 justify-content-center">
                <center>
                    <img src="./src/img/bg-2.png" alt="banner" class="img-fluid">
                </center>
            </div>
            <div class="col-12 col-sm-11 col-md-8 col-lg-6 col-xl-6 d-flex align-items-center justify-content-start text-center">
                <center>
                    <p class="col-12" style="font-size: large;font-weight: 300;">With private messaging and calling, you can be yourself, speak freely and feel close to the most important people in your life no matter where they are.</p>
                </center>
            </div>
        </div>
    </div>

    <!-- section 03 -->
    <div class="container-fluid" style="background-color: whitesmoke; padding-top: 100px; padding-bottom: 100px;" id="sec3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex align-items-center justify-content-center text-center">
                <center>
                    <h1 class="col-12">Join with Us</h1>
                    <p style="margin-top: 30px; font-weight: 300;" class="col-12">Simple, reliable, private messaging for free*, available all over the world.</p>
                    <div class=" col-12">
                        <a href="./create-acc.php">
                            <button type="button" class="btn btn-outline-primary">Create Account</button>
                        </a>
                    </div>
                </center>
            </div>
        </div>
    </div>


    <?php require_once './pg/footer.php'; ?>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>
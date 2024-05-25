<!doctype html>
<html lang="en">
<?php
ob_start();
session_start();
$user_id = $_SESSION["email"];
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script> -->

    <!-- costom css -->
    <link rel="stylesheet" href="./pg/style.css">
    <!-- costom js -->
    <script src="./pg/script.js"></script>

    <!-- ChatNest -->
    <title>Home</title>
    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="../src/img/logo/icon.png">

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Ajax js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <?php require_once './pg/nav.php'; ?>

    <!-- get user id and add contact -->
    <?php
    require_once '../config.php';

    $contact;

    if (isset($_GET['id'])) {

        // echo "<script>alert('$user_id')</script>";

        $id = $_GET["id"];
        $contact = $id;

        $sql = "select * FROM `user` WHERE email = '$id';";
        $result = mysqli_query($Connector, $sql);
        if (str_word_count($user_id) > 0) {
        }


        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
                $email = $row['email'];
                $name = $row['name'];
                $img = $row['img'];
                if ($img == 0) {
                    $img = "./img/user-img.jpg";
                }
                $time = $row['time'];
    ?>
                <div class="container col-12 col-sm-12 col-md-11 col-lg-10 col-xl-10 clr">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center h-100">
                            <div class="col-md-12 col-xl-4">
                                <div class="card" style="border-radius: 15px;">
                                    <div class="card-body text-center">
                                        <!-- user image -->
                                        <div class="mt-3 mb-4">
                                            <img src="<?php echo "$img"; ?>" class="rounded-circle img-fluid" style="width: 150px;border: 1px green solid;" />
                                        </div>
                                        <h4 class="mb-2"><?php echo "$name"; ?></h4>
                                        <a href="<?php echo "$email"; ?>"><?php echo "$email"; ?></a></p>
                                        <!-- add button -->
                                        <form method="post">
                                            <button type="submit" class="btn btn-info btn-rounded btn-sm" name="addContact">
                                                Add Contact
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    <?php
            }
        } else {

            echo "
            <script>
            Swal.fire(
                icon: 'error',
                title: 'Oops...',
                text: 'You are not our user or Contact not found in our system'
              ).then(function() {
                window.location.href = '../login.php';
            })
            </script>
            ";
            header('location: ./create-acc.php');
        }
    }

    // add contact
    if (isset($_POST['addContact'])) {

        // require_once "./server/idGen.php";
        require "../config.php";

        $id;

        while (1) {
            $colName = "contact_id";
            $x = 15 - strlen($colName) - 2; //5
            $z = (10 ** $x) - 1;

            // Generate unique txt_id
            $id = rand(1, 99) . $colName . rand(1, $z);

            $sql = "SELECT * FROM contact WHERE $colName = '$id';";
            $result = mysqli_query($Connector, $sql);

            if (mysqli_num_rows($result) > 0) {
                continue;
            } else {
                break;
            }
        }

        if ($contact !== $user_id) {

            $sql2 = "SELECT * FROM `contact` WHERE (owner='$user_id' AND user ='$contact') OR (user='$user_id' AND owner ='$contact');";
            $result2 = mysqli_query($Connector, $sql2);

            if (mysqli_num_rows($result2)) {
                // continue;
                echo "
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'This contact already in your contact!'
                    }).then(function() {
                        window.location.href = './home.php';
                    });
                    </script>
                    ";
            } else {
                // break;
                $id = gen();
                $query_insert = "INSERT INTO `contact` (`contact_id`, `owner`, `user`) VALUES ('$id','$contact', '$user_id')";
                $query_run = mysqli_query($Connector, $query_insert);
                $id2 = gen();
                $query_insert2 = "INSERT INTO `contact` (`contact_id`, `owner`, `user`) VALUES ('$id2','$user_id', '$contact')";
                $query_run2 = mysqli_query($Connector, $query_insert2);
                //group insert
                $gid = gen2();
                $query_insert3 = "INSERT INTO `grouptb` (`group_id`, `group_name`, `creator`, `type`, `status`) VALUES ('$gid','$user_id ', '$contact',1, 1)";
                $query_run3 = mysqli_query($Connector, $query_insert3);
                //Add connection
                // $gid = gen2();
                $query_insert4 = "INSERT INTO `connection` (`email`, `group_id`) VALUES ('$user_id ','$gid')";
                $query_run4 = mysqli_query($Connector, $query_insert4);

                echo "
                    <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Your contact added successfully!'
                    }).then(function() {
                        window.location.href = './home.php';
                    });
                    </script>
                    ";
            }
        } else {
            echo "
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You cant add your own contact'
        }).then(function() {
            window.location.href = './home.php';
        });
        </script>
        ";
        }

        // header('location: ./user-home.php');
    }
    function gen()
    {

        require "../config.php";

        $id;

        while (1) {
            $colName = "contact_id";
            $x = 15 - strlen($colName) - 2; //5
            $z = (10 ** $x) - 1;

            // Generate unique txt_id
            $id = rand(1, 99) . $colName . rand(1, $z);

            $sql = "SELECT * FROM contact WHERE $colName = '$id';";
            $result = mysqli_query($Connector, $sql);

            if (mysqli_num_rows($result) > 0) {
                continue;
            } else {
                return $id;
                break;
            }
        }
    }
    function gen2()
    {

        require "../config.php";

        $id;

        while (1) {
            $colName = "group_id";
            $x = 15 - strlen($colName) - 2; //5
            $z = (10 ** $x) - 1;

            // Generate unique txt_id
            $id = rand(1, 99) . $colName . rand(1, $z);

            $sql = "SELECT * FROM grouptb WHERE $colName = '$id';";
            $result = mysqli_query($Connector, $sql);

            if (mysqli_num_rows($result) > 0) {
                continue;
            } else {
                return $id;
                break;
            }
        }
    }

    ?>



    <?php require_once './pg/footer.php'; ?>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>

</html>
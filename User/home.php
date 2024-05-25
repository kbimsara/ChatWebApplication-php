<!doctype html>
<html lang="en">
<?php
ob_start();
session_start();
$user_id = $_SESSION["email"];
$data = $_SESSION["data"];

// Program to display current page URL.
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
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

    <div class="container col-12 col-sm-12 col-md-11 col-lg-10 col-xl-10 clr">

        <div class="row">
            <!-- Left/Side bar -->
            <div class="col-2 sticky scroll-contact">

                <!-- add create contact/group -->
                <div class="d-flex flex-row align-items-center justify-content-center text-center">
                    <center>
                        <button type="button" class="btn btn-warning btn-sm m-1" style="margin: 0px; border-radius: 10px;" data-toggle="tooltip" data-placement="bottom" title="Add Contact" onclick="reflink('<?php echo $user_id; ?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                            </svg>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm m-1" style="margin: 0px; border-radius: 10px;" data-toggle="tooltip" data-placement="bottom" title="Create Group" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-collection-fill" viewBox="0 0 16 16">
                                <path d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3m2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1" />
                            </svg>
                        </button>
                    </center>
                </div>

                <!-- contact -->
                <div class="d-flex flex-column bd-highlight mb-3" id="contact-wrapper" style="margin-top: 30px;">
                    <!-- user accounts -->
                    <!-- <a href="#" class="zoom">
                        <div class="row item bd-highlight d-flex flex-row align-items-center justify-content-center text-center">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 sec1">
                                <img src="./img/user-img.jpg" alt="UserAccount" class="user-img img-fluid">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-9 d-flex align-items-center justify-content-center text-center sec2">
                                <p id="user-name">Item 02</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="zoom">
                        <div class="row item bd-highlight d-flex flex-row align-items-center justify-content-center text-center">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 sec1">
                                <img src="./img/user-img.jpg" alt="UserAccount" class="user-img img-fluid">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-9 d-flex align-items-center justify-content-center text-center sec2">
                                <p id="user-name">Item 03</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="zoom">
                        <div class="row item bd-highlight d-flex flex-row align-items-center justify-content-center text-center">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 sec1">
                                <img src="./img/user-img.jpg" alt="UserAccount" class="user-img img-fluid">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-9 d-flex align-items-center justify-content-center text-center sec2">
                                <p id="user-name">Item 04</p>
                            </div>
                        </div>
                    </a> -->
                </div>
            </div>

            <!-- Right side -->
            <div class="col-10 align-self-start" style="min-height: 550px;">
                <center>
                    <!-- User data -->
                    <div class="row col-12 d-flex flex-row align-items-center justify-content-center text-center" style="padding: 5px; background-color: rgba(0, 255, 255, 0.466);">
                        <div class="col-3" style="margin: 0px;padding: 0px;" id="user-img2">
                            <img src="./img/user-img.jpg" alt="UserAccount" class="user-img2">
                        </div>
                        <div class="col-9 d-flex align-items-center justify-content-center text-center">
                            <center>
                                <p id="user-name-r-side">No selected chat</p>
                            </center>
                        </div>
                    </div>

                    <!-- chat Data -->
                    <div class="row col-12 scroll-msg container-fluid" style="padding: 5px; min-height: 500px;">
                        <div class="col-12 container-fluid" id="user-wrapper" style="margin: 0px;padding: 0px;">
                            <!-- sender -->
                            <div class="col-12 d-flex justify-content-center align-items-center justify-content-center text-center flex-column">
                                <p class="msg-txt mw-50"><b>No Chat Here</b></p>
                            </div>
                        </div>
                    </div>

                    <!-- sender input -->
                    <div class="msg-send-box col-12 d-flex justify-content-end align-items-end justify-content-end text-end flex-row">
                        <input type="text" class="form-control" id="txt" name="txt" placeholder="Type a massage">
                        <button type="button" class="btn btn-outline-secondary" style="margin-left: 5px;" onclick="send()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                            </svg>
                        </button>
                    </div>

                </center>

            </div>

        </div>
    </div>

    </div>

    <?php require_once './pg/footer.php'; ?>



    <script type="text/javascript">
        function send() {
            var txt = document.getElementById("txt").value;
            var id = document.getElementById("user-name-r-side").innerHTML;
            $.ajax({
                type: 'post',
                url: 'server/txtHandler.php',
                data: {
                    text: txt,
                    sender: '<?php echo $user_id; ?>',
                    group_name: id
                }

            })

        }


        function reflink(user_id) {
            // url = <?php echo "$link"; ?>+"addContact.php/addcontact.php?id="+user_id;
            url = window.location.origin + "/chatapplication/user/addcontact.php?id=" + user_id;

            Swal.fire({
                icon: "warning",
                title: "Add Contact",
                text: "Copy your refferal URL!",
                footer: '<a href="' + url + '">' + url + '</a>'
            }).then(function() {
                navigator.clipboard.writeText(url);
            });

        }

        function loadXMLDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("contact-wrapper").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "server/contact.php?user_id=<?php echo $user_id; ?>", true);
            xhttp.send();
        }
        setInterval(function() {
            loadXMLDoc();
            // 1sec
        }, 1000);

        function refresh() {
            var id = document.getElementById("user-name-r-side").innerHTML;
            
            // var data = ;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("user-wrapper").innerHTML = this.responseText;
                }
            };
            if (id != "No selected chat") {
                xhttp.open("GET", "server/msg.php?reciever=" + id + "&sender=" + '<?php echo "$user_id"; ?>', true);
                xhttp.send();
            }
        }
        setInterval(function() {
            refresh();
            // 1sec
        }, 1000);

        function select(contact_id, user) {
            // alert(group_name);
            document.getElementById("user-name-r-side").innerHTML = user;
            refresh();

        }

        window.onload = loadXMLDoc;
    </script>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>

</html>
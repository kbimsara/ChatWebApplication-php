<?php
require_once '../../config.php';

ob_start();
session_start();
$user_id = $_SESSION["email"];
$data = $_SESSION["data"];

// $group_name = $_GET["group_id"];
$sender1 = $_GET["sender"];
$reciever = $_GET["reciever"];


// $query_search = "SELECT * FROM `text`";
// $query_search = "SELECT * FROM contact JOIN text ON contact.owner=text.email WHERE (text.email='$reciever' and text.receiver='$sender1') or (text.email='$sender1' and text.receiver='$reciever') ORDER BY text.time ASC;";
$query_search = "SELECT * FROM contact JOIN text ON contact.owner=text.email WHERE (text.email='$reciever' OR text.receiver='$reciever') or (text.email='$sender1' OR text.receiver='$sender1') ORDER BY text.time ASC;";
$query_run_search = mysqli_query($Connector, $query_search);
$i = 0;

if (mysqli_num_rows($query_run_search) < 1) {
?>

    <!-- sender -->
    <div class="col-12 d-flex justify-content-center align-items-center justify-content-center text-center flex-column">
        <p class="msg-txt mw-50"><b>No Chat Here</b></p>
    </div>

<?php
} else {
?>
    <!-- chat Data -->
    <div class="row col-12 scroll-msg" style="padding: 5px;">
        <?php
        while ($row = mysqli_fetch_array($query_run_search)) {
            $i++;

            $text  = $row['text'];
            $sender = $row['email'];
            $time = $row['time'];
            // $result_st = $row['type'];
            // $result_time = $row['status'];

            if ($sender !== $reciever) {
        ?>
                <!-- Reciever -->
                <div class="msg-box col-12 d-flex justify-content-end align-items-end justify-content-end text-end flex-column">
                    <p class="msg-txt mw-50"><?php echo "$text"; ?></p>
                    <span class="time"><?php echo "$time"; ?></span>
                </div>
            <?php
            } else {
            ?>
                <!-- sender -->
                <div class="msg-box col-12 d-flex justify-content-start align-items-start justify-content-start text-start flex-column">
                    <p class="msg-txt mw-50"><?php echo "$text"; ?></p>
                    <span class="time"><?php echo "$time"; ?></span>
                </div>

    <?php
            }
        }
    }

    ?>


    </div>

    <?php
// INSERT INTO `text` (`txt_id`, `text`, `email`, `group_id`, `time`) VALUES ('33', '1st text', 'sample@mail.com', 'test@mail.com', current_timestamp());
<?php
require_once '../../config.php';

ob_start();
session_start();
// $grp = $_SESSION["group"];

$user = $_GET["user_id"];

// $id = $_GET["txt"];

// $query_search = "SELECT * FROM `grouptb`";
// "SELECT * FROM grouptb JOIN text ON grouptb.group_name=text.group_id WHERE grouptb.group_name='$group_name' ORDER BY text.time DESC;"
// $query_search = "SELECT * FROM grouptb JOIN text ON grouptb.group_name=text.group_id WHERE creator='$user';";
$query_search = "SELECT * FROM `contact` JOIN user ON contact.user=user.email WHERE owner='$user';";
$query_run_search = mysqli_query($Connector, $query_search);
$i = 0;

$data = array();

while ($row = mysqli_fetch_array($query_run_search)) {
    $i++;

    $contact_id  = $row['contact_id'];
    $owner = $row['owner'];
    $user = $row['user'];
    $name = $row['name'];
    $img = $row['img'];
    if ($img == 0) {
        $img = "./img/user-img.jpg";
    }
    // $result_st = $row['img'];
    // $result_time = $row['time'];

    $query_search2 = "SELECT grouptb.group_id AS group_id,grouptb.group_name AS group_name,grouptb.creator AS creator,connection.email AS email FROM grouptb JOIN connection ON 
    grouptb.group_id=connection.group_id WHERE creator='$owner' and email='$user' or creator='$user' and email='$owner';";
    $query_run_search2 = mysqli_query($Connector, $query_search2);

    while ($row = mysqli_fetch_array($query_run_search2)) {
        $group_id   = $row['group_id'];
        $name   = $row['group_name'];
        $creator    = $row['creator'];
        $email     = $row['email'];
        $data[$group_id] = $name;
    }

?>

    <div class="row item bd-highlight d-flex flex-row align-items-center justify-content-center text-center zoom" onclick="select('<?php echo $contact_id; ?>','<?php echo $user; ?>')">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 sec1">
            <img src="<?php echo "$img"; ?>" alt="UserAccount" class="user-img img-fluid">
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-9 d-flex align-items-center justify-content-center text-center sec2">
            <p id="user-name"><?php echo "$name"; ?></p>
        </div>
    </div>

<?php
}
$_SESSION["data"] = $data;

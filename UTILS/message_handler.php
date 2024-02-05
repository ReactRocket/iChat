<?php
include "db_connect.php";

$message = $_POST['usermsg'];
$room_name = $_POST['userroom'];
$ip_address = $_POST['userip'];


$sql = "INSERT INTO `messages` (`message`, `room_name`, `ip_address`) VALUES ('$message', '$room_name', '$ip_address');";
$result = mysqli_query($conn, $sql);

if (!$result) {

    echo '<script>
    let msg = "Something wents wrong! Try again.";
    alert(msg);
    window.location = "http://localhost/projects/websites/ichat";
    </script>';

} else {
    echo '<script>
    window.location = "http://localhost/projects/websites/ichat/chat_room.php?room_name=' . $room_name . '";
    </script>';
}


?>
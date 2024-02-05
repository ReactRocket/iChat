<?php

$room_name = $_POST['room_name'];

if (strlen($room_name) < 2 || strlen($room_name) > 20) {

    echo '<script>
    let msg = "Please enter room name between 2 to 20 characters only!";
    alert(msg);
    window.location = "http://localhost/projects/websites/ichat/create_room.php";
    </script>';
} elseif (!ctype_alnum($room_name)) {
    echo '<script>
    let msg = "Please use only alphanumeric charaters in room name!";
    alert(msg);
    window.location = "http://localhost/projects/websites/ichat/create_room.php";
    </script>';
} else {

    // Database connection 
    include "db_connect.php";

    // checking already exist rooms 
    $sql = "SELECT * FROM `rooms` WHERE `room_name` = '$room_name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_affected_rows($conn);

    if ($row > 0) {

        echo '<script>
        let msg = "Room already exist! Please try again with diffrent room name.";
        alert(msg);
        window.location = "http://localhost/projects/websites/ichat/create_room.php";
        </script>';

    } else {

        // creating rooms 
        $sql = "INSERT INTO `rooms` (`room_name`) VALUES ('$room_name');";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            echo '<script>
            let msg = "Your room is ready! Chat Now...";
            alert(msg);
            window.location = "http://localhost/projects/websites/ichat/chat_room.php?room_name=' . $room_name . '";
            </script>';

        } else {
            echo '<script>
            let msg = "Something wents wrong! Try again.";
            alert(msg);
            window.location = "http://localhost/projects/websites/ichat";
            </script>';
        }
    }
}

?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "ichatt";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo '<script>
    window.location = "http://localhost/projects/websites/ichat/utils/err404.php";
    </script>';
}
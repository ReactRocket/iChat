<?php

$room_name = $_GET['room_name'];


// Database connection 
include "UTILS/db_connect.php";

// checking  existing of room

$sql = "SELECT * FROM `rooms` WHERE `room_name` = '$room_name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_affected_rows($conn);

if ($result) {
    if ($row == 0) {

        echo '<script>
        let msg = "Room does not exist! Please create a room.";
        alert(msg);
        window.location = "http://localhost/projects/websites/ichat";
        </script>';

    }

} else {

    echo '<script>
    let msg = "Something wents wrong! Try again.";
    alert(msg);
    window.location = "http://localhost/projects/websites/ichat";
    </script>';

}

?>





<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <script src="JS/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>iChat | Chat Anonymously Online</title>

    <link rel="shortcut icon" href="IMG/favicon.png" type="image/x-icon">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">

    <link href="CSS/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .chatarea {
        min-height: 50vh;
        max-height: 50vh;
        overflow-y: scroll;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="CSS/cover.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">iChat</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" id="exit" href="#">Exit</a>

                </nav>
            </div>
        </header>

        <main class="px-3 row">
            <div class="container col-md-10">

                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="welcome">Welcome to
                                <?php echo $room_name; ?>
                            </h2>
                        </div>
                        <div class="card-body chatarea" id="chatbox">

                            <?php

                            $sql = "SELECT * FROM `messages` WHERE `room_name` = '$room_name'";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_affected_rows($conn);

                            if ($count == 0) {
                                echo '<div class="card">
                                <div class="card-body">
                                  No message found!.
                                </div>
                              </div>';
                            } else {
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo ' 
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="d-flex p-2"> 
                                                <h5>' . $row['message'] . '</h5>
                                            </div class="">
                                            <div> 
                                            <small class="time-right">Send by ' . $row['ip_address'] . ' at ' . $row['time_stemp'] . '</small>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    ';
                                }


                            }
                            ?>
                        </div>
                        <div class="card-header">
                            <form action="UTILS/message_handler.php" method="post">
                                <div class="input-group">

                                    <input type="text" name="usermsg" class="form-control"
                                        placeholder="Type your message..." aria-label="Recipient's username"
                                        aria-describedby="button-addon2">

                                    <!-- extra work start -->
                                    <input name="userroom" type="text" value="<?php

                                    $room_name = $_GET['room_name'];

                                    echo $room_name;

                                    ?>" hidden />
                                    <input name="userip" type="text" value="<?php

                                    $ip = $_SERVER['REMOTE_ADDR'];

                                    echo $ip;

                                    ?>" hidden />
                                    <!-- extra work done -->

                                    <button class="btn btn-outline-success" type="submit" name="submitmsg"
                                        id="button-addon2">Send</button>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </main>

        <footer class="mt-auto text-white-50">
            <p class="mb-1">iChat copyright&copy;
                <?php echo date("Y") ?>
            </p>
        </footer>
    </div>

    <script>
    $(document).ready(function() {
        $("#exit").click(function() {
            let ext = confirm("Are you want to exit?")

            if (ext) {
                window.location = "http://localhost/projects/websites/ichat";
            }

        });

        const el = document.getElementById('chatbox');
        // id of the chat container ---------- ^^^
        if (el) {
            el.scrollTop = el.scrollHeight;
        }
    });
    </script>

</body>

</html>
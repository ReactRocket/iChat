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
            <div class="container col-md-7">
                <form action="UTILS/claim_room_handeler.php" method="post">
                    <div class="d-flex justify-content-center">
                        <img class="mb-4 " src="IMG/Circle-icons-profile.svg.png" alt="" width="100" height="100">
                    </div>
                    <h1 class="h3 mb-3 fw-normal">Room Name</h1>

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="room_name" placeholder="name@example.com"
                            name="room_name" required>
                        <label for="floatingInput">Enter room name</label>
                    </div>

                    <button class="btn btn-primary w-100 py-2" type="submit">Claim Room</button>

                </form>
            </div>
        </main>

        <footer class="mt-auto text-white-50">
            <p class="mb-1">iChat copyright&copy;
                <?php echo date("Y") ?>
            </p>
        </footer>
    </div>

    <script>
        $(document).ready(function () {
            $("#exit").click(function () {
                let ext = confirm("Are you want to exit?")

                if (ext) {
                    window.location = "http://localhost/projects/websites/ichat";
                }

            });
        });
    </script>

</body>

</html>
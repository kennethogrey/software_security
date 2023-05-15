<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Welcome Page</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="./dist/css/demo.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        SQL INJECTION
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <div class="d-none d-xl-block ps-2">
                                <div>
                                    <?php
                        session_start();
                        $username = $_SESSION["username"];
                        echo $username;
                    ?>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar navbar-light">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="./welcome.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                <?php
                                    echo $_SESSION["login_type"];
                                ?>
                            </h2>
                            <br>
                            <h2 class="page-title">
                                <?php
                                    if(!empty($_SESSION["buffer"])){
                                        echo $_SESSION["buffer"];
                                        $_SESSION['buffer'] = "";
                                    }
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="card-header">
                        <h3 class="card-title">Buffer Overflow</h3>
                    </div>
                    <form action="./welcome.php" method="post">
                        <div class="form-group mb-3 mt-3">
                            <label class="form-label">Vulnerable to Buffer Overflow <span
                                    class="form-label-description"></span></label>
                            <textarea class="form-control" name="insecure_textarea" rows="6"
                                placeholder="This is vulnerable to buffer overflow"></textarea>
                        </div>
                        <div class="form-footer">
                            <button type="submit" name="insecure" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <form action="./welcome.php" method="post">
                        <div class="form-group mb-3 mt-3">
                            <label class="form-label">Secured from Buffer Overflows<span
                                    class="form-label-description"></span></label>
                            <textarea class="form-control" name="secure_textarea" rows="6"
                                placeholder="This is safe from buffer overflow"></textarea>
                        </div>
                        <div class="form-footer">
                            <button type="submit" name="secure" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
    <script src="./dist/js/demo.min.js"></script>
</body>

</html>

<?php

if(isset($_POST["insecure"])){
    $text = $_POST["insecure_textarea"];
    $_SESSION['buffer'] = "This method is vulnerable to buffer overflow";
}

if(isset($_POST["secure"])){
    $text = $_POST["secure_textarea"];
    $bufferSize = 5;

    // Perform bounds checking
    if (strlen($text) <= $bufferSize) {
        $_SESSION['buffer'] = "There is no buffer overflow";
    }else{
        $_SESSION['buffer'] = "Buffer overflow has been detected.";
    }
}

?>
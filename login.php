
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Login</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
  </head>
  <body  class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark">LOGIN: SQL INJECTION DEMO</a>
        </div>
        <?php
            session_start();
            if (isset($_SESSION['status'])) {
            ?>
                <div class="alert alert-warning bg-info alert-dismissible fade show" role="alert">
                    <strong>Info:</strong><?php echo $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                unset($_SESSION['status']);
            }
        ?>
        <form class="card card-md" action="./login-logic.php" method="post" autocomplete="off">
          <div class="card-body">
            <h2 class="card-title text-center mb-4"><b>Insecure: </b>Login to your account</h2>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" required class="form-control" name="username" placeholder="Enter email">
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
              </label>
              <div class="input-group input-group-flat">
                <input type="password" required class="form-control" name="password" placeholder="Password"  autocomplete="off">
              </div>
            </div>
            <div class="form-footer">
              <button type="submit" name="login" class="btn btn-primary w-100">Sign in</button>
            </div>
          </div>
        </form>
        <br><hr>
        <form class="card card-md" action="./secure_login_logic.php" method="post" autocomplete="off">
          <div class="card-body">
            <h2 class="card-title text-center mb-4"><b>Secure: </b>Login to your account</h2>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" required class="form-control" name="username" placeholder="Enter email">
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
              </label>
              <div class="input-group input-group-flat">
                <input type="password" required class="form-control" name="password" placeholder="Password"  autocomplete="off">
              </div>
            </div>
            <div class="form-footer">
              <button type="submit" name="login" class="btn btn-primary w-100">Sign in</button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          Don't have account yet? <a href="./index.php" tabindex="-1">Sign up</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
    <script src="./dist/js/demo.min.js"></script>
  </body>
</html>
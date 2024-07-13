

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookMart:Toko Buku Online Modern</title>
    <link rel="stylesheet" href="style2.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!--Form Sign In-->
    <form action="signin" method="post">
        <div class="wrapper">
            <div class="login_box">
                <div class="login-header">
                    <span>Login</span>
                </div>
                <?php
                if (isset($_POST["login"])) {
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    require_once "index10.php";
                    $sql = "SELECT * FROM tb_user WHERE email='$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($user) {
                        if (password_verify($password, $user["password"])) {
                            session_start();
                            $_SESSION["email"] = $email;
                            header("Location: ../home");
                            die();
                        } else {
                            echo "<div class='alert alert-danger'>Password tidak valid</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Email tidak valid</div>";
                    }
                }
                ?>
                <div class="input_box">
                    <input type="email" name="email" id="email" class="input-field" required>
                    <label for="email" class="label">Email</label>
                    <i class="bi bi-person icon"></i>
                </div>
                <div class="input_box">
                    <input name="password" type="password" class="input-field" required>
                    <label for="password" class="label">Password</label>
                    <i class="bi bi-lock icon"></i>
                </div>
                <div class="remember-forgot">
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <div class="forgot">
                        <a href="#">Forgot Password</a>
                    </div>
                </div>
                <div class="input_box">
                    <input type="submit" class="input-submit" name="login" value="Login">
                </div>
                <div class="register">
                    <span>Don't have an account? <a href="login">Sign Up</a></span>
                </div>
            </div>
        </div>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
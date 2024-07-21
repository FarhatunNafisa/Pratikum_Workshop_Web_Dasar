
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookMart:Toko Buku Online Modern</title>
    <link rel="stylesheet" href="style1.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<!--Form Sign Up--->

<body>
    <?php
    $errors = array();
    $successMessage = "";

    if (isset($_POST["submit"])) {
        require_once __DIR__ . "/index10.php";
        $email = $_POST["email"];
        $password = $_POST["password"];
        if (empty($email) || empty($password)) {
            array_push($errors, "Semua kolom harus diisi");
        }
        if (strlen($password) < 8) {
            array_push($errors, "Password harus terdiri dari setidaknya 8 karakter");
        }
        $sql = "SELECT * FROM tb_user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            array_push($errors, "Email sudah ada!");
        }
        if (count($errors) == 0) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO tb_user(email, password) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ss", $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                $successMessage = "Akun berhasil dibuat!";
            } else {
                die("Ada yang salah");
            }
        }
    }
    ?>
    <form class="needs-validation" method="POST" action="" novalidate>
        <div class="wrapper">
            <div class="container main">
                <div class="row">
                    <div class="col-md-6 side-image">
                        <!--image-->
                        <img src="logo1.png" alt="">
                        <div class="text">
                            <p>Silakan masuk untuk melanjutkan pembelian buku favorit Anda</p>
                        </div>
                    </div>
                    <div class="col-md-6 right">
                        <div class="input-box">
                            <header>Create Account</header>

                            <?php if (count($errors) > 0) : ?>
                                <div class="alert alert-danger">
                                    <?php foreach ($errors as $error) : ?>
                                        <p><?php echo $error; ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($successMessage) : ?>
                                <div class="alert alert-success">
                                    <p><?php echo $successMessage; ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="input-field">
                                <input type="email" name="email" class="input" id="email" required autocomplete="off">
                                <label for="email">Email</label>
                                <div class="invalid-feedback">
                                    Masukkan Email yang Valid
                                </div>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" class="input" id="password" required>
                                <label for="password">Password</label>
                                <div class="invalid-feedback">
                                    Masukkan Password
                                </div>
                            </div>
                            <div class="input-field">
                                <input type="submit" name="submit" class="submit" value="Sign Up">
                            </div>
                            <div class="signin">
                                <span>Already have an account? <a href="signin">Log in here</a> </span>
                                <br><br>
                                <p>SILAHKAN SIGN UP UNTUK MENJADI PELANGGAN. JIKA UNTUK ADMIN SILAHKAN LOGIN DENGAN DATA BERIKUT:</p>
                                <p><b>EMAIL: farhatun@gmail.com</b><br>
                                <b>PASS: 12345678</b>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
        const emailInput = document.getElementById('email');
        const feedback = document.querySelector('.invalid-feedback');

        emailInput.addEventListener('input', function() {
            if (emailInput.validity.valid) {
                feedback.style.display = 'none';
            } else {
                feedback.style.display = 'block';
            }
        });
    </script>
</body>

</html>
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/registration.css">



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="#" class="btn btn-outline-success" type="submit">AllList</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <form class="needs-validation" action="" method="POST" novalidate>
            <h5 class="text-center">Login</h5>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control " name="email" placeholder="Enter Your Full email.." required>
                <div class="invalid-tooltip">
                    Please choose a valid email.
                </div>
            </div>
            <div class="input-group mb-3">
                <span class=" input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control " name="password" value="" placeholder="Password.." required>
                <div class="invalid-tooltip">
                    Please enter your password.
                </div>
            </div>


            <div class="d-grid gap-2" style="width: 80%;margin: auto;">
                <button class="btn btn-primary" type="submit" name="submit">Login</button>

            </div>
            <div class="signed">
                <span>No Account?<a href="registration.php">Register Here</a></span>
            </div>
        </form>
    </div>
    <script>
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>
<?php
include 'dbcon.php';
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailquiry = "select * from user where email = '$email'";
    $quiry = mysqli_query($conn, $emailquiry);
    $emailcount = mysqli_num_rows($quiry);

    if ($emailcount) {
        $email_pass = mysqli_fetch_array($quiry);
        $db_pass = $email_pass['password'];
        $_SESSION['name'] = $email_pass['name'];

        $pass_decode = password_verify($password, $db_pass);
        if ($pass_decode) {
            echo "loginb Successfull";
?>
            <script>
                window.location.href = "dashboard.php";
            </script>
<?php
        } else {
            echo "incorrect password ";
        }
    } else {
        echo "email is not valid";
    }
}
?>
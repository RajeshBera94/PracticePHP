<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/registration.css">
adfadf

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
                    <a href="registration.php" class="btn btn-outline-success" style="color: white;border-color:aliceblue" type="submit">Registration</a>
                </div>
            </div>
        </div>
    </nav>

    <table class="table table-bordered border-primary table-striped table-success" style="width: 80%;margin:auto">

        <thead>
            <h5 class="header" style="width: 80%;margin:auto">All Registered Candidate</h5>
            <tr>

                <th scope="col">Sl.No</th>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            <?php
            include 'dbcon.php';
            $selectquiry = "select * from user";
            $quiryrun = mysqli_query($conn, $selectquiry);
            $number = 1;
            while ($result = mysqli_fetch_array($quiryrun)) {

            ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $result['id'] ?></td>
                    <td><?php echo $result['name'] ?></td>
                    <td><?php echo $result['email'] ?></td>
                    <td><?php echo $result['phone'] ?></td>
                    <td><a href="update.php?id=<?php echo $result['id'];?>"><i class="fas fa-edit"></i></a></td>
                    <td><a href="delete.php?id=<?php echo $result['id'];?>"><i class="fas fa-trash-alt" style="color: red;"></i></a></td>

                </tr>
            <?php
                $number++;
            }

            ?>


        </tbody>
    </table>
</body>

</html>
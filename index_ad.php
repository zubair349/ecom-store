<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="form-group">        
        <label for="userName">Username:</label>
        <input class="form-control" type="text" name="userName" placeholder="username" required>
        <label for="pass">Password:</label>
        <input class="form-control" type="password" name="pass" required>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php
    include("connectdb.php");
    if(isset($_POST["submit"])){
        $username = $_POST["userName"];
        $password = $_POST["pass"];
        $sql = mysqli_query($conn,
    "SELECT * FROM user_admin WHERE username='"
    . $_POST["userName"] . "' AND
    password='" . $_POST["pass"] . "'    ");


        if(mysqli_num_rows($sql) > 0){

            while($row= mysqli_fetch_assoc($sql)){
                session_start();
                $_SESSION["username"] = $row['username'];
                $_SESSION["password"] = $row['password'];
                header("location: addProduct.php");
            }
        }
        else{
            echo "Incorrect info";
        }
    }
    ?>
</body>
</html>
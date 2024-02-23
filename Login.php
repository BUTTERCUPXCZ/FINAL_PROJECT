<?php
session_start();
include("Database.php");

if(isset($_POST['Login_user'])){
    $username = trim($_POST['Username']);
    $password = trim($_POST['password']);
    $error = "";

    if(empty($username)){
        $error = "Please enter your username";
    } elseif(empty($password)){
        $error = "Password is empty";
    } else {
        $username = stripcslashes($username);
        $password = stripcslashes($password);

        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "SELECT * FROM register WHERE Username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            die("Query failed: " . mysqli_error($con));
        }

        $count = mysqli_num_rows($result);

        if($count == 1){
            header('Location: Main.php');
            exit();
        } else {
            $error = "Failed to login";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <div class = "textfields">   
            <form action="Login.php" method="post">
                <input class = "form-control" type="text" id="Username" name="Username" placeholder="Username"><br>
                <input class=" Forms" type="password" id="password" name = "password" placeholder="Password"><br>
                <button class="Button_login" type="submit" name ="Login_user">Login</button>
            </form>
        </div>
        <label class="dont">Don't have an account?<a href="Register.php"> Register Now</a></label>
    </div>

    <script>
        <?php
        if(!empty($error)){
            echo "alert('$error');";
        }
        ?>
    </script>
</body>
</html>

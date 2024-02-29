<?php

include("Database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $email = trim($_POST['email']);
    $password = trim($_POST['Password']);
    $error = "";

    if(empty($email)){
        $error = "Please enter your email";
    } elseif(empty($password)){
        $error = "Password is empty";
    } else {
        $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE email = ? AND password = ?");
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if(!$result) {
                die("Query failed: " . mysqli_error($con));
            }

            $count = mysqli_num_rows($result);

            if($count == 1){
                header('Location: index.php');
                exit();
            } else {
                $error = "Failed to login";
            }

            mysqli_stmt_close($stmt);
        } else {
            die("Prepared statement failed: " . mysqli_error($con));
        }
    }
}

?>

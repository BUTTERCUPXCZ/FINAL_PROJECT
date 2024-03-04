<?php

include("Database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = isset($_POST['email-Login']) ? $_POST['email-Login'] : '';
    $password = isset($_POST['password-Login']) ? $_POST['password-Login'] : '';

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Password is correct
        // Perform login actions

     
        header("Location: index.php");
        echo "<script>alert('Login Successfully')</script>"; 
        exit();
    } else {
       
        echo "<script>alert('Incorrect email or password'); window.location.href = 'SignupLogin.php';</script>";
        exit();  
      
    }

    // Close the connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>


<?php

include("Database.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = isset($_POST['email-signup']) ? $_POST['email-signup'] : '';
  $password = isset($_POST['password-signup']) ? $_POST['password-signup'] : '';

  
    
      // Establish database connection if not already done in Database.php
      $conn = mysqli_connect("localhost", "root", "", "diary");

if (!empty($email) && !empty($password)) {

  // Check if email already exists
  $check_email_query = "SELECT COUNT(*) AS email_count FROM users WHERE email = ?";
  $stmt_check = $conn->prepare($check_email_query);
  $stmt_check->bind_param("s", $email);
  $stmt_check->execute();
  $result = $stmt_check->get_result(); // Get the result

  $row = $result->fetch_assoc(); // Fetch the first row

  if ($row['email_count'] > 0) {
    echo "<script>alert('Email already exist')</script>";
  } else {
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
          $stmt->bind_param("ss", $email, $password);

          // Execute the query
          if ($stmt->execute()) {
            echo "<script>alert('Sign up Successfully')</script>"; 
            
            //header("Location: SignupLogin.php"); // Redirect upon success
              
          } else {
              echo "Error creating account"; // Handle any errors
          } }

  $stmt_check->close(); // Close the prepared statement (check)
  $result->close(); // Close the result set
}
}

// ... existing code ...

?>
<?php

include("Database.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = isset($_POST['email-signup']) ? $_POST['email-signup'] : '';
  $password = isset($_POST['password-signup']) ? $_POST['password-signup'] : '';
  $errors = array();
  
    
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
            header('Location:form signup_form');
            
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Diary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="New.css">
   

</head>
<body class="vh-100 overflow-hidden">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
          <a class="navbar-brand fs-4" href="#">E-Diary Management System</a>
          <!--Toggle button-->
          <button class="navbar-toggler shadow-none border-0" 
          type="button" 
          data-bs-toggle="offcanvas" 
          data-bs-target="#offcanvasNavbar" 
          aria-controls="offcanvasNavbar" 
          aria-label="Toggle navigation">
            
          <span class="navbar-toggler-icon"></span>
          </button>

           <!--Sidebar-->
          <div class="sidebar offcanvas offcanvas-start" 
          tabindex="-1" id="offcanvasNavbar" 
          aria-labelledby="offcanvasNavbarLabel">

            <!--Sidebar header-->
            <div class="offcanvas-header text-white border-bottom">
              <h5 class="offcanvas-title" 
              id="offcanvasNavbarLabel">E-Diary</h5>
              <button type="button" 
              class="btn-close btn-close-white shadow-none" 
              data-bs-dismiss="offcanvas" 
              aria-label="Close"></button>
           
            </div>

            <!--Sidebar body-->
            <div class="offcanvas-body d-flex flex-column flex-lg-row p-4  p-lg-0">
              <ul class="navbar-nav justify-content-center fs-5 flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active mx-2" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item mx-2">
                  <a class="nav-link" href="Aboutus.html">About</a>
                </li>
                <li class="nav-item mx-2">
                  <a class="nav-link" href="Contact.html">Contact</a>
                </li>
               
              </ul>
              <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                <!--Login/Signup-->
                
                
                <a href="#"
                   class="text-white text-decoration-none px-3 py-1 bg-primary rounded-4" id = "form-open"

                   style="background-color:#FFFFFF";
                
                >Login</a>
              </div>
            </div>
          </div>
        </div>
      </nav>
      </div>
    
    
      <!--Home-->
     <section class = "home">
       <div class = "form_container">
        <i class = "uil uil-times form_close"></i>
        
        <!--Login Form-->
   <div class="form login_form">
  <form action = "Connect.php" method="post">
    <h2>Login</h2>
    <div class="input_box">
      <input type="email" name="email-Login"  placeholder="Enter your email" required />
      <i class="uil uil-envelope-alt email"></i>
    </div>
    <div class="input_box">
      <input type="password"  name="password-Login"  placeholder="Enter your password" required />
      <i class="uil uil-lock password"></i>
      <i class="uil uil-eye-slash pw_hide"></i>
    </div>
    <button class= "button text-white" type ="submit" name="submit">Login</button>

   <div class = "login_signup">Don't have an account? <a href="#" id = "signup">Sign up</a></div>
   </form>
   </div> 
    
        <!--Signup form-->
        <div class="form signup_form">
  <form action="SignupLogin.php" method="post">
    <h2>Signup</h2>
    <div class="input_box">
      <input type="email" name="email-signup" placeholder="Enter your email" autofocus required />
      <i class="uil uil-envelope-alt email"></i>
    </div>
    

 
    <div class="input_box">
      <input type="password" name="password-signup" placeholder="Create password" required />
      <i class="uil uil-lock password"></i>
      <i class="uil uil-eye-slash pw_hide"></i>
    </div>
    <button class= "button text-white">Signup</button>

    <div class = "login_signup">Already have an account? <a href="#" id = "Login">Login</a></div>
    </form>
       </div>  

       </div>
       </section>


       <!--Scripts-->
     <script src ="New.js"></script>
     

     <main>
      <section class="headings">
             <h1>Let the Words Pour Out, Unfiltered and <br>  Unapologetic: Where Your Thoughts <br>Run Wild and Uncensored!</h1>             
      </section>
    </main>

</body>
</html>




<?php

  if($_SERVER["REQUEST_METHOD"] == "POST"){
  $Username = isset($_POST['Username']) ? $_POST['Username']: '';
  $firstname = isset($_POST['Firstname']) ? $_POST['Firstname'] : '';
  $middlename = isset($_POST['Middlename']) ? $_POST['Middlename'] : '';
  $Lastname = isset($_POST['Lastname']) ? $_POST['Lastname'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['Password']) ? $_POST['Password'] : '';
  $vpassword = isset($_POST['VPassword']) ? $_POST['VPassword'] : '';
  $errors = array();
  
  $serverName = "localhost:3306";
  $userName = "root";
  $password = "";
  $dbname = "user";
  

  
  $conn = new mysqli($serverName, $userName, $password, $dbname);
  
  if (mysqli_connect_errno()) {
      echo "Connection Error";
      exit();
  } else {
      $stmt = $conn->prepare("INSERT INTO register(Username, firstname, middlename, lastname, email, password) values (?,?,?,?,?,?)");
      $stmt->bind_param("ssssss", $Username, $firstname, $middlename, $Lastname, $email, $password);
      $stmt->execute();
  
 
      if ($stmt->affected_rows > 0) {
         // echo "Register Successfully!";
      } else {
          echo "FAILED TO REGISTER";
      }
  
      $stmt->close();
      $conn->close();
  }
  }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Register.css? v = 1.1">
   
   

</head>
<body>


        <div class="container">

           <h1>Create account</h1>
            <form action="Register.php" method="post" id = "form">
              
                <div class="Names">
                <input type="text" id="Username" name="Username" placeholder="Username" required><br>
                
                <input type="text" name="Firstname" placeholder="First Name" required><br>
                
                <input type="text" name="Middlename" placeholder="Middle Name " required><br>
             
                <input type="text" name="Lastname"  placeholder="Last Name"required><br>
                
         
             </div>
             <div class="Email">
                <input class="Emails" type="email" name="email" placeholder="Email" required>
                
                <input class="Passwords" type="password" id="password" name="Password" placeholder="Password"required><br>
                
                <input class="Passwords" type="password" id="Vpassword" name="vPassword" placeholder="Password"required><br>
             
                 <button type="submit" value="Submit" class="btncreate" action= >Create account</button><br>
                 <label>Already have and account? <a href="Login.php">Sign in</a></label>
            </div>
            </form>
        </div>

     
       
    
</body>
</html>
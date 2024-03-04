<?php 
$servername = "localhost";
$username = "james";
$password = "james";
$dbname = "journalentries";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
  $entry = $_POST['entry'];

  $sql = "INSERT INTO entries (entries) VALUES (?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $entry);

  if ($stmt->execute()) {
    $message = "Entry successfully added!";
  } else {
    $message = "Error: " . $stmt->error;
  }

  $stmt->close();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="entry.css">
  <script src="https://kit.fontawesome.com/c08e2b6902.js" crossorigin="anonymous"></script>
  <title>E-Diary</title>
</head>
<body>
  <input type="checkbox" id="check">
  <label for="check">
    <i class="fas fa-bars" id="btn"></i>
    <i class="fas fa-times" id="cancel"></i>
  </label>
  <div class="sidebar">
    <header>Menu</header>
    <ul>
    <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
      <li><a href="entry.php"><i class="fas fa-edit"></i>Write Entry</a></li>
      <li id="entries"><a href="entries.php"><i class="fas fa-archive"></i>Entries</a></li>
      <li><a href="Calendar.php"><i class="fas fa-calendar-week">Calendar</i></a></li>
      
    </ul>

  </div>

  <div class="container">
   <h1>Write Entry</h1>
   <form action="entry.php" method="post">
  <textarea name="entry" id="entry" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
  <input type="submit" name="submit" id="submit" value="submit">
</form>
    <h1><?php $message ?></h1>
  </div>
  

</body>
</html>

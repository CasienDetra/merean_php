 <?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "book_store";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else {
  echo "connection successfully connected";
}

mysqli_close($conn);
?>

<?php
  include 'db.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "Update boos set is_deletesd = 1 where book_id = $id";
  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    /* header("Location: index.php"); */
  } else {
    echo "NO book id provide" . $conn->error;
  }
}
?>

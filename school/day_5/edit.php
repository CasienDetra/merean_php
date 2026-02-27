
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form edit</title>
  </head>
  <body>
<form action = "" method="post">
 <h1>Insert Data to DB</h1> 
<label> Title:</label>
<input type="text" name="title" value="<?php echo $book['title']; ?>">
<label> isbn:</label>
<input type="text" name="isbn" value="<?php echo $book['isbn']; ?>">
<label> Category:</label>
<input type="text" name="category" value="<?php echo $book['category']; ?>">
<label> page numnber:</label>
<input type="text" name="page_number" value="<?php echo $book['page_number']; ?>">
<label> unit_price:</label>
<input type="text" name="unit_price" value="<?php echo $book['unit_price']; ?>">
</form>
 
</html>
<?php
  require_once 'db.php';
  if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    $tiele = $_POST['title'];
  }
/* if (isset($_GET['id'])) { */
/* $book_id = intval($_GET['id']); */
/* echo $book_id; */
/* $sql = "SELECT * FROM books WHERE book_id = $book_id and is_deleted = 0"; */
/* $result = $conn->query($sql); */
/* } */
/* if ($result->num_rows > 0) { */
/*   $book = $result->fetch_assoc(); */
/*   echo "Title: " .$book['title']; */
/*   } else { */
/*     echo " No book found"; */
/*     exit; */
/* } */
?>


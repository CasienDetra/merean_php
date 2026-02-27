<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> day 5 </title>
  </head>
  <body>
<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>Book ID</th>
    <th>ISBN</th>
    <th>Category</th>
    <th>Page Number</th>
    <th>Unit Price</th>
    <th>Action</th>
  </tr>
<?php while ($row = $result->fetch_assoc()) : ?>
<tr>
  <td><?= $row['book_id'] ?></td>
  <td><?= $row['isbn'] ?></td>
  <td><?= $row['category'] ?></td>
  <td><?= $row['page_number'] ?></td>
  <td><?= $row['unit_price'] ?></td>
  <td>
    <a href="edit.php?id=<?= $row['book_id'] ?>">Edit</a> |
    <a href="delete.php?id=<?= $row['book_id'] ?>">Delete</a>
  </td>
</tr>
<?php endwhile; ?>
</table>
  </body>
</html>

<?php

/* connect to database */
$severname = 'localhost';
$username = 'root';
$password = 'YanoukTheGod168';
$dbname = 'book_sale_sc';

$conn = new mysqli($severname, $username, $password, $dbname);

if ($conn->connect_error) {
    exit('connecttion failed'.$conn->connect_error);
}

$title = 'web development';
$isbn = 'isbn001';
$category = 'IT';
$page_number = 150;
$unit_price = 3.00;
// insert data
$sql = "INSERT INTO books(title, isbn, category, page_number, unit_price) VALUES ('$title', '$isbn', '$category', '$page_number', '$unit_price')";
/* if ($conn->query($sql) == true) { */
/*     echo 'new record added'; */
/**/
/* } else { */
/*     echo 'failed'.$sql.'<br>'.$conn->error; */
/* } */
// update data
$new_category = 'programming';
$new_titles = 'Website Dev';
$update_sql = 'update books set category = "'.$new_category.'", title = "'.$new_titles.'" where isbn = "'.$isbn.'"';
if ($conn->query($update_sql) === true) {
    echo 'data updated';
} else {
    echo 'failed';
}

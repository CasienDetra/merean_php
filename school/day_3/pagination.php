<?php
/* for connect to database */
include 'index.php'; // Ensure this file defines $pdo

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$page = ($page < 1) ? 1 : $page;
$limit = 10;
$offset = ($page - 1) * $limit;

// 1. Fetch the data for the current page
$sql = "SELECT * FROM student LIMIT $limit OFFSET $offset";
$result = $pdo->query($sql);

// 2. Fetch total records to calculate total pages
$total_sql = 'SELECT COUNT(*) FROM student';
$total_results = $pdo->query($total_sql)->fetchColumn();
$total_pages = ceil($total_results / $limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Pagination</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .pagination { margin-top: 20px; }
        .pagination a { padding: 8px 16px; border: 1px solid #ddd; text-decoration: none; color: black; }
        .pagination a.active { background-color: #4CAF50; color: white; border: 1px solid #4CAF50; }
    </style>
</head>
<body>
    <h1>Student List</h1> 
    <a href="create.php">Add New Student</a>
    <br><br>

    <?php if ($result) { ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <a href="?page=<?php echo $i; ?>" class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p>No students found.</p>
    <?php } ?>

</body>
</html>

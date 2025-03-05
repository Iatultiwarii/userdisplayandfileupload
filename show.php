<?php
include 'db.php';
$users = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">User List</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="btn btn-primary" href="index.php">Back to Form</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h2 class="text-center">Registered Users</h2>
    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Image</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $users->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["mobile"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td>
                        <img src="uploads/<?php echo $row["image"]; ?>" width="100" class="img-thumbnail">
                    </td>
                    <td><?php echo $row["details"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
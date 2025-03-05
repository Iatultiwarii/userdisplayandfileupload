<?php
include 'db.php';

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $details = $_POST["details"];

    // File Upload Handling
    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $sql = "INSERT INTO users (name, email, mobile, address, image, details) 
                    VALUES ('$name', '$email', '$mobile', '$address', '$fileName', '$details')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('User added successfully!');</script>";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form with Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">PHP Form</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="btn btn-primary" href="show.php">View Users</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Form -->
<div class="container mt-5">
    <h2 class="text-center">User Registration Form</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow">
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mobile:</label>
            <input type="tel" name="mobile" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address:</label>
            <textarea name="address" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Upload Image:</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Details:</label>
            <textarea name="details" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

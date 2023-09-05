<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['desc'];
    $category = $_POST['category'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
    } else {
        echo "Error";
    }
    $price = $_POST['price'];
    $conn = new mysqli('localhost', 'root', '', 'wallpaperDB');
    if ($conn->connect_error) {
        die('Connection failed...' . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO wallpapers (name, description, category, image, price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $name, $description, $category, $image, $price);
    if ($stmt->execute()) {
        echo "Wallpaper uploaded successfully.";
        header("refresh:1;url=../Home/index.php");
    } else {
        echo "Error uploading wallpaper: " . $stmt->error;
        header("refresh:1;url=upload.php");
    }
} 
$conn->close();
?>
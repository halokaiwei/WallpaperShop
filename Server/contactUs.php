<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telno = $_POST['telno'];
    if (empty($_POST['type'])) {
        echo "Please select the feedback type. Back to previous page...";
        header("refresh:2; url=../Contact/index.php");
    }
    $type = $_POST['type'];
    $suggestion = $_POST['suggestion'];
    $image = '';
    if (isset($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        if ($image === false) {
        }
    }
    $conn = new mysqli('localhost','root','','wallpaperDB');
    if ($conn -> connect_error) {
        die ("Connection failed..." . $conn->connect_error );
    }
    $sql = "INSERT INTO contactUs (name,email,telno,feedback,suggestions,image) VALUES (?,?,?,?,?,?)";
    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param("ssssss",$name,$email,$telno,$type,$suggestion,$image);
    $success=false;
    if ($stmt -> execute()) {
        $success=true;
    };
    if ($success && $stmt->errno == 0) {
        echo "Your feedback had received by us. Thank you for your suggestions!";
    }
    else {
        echo "Error when receiving your feedback. Back to previous page...";
        header("refresh:2; url=../Contact/index.php");
    }
    $stmt -> close();
    $conn -> close();
    
}


?>
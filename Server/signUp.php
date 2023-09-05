<?php 
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $existed = false;
        $username = $_POST['userN'];
        $password = md5($_POST['passW']);
        $conn = new mysqli('localhost','root','','users');
        if ($conn -> connect_error) {
            die ("Connection failed..." . $conn->connect_error);
        }
        $query = "SELECT * FROM loging WHERE username = ?";
        $stmt = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) >0) {
            echo "Username had already exists. Please use different username.";
            header('refresh:1;url=../signIn/signUp.php');
            exit();
        }
        else {
        $query = "INSERT INTO loging (username,password) VALUES (?,?)";
        $stmt = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt,"ss",$username,$password);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['loggedIn'] == true;
            echo "Sign up successfully. You may log in to new account now.";
            header('refresh:1;url=../signIn/index.php');
        } else {
            echo "Sign up failed. Please try again.";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
    
    ?>
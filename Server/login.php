<?php 
    session_start();
    if (!isset($_SESSION['loggedIn'])) {
        $_SESSION['loggedIn'] = false;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['userN'];
        $password = md5($_POST['passW']);
        $conn = new mysqli('localhost','root','','users');
        if ($conn -> connect_error) {
            die ("Connection failed..." . $conn->connect_error);
        }
        $query = "SELECT * FROM loging WHERE username = ? AND password = ? LIMIT 1";
        $stmt = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt,"ss",$username,$password);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        if ($result -> num_rows == 1) {
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['userN'] = $row['username'];
            $_SESSION['loggedIn'] = true;
            header('location:../Home/index.php');
            exit();
        }
            echo "Incorrect username or password. Please try again.";
            header("refresh:1; url=../signIn/index.php");
            exit();
    }
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        header('location:../Upload/index.php');
        exit();
    } else {
        header('location:../signIn/index.php');
    }
    
    
    
    ?>

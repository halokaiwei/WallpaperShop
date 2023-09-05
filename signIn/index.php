<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../style/signInStyle.css">
    <script src="../Javascript/JScript.js"></script>
    <title>Home Page </title>
</head>
    <body>
        <?php include "../header/header.php"; ?>
        <div id="signInForm">
            <form action="../Server/login.php" method="post">
                <h2> Sign in to upload your wallpapers! </h2>
                <input type="text" name="userN" placeholder="Enter username">
                <br>
                <input type="password" name="passW" placeholder="Enter password"> 
                <div id="signUp">
                    Haven't have an account? <a href="signUp.php">Sign up</a> with us!
                </div>
                <input type="submit"></input>
            </form>
        </div>
        <?php include "../footer/footer.php"; ?>
    </body>
</html>
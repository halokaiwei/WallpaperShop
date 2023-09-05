<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/signUpStyle.css">
    <title>Document</title>
</head>
<body>
        <?php include "../header/header.php"; ?>
        <div id="signUpForm">
            <form action="../Server/signUp.php" method="post">
                <h2> Sign Up </h2>
                <input type="text" name="userN" placeholder="Set an username">
                <br>
                <input type="password" name="passW" placeholder="Set a password"> 
                <div id="signUp">
                    Already have an account? <a href="index.php">Sign in</a> directly!
                </div>
                <input type="submit"></input>
            </form>
        </div>
        <?php include "../footer/footer.php"; ?>
</body>
</html>
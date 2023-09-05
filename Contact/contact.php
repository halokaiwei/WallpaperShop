<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('../img/background.jpg');
            background-repeat:no-repeat;
            background-size: 100% 100%;
        }
        #contactUsBox {
            text-align: center;
        }
        #imgBox img {
            width: 25%;
            height: 40%;
        }
    </style>
</head>
<body>
    <?php include('../header/header.php');?>
        <div id="contactUsBox">
            <h1> Contact Us </h1>
            <h1> You may email us at </h1>
            <h3> Developer: <a href="mailto:kaiwei03@1utar.my">KW Chong</a></h3>
            <h3> Developer: <a href="mailto:evelynljd@1utar.my">Evelyn JD Lee</a></h3>
            <h3> Developer: <a href="mailto:lly.liyan@1utar.my">LY Leow</a></h3>
            <h3> Developer: <a href="mailto:baoyee19@1utar.my">BY Tan</a></h3>
            <h3> Developer: <a href="mailto:eugenetiang1118@1utar.my">Eugene Tiang</a></h3>
            <h1> You may call us at </h1>
            <h3> +03 9081 1111 </h3>
            <h3> +03 9081 2222 </h3>
            <div id="imgBox">
                <img src="../img/team.gif" alt="">
            </div>
        </div>
    <?php include "../footer/footer.php"; ?>
</body>
</html>
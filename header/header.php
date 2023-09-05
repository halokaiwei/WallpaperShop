<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../style/headerStyle.css">
        <script src="../JavaScript/Javascript.js"></script>
        <title>Home Page </title>
    </head>
    <body> 
        <?php session_start(); ?>
        <div id="header">     
                <div id="compLogo"> <img src="../img/CuteLogo.jpg" id="comp-Logo" alt="Company Logo"> </div>
                <ul id = "headerNav">
                    <li id="Upload"> UPLOAD MY WALLPAPER </li>
                    <li id="Gallery"> 
                        WALLPAPER GALLERY 
                        <ul>
                            <li><a href="../horizontal/itemList_nature.php">Nature</a></li>
                            <li><a href="../horizontal/itemList_animal.php">Animals</a></li>
                            <li><a href="../horizontal/itemList_disney.php">Disney</a></li>
                            <li><a href="../horizontal/itemList_car.php">Car</a></li>
                            <li><a href="../horizontal/itemList_food.php">Food</a></li>
                            <li><a href="../horizontal/itemList_doodle.php">Doodle</a></li>
                        </ul>
                    </li>
                    <li id="Contact"> 
                        CONTACT US 
                        <ul>
                            <li><a href="../Contact/contact.php">Email/Phone</a></li>
                            <li><a href="../Contact/index.php">Feedbacks</a></li>
                        </ul>
                    </li>
                    <li id="Home"> HOME </li>
                </ul>
        </div>
        <div class="nav">
            <div class="nav-item">
                <img src="../img/user4.png" alt="">
                <div class="nav-submenu">
                <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
                        <a href="../Upload/index.php"> <?php echo $_SESSION['userN']; ?></a>
                    <?php else: ?>
                        <a href="../signIn/index.php">Log in</a>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
                        <a href="../wishList/index.php">WishList</a>
                    <?php else: ?>
                    <?php endif; ?>
                    <a href="#">Settings</a>
                    <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
                        <a href="../Server/logout.php">Log out</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <script>
        var logo = document.getElementById("comp-Logo");
        var Upload = document.getElementById("Upload");
        logo.onclick = function() {
            window.location.href='../Home/index.php';
        }
        var Gallery = document.getElementById("Gallery");
        var Contact = document.getElementById("Contact");
        var Home = document.getElementById("Home");
        var headerNavs = [Gallery,Upload,Contact,Home];
        for (var i=0; i<headerNavs.length; i++) {
            headerNavs[i].onmouseover = function() {
                this.style.backgroundColor= 'rgba(188, 238, 238, 0.3)';
                this.style.fontSize= '1.2rem';
                this.style.cursor= 'pointer';
            }   
            headerNavs[i].onmouseout = function() {
                this.style.backgroundColor= 'rgba(238, 238, 238, 0.3)';
                this.style.fontSize= '1.1rem';
            }
        }   
        Upload.onclick = function() {
            window.location.href="../Server/login.php";
        }
        Home.onclick = function() {
            window.location.href="../Home/index.php";
        }
        var userImg = document.querySelector('.nav-item');
        userImg.onclick = function() {
            window.location.href="../Server/login.php";
        }
    </script>
</body>
</html>
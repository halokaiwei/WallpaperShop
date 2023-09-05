<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../style/homePageStyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).on('click', '.add-to-wishlist-btn', function() {
            var wallpaperId = $(this).data('wallpaper-id');
            var wallpaperImage = $(this).data('wallpaper-image');
            $.ajax({
                type: 'POST',
                url: '../Server/addToWishlist.php',
                data: {
                    id: wallpaperId,
                    image: wallpaperImage
                },
                success: function(response) {
                    console.log(response);
                    alert('Wallpaper add to wishlist successfully');
                }
            });
        });
	</script>
    </head>
    <title>Home Page </title>
</head>
    <body>
        <?php 
            require_once '../SQL/CreateDBUser.php';
                require_once '../SQL/CreateDBWP.php'; ?>
        <!-- header & navigation-->
        <?php include "../header/header.php"; ?>
        <!-- banner -->
        <div id="banner" >
            <div id="bannerWord">
                <h1> Welcome to Wallpaper Castle! </h1> 
                <h3> Welcome to our digital wallpaper buying and selling platform! 
                    We are excited to offer you a convenient and easy way to browse, purchase, and sell high-quality digital wallpapers 
                    for use on your phone or computer. </h3>
            </div>
                <div id="searchMid"> 
                    <form action="../search/searching.php" id="searching" method="POST">
                    <label for="search"> </label>
                    <input type="text" id="search" name="searchText" placeholder="Search wallpaper here...">
                    </form>
                    <img src="../img/searchIcon.png" id="searchIcon"> 
                    </form>
                </div>
        </div>
        <h1>Newest Uploaded Wallpapers</h1>
        <!-- categories -->
        <?php
        $conn = new mysqli('localhost','root','','wallpaperDB');
        if ($conn->connect_error) {
            die ('Connection failed...' . $conn->connect_error );
        }

        // Retrieve wallpaper details from the database
        $sql = "SELECT * FROM wallpapers";
        $result = $conn->query($sql);

        // Display wallpaper details in rows of three
        echo '<div class="wallpapers-container">';
        $count = 0;
        while($row = $result->fetch_assoc()) {
            // Display wallpaper details in a card
            echo '<div class="wallpaper-card">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" />';
            echo '<a href="../details/details.php?id=' . $row['id'] . '"><div class="details">View</div></a>';
            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
            echo "<button class='add-to-wishlist-btn' data-wallpaper-id='" . $row['id'] . "' data-wallpaper-image='" . base64_encode($row['image']) . "'>&#10084;</button>";            
            echo '</div>';
            
            // Check if we have displayed three wallpapers in a row
            $count++;
            if ($count == 3) {
                echo '<div class="clear"></div>';
                $count = 0;
            }
        }
        echo '</div>';
        $conn->close();
        ?>
        <!-- footer -->
        <?php include "../footer/footer.php"; ?>
        <script>
            const bannerImages = ['../img/wallpaper8.jpg', '../img/wallpaper7.jpg', '../img/wallpaper6.jpg', '../img/wallpaper1.jpg'];
            let currentImageIndex = 0;
            const banner = document.getElementById('banner');
            function changeBackgroundImage() {
                currentImageIndex = (currentImageIndex + 1) % bannerImages.length;
                banner.style.backgroundImage = `url(${bannerImages[currentImageIndex]})`;
            }
            setInterval(changeBackgroundImage, 5000);
            banner.style.transition = 'background-image 1s ease-in-out';

            const searchIcon = document.getElementById("searchIcon");
            const searchingForm = document.getElementById("searching");

            searchIcon.addEventListener("click", function(event) {
                event.preventDefault(); // prevent default behavior of clicking on an image
                searchingForm.submit(); // submit the form
            });
            

</script>
        </script>
</body>
</html>
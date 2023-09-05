<html>
<head>
	<title>Wallpapers Wishlist</title>
	<link rel="stylesheet" href="../style/itemListStyle.css">
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
<body>
	<?php include "../header/header.php"; ?>
	<nav class = itemNavigation>
		<ul>
		  <li>
			<div class="itemNav">
				<a href="./itemList_nature.php"><img src="../pics/desktop/nature/desktop-nature-nav.jpg">Nature</a>
			</div>
		</li>
		  <li>
			<div class="itemNav">
				<a href="./itemList_animal.php"><img src="../pics/desktop/animal/desktop-animal-nav.jpg">Animals</a>
			</div>
		</li>
		  <li>
			<div class="itemNav">
				<a href="./itemList_disney.php"><img src="../pics/desktop/disney/desktop-disney-nav.png">Disney</a>
			</div>
		</li>
		  <li>
			<div class="itemNav">
				<a href="./itemList_car.php"><img src="../pics/desktop/car/desktop-car-nav.jpg">Car</a>
			</div>
		</li>
		  <li>
			<div class="itemNav">
				<a href="./itemList_food.php"><img src="../pics/desktop/food/desktop-wallpaper1.jpg">Food</a>
			</div>
		</li>
		<li>
			<div class="itemNav">
				<a href="./itemList_doodle.php"><img src="../pics/desktop/doodle/desktop-doodle-nav.jpg">Doodle</a>
			</div>
		</li>
		</ul>
	</nav>

	
	<!-- Desktop Wallpapers -->
	<h2>Desktop Wallpapers</h2>
	<div class="grid">
	<ul>
	<?php
        $conn = new mysqli('localhost','root','','wallpaperDB');
        if ($conn->connect_error) {
            die ('Connection failed...' . $conn->connect_error );
        }
		$category = 'food';
        $sql = "SELECT * FROM wallpapers WHERE category = '$category'";
        $result = $conn->query($sql);

        $count = 0;
        while($row = $result->fetch_assoc()) {
            echo '<li>';
			echo '<div class="container">';
			echo '<a href=#>';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" />';
			echo '<a href="../details/details.php?id=' . $row['id'] . '"><div class="details">View</div></a>';
			echo '</a>';
			echo '</div>';
            echo "<button class='add-to-wishlist-btn' data-wallpaper-id='" . $row['id'] . "' data-wallpaper-image='" . base64_encode($row['image']) . "'>&#10084;</button>";            
            echo '</li>';

            $count++;
            if ($count == 3) {
                echo '<div class="clear"></div>';
                $count = 0;
            }
        }
        $conn->close();
        ?>
		
	</ul>
</div>
<?php include "../footer/footer.php"; ?>
</body>
</html>

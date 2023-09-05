<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../style/searchStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include '../header/header.php'; ?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $searching = $_POST['searchText'];
        $conn = new mysqli('localhost','root','','wallpaperDB');
        if ($conn -> connect_error) {
            die ("Connection failed..." . $conn->connect_error);
        }
        $sql = "SELECT * FROM wallpapers WHERE name LIKE '%$searching%' OR description LIKE '%$searching%' ";
        $result = $conn -> query($sql);
        echo '<div class="wallpapers-container">';
        $count = 0;
        while ($row = $result -> fetch_assoc()) {
            $name = $row['name'];
            $description = $row['description'];
            echo '<div class="wallpaper-card">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" />';
            echo '<a href="../details/details.php?id=' . $row['id'] . '"><div class="details">View</div></a>';
            echo "<button class='add-to-wishlist-btn' data-wallpaper-id" . $row['id'] . ">&#10084</button>";
            echo '</div>';

            $count++;
            if ($count == 3) {
                echo '<div class="clear"></div>';
                $count = 0;
            }
        }
        echo '</div>';
        }


?>
<script>
		$(document).ready(function() {
			$('.add-to-wishlist-btn').click(function() {
				var wallpaper_id = $(this).data('wallpaper-id');
				window.location.href = '../Server/addToWishlist.php?wallpaper_id=' + wallpaper_id;
			});
		});
</script>
</body>
</html>

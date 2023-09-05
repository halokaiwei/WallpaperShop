<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="detailsStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Document</title>
</head>
<body>
    <?php include '../header/header.php'; ?>
    <h1 id='detailss'>Item Details</h1>
    <?php
        $conn = new mysqli('localhost','root','','wallpaperDB');
        if ($conn->connect_error) {
            die ('Connection failed...' . $conn->connect_error );
        }
        $id = $_GET['id'];

        //Get from wallpapers
        $sql = "SELECT * FROM wallpapers WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<div class="wallpaperImg">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" />';
            echo '<div class="wallpaper-details">';
            echo '<h1>' . $row['name'] . '</h1>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<p>Category: ' . $row['category'] . '</p>';
            echo '<p>Price: RM' . $row['price'] . '</p>';
            echo "<button class='add-to-wishlist-btn' data-wallpaper-id='" . $row['id'] . "' data-wallpaper-image='" . base64_encode($row['image']) . "'>&#10084;</button>";            
            echo '</div>';
            echo '</div>';
        } 
        else {
            echo 'Wallpaper not found.';
        }

        $conn->close();
    ?>
    <?php include '../footer/footer.php'; ?>
</body>
</html>
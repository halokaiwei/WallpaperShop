<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../style/wishListStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    function validateForm() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"][name="wallpapers[]"]:checked');
    if (checkboxes.length == 0) {
    alert("Please select at least one wallpaper to checkout.");
    event.preventDefault(); // prevent the form from submitting
  }
}
    </script>
</head>
<body>
    <?php include '../header/header.php'; ?>
    <h1>Wishlist</h1>
        <!-- categories -->
        <?php
        $conn = new mysqli('localhost','root','','wallpaperDB');
        if ($conn->connect_error) {
            die ('Connection failed...' . $conn->connect_error );
        }
        if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
            $sql = "DELETE FROM wishlist WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt -> bind_param('i', $_GET['remove']);
            $stmt -> execute();
        }

        $sql = "SELECT * FROM wishlist";
        $result = $conn->query($sql);
        echo '<form method="post" action="checkout.php" id="wishlist-form">';
        echo '<div class="wallpapers-container">';
        $count = 0;
        while($row = $result->fetch_assoc()) {
            echo '<div class="wallpaper-card">';
            if (!empty($row['image'])) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" />';
            }
            echo '<input type="checkbox" name="wallpapers[]" value="' . $row['id'] . '" />';
            echo '<a href="../details/details.php?id=' . $row['id'] . '"><div class="details">View</div></a>';
            echo '<a href="?remove=' . $row['id'] . '"><div id="remove">Remove</div></a>';
            echo '</div>';

            $count++;
            if ($count == 3) {
                echo '<div class="clear"></div>';
                $count = 0;
            }
        }
        echo '</div>';
        echo '<input type="submit" name="checkout" value="Checkout" onclick="validateForm()" />';
        echo '</form>';
        $conn->close();
        ?>
        <?php include '../footer/footer.php'; ?>
</body>
</html>
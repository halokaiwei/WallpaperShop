<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/uploadStyle.css">
    <title>Document</title>
</head>
<body>
    
<?php include('../header/header.php');?>
            <div id ='uploadBox'>
                <div id='uploadIntro'>
                    <h1> <?php echo "Welcome! " . $_SESSION['userN']; ?></h1>
                    <h1>Upload your wallpaper here</h1>
                </div>
                <div id= 'uploadForm'>
                    <form action="../Server/upload.php" method="post" enctype="multipart/form-data">
                    <input type="text" id="name" name="name" placeholder="Enter wallpaper name here" required>
                    <br>
                    <input type="text" id="desc" name="desc" placeholder="Enter wallpaper description here" required>
                    <br>
                    <input type="number" id="price" name="price" placeholder="Enter the price here(RM)" required>
                    <br>
                    <select name="category" id="category">
                        <option value="selected" selected disabled>Category</option>
                        <option value="nature">Nature</option>
                        <option value="animals">Animals</option>
                        <option value="disney">Disney</option>
                        <option value="car">Car</option>
                        <option value="food">Food</option>
                        <option value="doodle">Doodle</option>
                    </select>
                    <br>
                    <label for="image">Upload Wallpaper: </label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                    <br>
                    <input type="submit" name="submit">
                    </form>
                </div>
            </div>
            <?php include "../footer/footer.php"; ?>
</body>
</html>
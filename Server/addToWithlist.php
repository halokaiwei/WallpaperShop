<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$conn = new mysqli('localhost','root','','wallpaperDB');
		if ($conn->connect_error) {
			die ('Connection failed...' . $conn->connect_error );
		}
		// Get wallpaper details 
		$wallpaper_id = $_POST['id'];
		$image = base64_decode($_POST['image']);
	
		// Insert wallpaper details 
		$sql = "INSERT INTO wishlist (id, image) VALUES (?,?)";
		$stmt = $conn -> prepare($sql);
		$stmt -> bind_param("is",$wallpaper_id,$image);
		if ($stmt -> execute()) {
			echo "Wallpaper added to wishlist!";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
	?>

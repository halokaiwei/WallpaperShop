<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../style/checkoutStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include '../header/header.php'; ?>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'wallpaperDB');
    if ($conn->connect_error) {
        die('Connection failed...' . $conn->connect_error);
    }
    $wallpaper_ids = $_POST['wallpapers'];

    // Retrieve wallpaper details from the database
    $sql = "SELECT * FROM wallpapers WHERE id IN (" . implode(',', $wallpaper_ids) . ")";
    $result = $conn->query($sql);

    // Display selected wallpapers and their prices
    $total_price = 0;
    while($row = $result->fetch_assoc()) {
        echo '<div class="wallpaper-card">';
        if (!empty($row['image'])) {
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" />';
        }
        echo '<a href="../details/details.php?id=' . $row['id'] . '"><div class="details">View</div></a>';
        echo "<p id='price'>RM" . $row['price'];
        echo '</div>';

        $total_price += $row['price'];
    }

    // Display total price
    echo '<div class="total-price">Total Price: RM' . $total_price . '</div>';
?>

<div id="paymentBox">
    <form method="POST" action="path_to_process_payment">
        <h1>Payment Making</h1>
        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" placeholder="1234 5678 9012 3456" required>
        
        <label for="card_name">Cardholder Name:</label>
        <input type="text" id="card_name" name="card_name" placeholder="John Doe" required>
        
        <label for="expiry_date">Expiry Date:</label>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
        
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" placeholder="123" required>
        
        <label for="receiver_name">Receiver Name:</label>
        <input type="text" id="receiver_name" name="receiver_name" placeholder="Jane Doe" required>
        
        <label for="receiver_email">Receiver Email:</label>
        <input type="email" id="receiver_email" name="receiver_email" placeholder="jane@example.com" required>
        
        <label for="receiver_phone">Receiver Telephone Number:</label>
        <input type="tel" id="receiver_phone" name="receiver_phone" placeholder="555-555-5555" required>
        
        <label for="receiver_address">Receiver Address:</label>
        <textarea id="receiver_address" name="receiver_address" placeholder="123 Main St, Anytown USA" rows="10" cols="90" required></textarea>
        
        <input type="submit" value="Submit Payment">
    </form>
    </div>

</body>
</html>
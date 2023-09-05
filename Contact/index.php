<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../style/CUStyle.css">
    <title>Contact Us</title>
</head>
<html>
    <body>
            <?php include('../header/header.php');?>
            <div id ='contactUsBox'>
                <div id='contactUsIntro'>
                    <h1>Let's chat</h1>
                    <h1>Tell us about your needs</h1>
                </div>
                <div id= 'contactUsForm'>
                    <form action="../Server/contactUs.php" method="post">
                    <input type="text" id="name" name="name" placeholder="Enter your name here" required>
                    <br>
                    <input type="text" id="email" name="email" placeholder="Enter your email here" required>
                    <br>
                    <input type="text" id="telno" name="telno" placeholder="Enter your phone number here" required>
                    <br>
                    <select name="type" id="type">
                        <option value="type" selected disabled>Feedback Type</option>
                        <option value="review">Review and Rating</option>
                        <option value="bugReport">Bug Report</option>
                        <option value="featureRequest">Feature Request</option>
                        <option value="other">Other</option>
                    </select>
                    <br>
                    <textarea name="suggestion" rows="5" cols="50" placeholder="Enter your suggestions here" required></textarea>
                    <br>
                    <label for="image-upload">Upload Image: </label>
                    <input type="file" id="image-upload" name="image-upload">
                    <br>
                    <input type="submit" name="submit">
                    </form>
                </div>
            </div>
            <?php include "../footer/footer.php"; ?>
    </body>
    </html>
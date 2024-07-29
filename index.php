<?php
$insert=false;
if(isset($_POST["name"])) {

    

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other=$_POST['other'];
    

    $sql = "INSERT INTO `otaku`.`data` (`name`, `age`, `gender`, `email`, `phone`, `other`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    

    if ($con->query($sql) == TRUE) {
        $insert=true;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME TO ANIME FORUM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="./pictures/1343977.jpeg" alt="">
    <div class="container">
        <h1 class="txt">Welcome to Otaku Meets</h1>
        <p class="txt">Enter your details and submit this form to confirm your participation in the Cosplay Event</p>
        <?php
            if($insert==true){

        echo "<p class='submit'>Thanks for submission</p>";
        $insert=false;
    }
        ?>

        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="other" id="desc" rows="10" cols="30" placeholder="Enter any other information here"></textarea>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>

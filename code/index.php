<?php
$insert=false;
if(isset($_POST['name'])){
    $server ="localhost";
    $username="root";
    $password="";

    $con =mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to this database failed due to ". mysqli_connect_error());
    
    }
    //echo "Connection Success";
    $name= $_POST['name'];
    $gender= $_POST['gender'];
    $age= $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc= $_POST['desc'];
    

    $sql = "INSERT INTO `travel`.`trip` ( `Name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
    VALUES ('$name', '$age', '$gender','$email', '$phone', '$desc', current_timestamp());";

    //echo $sql;

    if($con->query($sql) == true){
        //echo "Successfully inserted";
        $insert=true;
    
    }else{
        echo "ERROR : $sql <br> $con->error";

    }
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="Mumbai Sealink">
    <div class="container">
        <h1>Welcome to Mumbai Trip Form</h1>
        <p>Enter your details and submit this form to confirm your
            participation in the trip.
        </p>
        <?php
            if($insert==true){
                echo "<p class='submitmsg'>Thanks For submitting form. We will see you in Mumbai</p>";
            }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information "></textarea>
            <button class="btn">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>

</body>
</html>

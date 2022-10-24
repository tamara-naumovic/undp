<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
<?php
    $name="";
    $email="";
    $comment = "";
    $gender = "";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $name = test_inputs($_POST["name"]);
            $email = test_inputs($_POST["email"]);
            $comment = test_inputs($_POST["comment"]);
            $gender = test_inputs($_POST["gender"]);
        }

        function test_inputs($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <!-- default method GET -->
    <!-- <form action="welcome.php" > -->
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder="Enter your name: "><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Enter your email: "><br>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        <br>
        <label >Gender: </label>
        <input type="radio" name="gender" id="m" value="male"> Male
        <input type="radio" name="gender" id="f" value="female"> Female
        <input type="radio" name="gender" id="o" value="other"> Other
        <br>    
        <input type="submit" value="Enter meeting">
    </form>
    <h2>Your input: </h2>
    <p>
        <?php
        echo $name."<br>";
        echo $email."<br>";
        echo $comment."<br>";
        echo $gender."<br>";
        ?>
    </p>

</body>
</html>
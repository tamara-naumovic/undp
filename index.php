<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        .error{
            color: red;
            font-size: small;
        }
    </style>
</head>
<body>
<?php
    $name="";
    $email="";
    $comment = "";
    $gender = "";
    $nameErr = $emailErr = $genderErr = "";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["name"])){
                $nameErr = "Name is required";
            }else{
                $name = test_inputs($_POST["name"]);
            }

            if(empty($_POST["email"])){
                $emailErr = "Email is required";
            }else{
                $email = test_inputs($_POST["email"]);
            }
            
            if(empty($_POST["comment"])){
                $comment = "--No comment--";
            }else{
                $comment = test_inputs($_POST["comment"]);
            }
            
            if(empty($_POST["gender"])){
                $genderErr = "Gender is required";
            }else{
                $gender = test_inputs($_POST["gender"]);

            }
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
        <span class="error">*<?php echo $nameErr?></span><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Enter your email: "><br>
        <span class="error">*<?php echo $emailErr?></span><br>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        <br>
        <label >Gender: </label>
        <input type="radio" name="gender" id="m" value="male"> Male
        <input type="radio" name="gender" id="f" value="female"> Female
        <input type="radio" name="gender" id="o" value="other"> Other
        <br>
        <span class="error">*<?php echo $genderErr?></span><br>

        <input type="submit" value="Enter meeting">
    </form>
    <h2>Your input: </h2>
    <p>
        <?php
        if($nameErr || $emailErr || $genderErr){
            echo "<span class='error'>Enter required data</span>";
        }else{
        echo $name."<br>";
        echo $email."<br>";
        echo $comment."<br>";
        echo $gender."<br>";
        echo "Kodovi za htmlspecialchars: &amp; &quot; &lt; ";
        }
        ?>
    </p>

</body>
</html>
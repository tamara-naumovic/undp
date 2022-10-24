<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="welcome.php" method="POST">
    <!-- default method GET -->
    <!-- <form action="welcome.php" > -->
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder="Enter your name: "><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Enter your email: "><br>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        <br>    
        <input type="submit" value="Enter meeting">
    </form>


</body>
</html>
<?php
// importing connection code
include_once("connection.php");
$con = connection();
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM admin WHERE password = '$password' AND username='$username' ";
    $user = $con -> query ($sql) or die ($con -> error);
    $row = $user -> fetch_assoc();
    $total = $user -> num_rows;
    
    if($total > 0){
        if($password == $row["password"] && $username == $row["username"]){
            $_SESSION ["login"] = true;
            $_SESSION ["id"] = $row["id"];
            header("Location:home.php");
        }else{
         echo "Wrong Username and Password";
        }
}else{
    echo "Wrong Username and Password";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

</head>
<body class="body_class">
    <form action="" method="post" class="form_class">
        <h1 class="login_text">Login System</h1>
        <label for="">Username</label>
        <input type="text" name="username" placeholder="Enter your Username" required>
        <br>
        <br>
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Enter your Password" required>
        
        <br>
        <br>
        <input type="submit" name="login" value="Login" class="login">
    </form>
</body>
</html>
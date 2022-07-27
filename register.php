<?php

include"config.php";

error_reporting(0);

session_start();

if(isset($_SESSION["username"])){
        header("Location: index.php");
}

if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST["password"]);
    $_cppassword = md5($_POST["cppassword"]);

    if($password==$cppassword)
        {$sql="SELECT * FROM user WHERE email='$qmail'";
        $result = mysqli_query($conn, $sql);
        if(!result->num_rows > 0) {
            $sql = "INSERT INTO users ('username','email,'password')
                    VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($conn,$sql);
        if($result) {
            echo"<script>alert('Wow! User Regristration Completed')</script>";
            $username="";
            $email="";
            $_POST['password']="";
            $_POST['cppassword']="";
        } else {
            echo"<script>alert('woops Something wrong went')</script>";
        }
    } else {
        echo"<script>alert('Woops ! Email Already Exits')</script>";
    }

} else {
    echo"<script>alert('Password not Macthed')</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <form action=""method="POST" class="login-email">
            <p style="font-size: 2rem; font-weihg:850;">REGISTER</p>
            <div class="input-group"><input type="text" placeholder="User Name" name="username" value="<?php echo $username;?>"></div>
            <div class="input-group"><input type="text" placeholder="Email" name="email" value="<?php echo $email;?>"></div>
            <div class="input-group"><input type="password" placeholder="Password" name="password" value="<?php echo $_POSTI["password"];?>"required></div>
            <div class="input-group"><input type="password" placeholder="Comfirm Password" name="cppassword"<?php echo $_POST["cppassword"];?>></div>
            <div class="input-group"><button name="submit" class="btn">Register</button></div>
            <p class="login-register-text">Have an Account ?
                <a href="index.php">Log in</a>
            </p>
        </form>
    </div>
    
</body>
</html>
<?php
require 'class.php';
$con = new Database();
$con->connect('localhost', 'root', '', 'newtasks');
$msg = '';
$error = array();
if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    echo $username,$password;
    // if ($password!=$repassword) {
    //     $error=array('input'=>'password','msg'=>'password doesnt match');
    // }
    if (sizeof($error) == 0) 
    {
        $fields = array('user_name', 'mobile', 'password', 'name');
        $values = array($username, $mobile, $password, $name);

        $res = $con->insert($fields, $values, 'tbl_user');

        if ($res) 
        {
            echo "<script>alert('inserted')</script>";
            $error=array('input'=>'form','msg'=>"1 Row inserted");
        }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
   <title>
      Register
   </title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div id="nav1">
    <ul>
        <li><img src="olaimg.png"></li>
        <div id="nav">
            <h1>Welcome To CEDCABS Enjoy Your Ride</h1>
        </div>
    </ul>
</div>
    <div id="wrapper">
        <div id="signup-form">
            <h2>Sign Up</h2>
            <h2><?php  ?></h2>
            <form method="POST">
                <p>
                    <label for="username">Username: 
                        <input type="text" name="username" required>
                    </label>
                </p>
                <p>
                    <label for="name">Name: 
                        <input type="text" name="name" required>
                    </label>
                </p>
                <p>
                    <label for="password">Password: 
                        <input type="password" name="password" required>
                    </label>
                </p>
                <p>
                    <label for="mobile">Mobile: 
                        <input type="text" name="mobile" required>
                    </label>
                </p>
                <p class="submit">
                     <input type="submit" name="submit" value="Submit">
                </p>
                <p class="login">
                    Already Registered?<a href="login.php">Login Here</a>
                </p>
            </form>
        </div>
        <div class="error">
            
        </div>
    </div>
    <div id="margin">
    </div>
</body>
</html>
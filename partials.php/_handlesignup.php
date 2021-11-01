<?php
$showerror="false";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';

    $user_email=$_POST['signupemail'];
    $pass=$_POST['signuppassword'];
    $cpassword=$_POST['signupcpassword'];

    //check whether this email exits
    $exitssql="SELECT * FROM `users` WHERE user_email='$user_email'";
    $result=mysqli_query($conn,$exitssql);
    $numrows=mysqli_num_rows($result);
    $showalert=false;
    if($numrows>0){
        $showerror="Email_err";
}else{
    if($pass==$cpassword){
        $hash=password_hash($pass,PASSWORD_DEFAULT);
        $sql="INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        if($result){
            $showalert=true;
            header("Location:/forum/index.php?signupsuccess=true");
            exit;
        }

    }else{
        $showerror="Password_err";
        
    }
}
header("Location:/forum/index.php?signupsuccess=false&error=$showerror");
    }

    

?>
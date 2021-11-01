<?php
$showerror=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
include '_dbconnect.php';
$loginemail=$_POST['loginemail'];
$loginpass=$_POST['loginpassword'];
$sql="SELECT * FROM `users` WHERE `user_email`='$loginemail'";
$result=mysqli_query($conn, $sql);
$numrows=mysqli_num_rows($result);
if ($numrows==1){
    $row=mysqli_fetch_assoc($result);
 if(password_verify($loginpass, $row['user_pass'])){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['useremail'] = $loginemail;
        $_SESSION['sno'] = $row['sno'];
        //echo "logged in". $loginemail;
        header("Location:/forum/index.php?showalert=true");
        exit();
    }else {
        //echo "unable to login";
        $showerror="true";
        header("Location:/forum/index.php?showerror=$showerror&error=false");
    }
}
}


?>
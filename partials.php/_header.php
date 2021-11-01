<?php
$showlog=true;
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
  //echo "loggedin";
  $showlog=false;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/forum">eDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql="SELECT category_name,category_id FROM `categories` LIMIT 4 ";
        $result=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($result)) {
          $catname=$row['category_name'];
          echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$catname.'</a></li>';

        }
        

          


       
         echo '</ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>
    </ul>
    <form class="d-flex" action="search.php" method="get">
      <input class="form-control me-2" type="search" name="query" placeholder="Search"  aria-label="Search">
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>';
    if($showlog){
       echo '<button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>';
    }
        if(!$showlog){
          echo '<p class="text-light my-2 mx-2">Welcome '.$_SESSION['useremail'].'</p>';
        echo '<a href="/forum/partials.php/_logout.php" class="btn btn-primary mx-2">Log out</a>';
        }
 echo '</div>
</div>
</nav>';
include 'partials.php/_loginModal.php';
include 'partials.php/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Your account has been created successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['signupsuccess']) && ($_GET['signupsuccess']=="false" && $_GET['error']=="Email_err" )){
  echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
  <strong>Caution!</strong> Email already exits try another one.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}else{
  if(isset($_GET['signupsuccess']) && ($_GET['signupsuccess']=="false" && $_GET['error']=="Password_err")){
  echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
  <strong>Caution!</strong> Passwords do not match.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
}
if(isset($_GET['showerror']) && $_GET['error']=="false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Invalid Credentials.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['showalert']) && $_GET['showalert']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Logged in!</strong> You are successfully logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['logout']) && $_GET['logout']=="true"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Logged out!</strong> You are successfully logged out.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>
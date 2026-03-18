<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
    #footer {
        min-height: 433px;
    }
    #threadhead{
        border: 2px ;
        background-color: #e5edf5;
    }
    
    </style>
    <title>eDiscuss Online Forum</title>
</head>

<body>
    <?php include 'partials.php/_dbconnect.php';  ?>
    <?php include 'partials.php/_header.php'; ?>
    
    <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `categories` WHERE category_id=$id;";
          $result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    $catname=$row['category_name'];
    $catdesc=$row['category_desc'];
}
    ?>
    <?php
    $shoealert=false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Insert thread into db
        $thread_title=$_POST['title'];
        $thread_title=str_replace("<","&lt;",$thread_title);
        $thread_title=str_replace(">","&gt;",$thread_title);
        $thread_desc=$_POST['desc'];
        $thread_desc=str_replace("<","&lt;",$thread_desc);
        $thread_desc=str_replace(">","&gt;",$thread_desc);
        $thread_cat_id=$id;
        $sno=$_POST['sno'];
        $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$thread_title', '$thread_desc', '$thread_cat_id', '$sno', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your thread has been added.Please wait community to respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    } 
    
    ?>
    <div class="container my-3 py-2" id="threadhead">
        <div class="jumbotron jumbotron-fluid">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> forum</h1>
            <p class="lead"><?php echo $catdesc; ?> </p>
            <hr class="my-4">
            <p>This is a peer to peer forum.<br>No Spam / Advertising / Self-promote in the forums.
                <br>Do not post copyright-infringing material.
                <br>Do not post “offensive” posts, links or images.
            </p>
        </div>
    </div>
<?php
$showthread=false;
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
    $showthread=true;
    echo '<div class="container" id="discussion">
        <h2 class="py-3">Start a Discussion</h2>
        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We will never share your email with anyone else.</div>
            </div>
            <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
    </div>';}
    else{
        echo '<div class="container">
        <h2 class="py-1">Start a Discussion</h2>
        <p class="lead">You are not logged in. Please login to be able to start a discussion</p>
        
        </div>';
    }

    ?>
    <div class="container mb-5" id=footer>
        <h2 class="py-3">Browse Questions</h2>
        <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id ";
          $result=mysqli_query($conn,$sql);
          $noresult=true;
while ($row=mysqli_fetch_assoc($result)) {
    $noresult=false;
    $id=$row['thread_id'];
    $title=$row['thread_title'];
    $desc=$row['thread_desc'];
    $threadtime=$row['timestamp'];
    $thread_user_id=$row['thread_user_id'];
    $sql2="SELECT user_email FROM `users` WHERE `sno`='$thread_user_id'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);


    echo '<div class="d-flex my-3">
            <div class="flex-shrink-0">
                <img src="img/userdefault.jfif" width="45px" alt="...">
            </div>
            <div class="flex-grow-1 ms-2">
            
                <h5><a href="thread.php?threadid='.$id.'" class="text-dark text-decoration-none">'.$title.'</a></h5>
                '.$desc.' </div><p class="fw-bold my-0"><i>Asked By: </i>'.$row2['user_email'].' at '.$threadtime.'</p>
        </div>';
}
if($noresult){
    //echo var_dump($noresult);
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
            <p class="display-6"> No Threads Found</p>';
        if($showthread){ echo '<p class="lead">Be the first person to ask a question</p>';}
        echo '</div>
    </div>';
    }
    ?>

    </div>
    <?php include 'partials.php/_footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>
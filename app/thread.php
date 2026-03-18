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
    #threads{
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
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `threads` WHERE thread_id=$id;";
          $result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    $title=$row['thread_title'];
    $threaddesc=$row['thread_desc'];
    $thread_user_id=$row['thread_user_id'];
    $sql2="SELECT user_email FROM `users` WHERE `sno`='$thread_user_id'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $postedby=$row2['user_email'];
}
    ?>
    <?php
    $shoealert=false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Insert into comment  db
        $comment=$_POST['comment'];
        $comment=str_replace("<","&lt;",$comment);
        $comment=str_replace(">","&gt;",$comment);
        $sno=$_POST['sno'];
        $sql="INSERT INTO `comments` (`comment_desc`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your comment has been added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    } 
    
    ?>
    <div class="container my-3 py-2" id="threads">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title; ?> </h1>
            <p class="lead"><?php echo $threaddesc; ?> </p>
            <hr class="my-4">
            <p>Posted By: <em><?php echo $postedby; ?></em></p>
        </div>
    </div>
    
    <?php
    if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
        echo '<div class="container">
        <h2 class="py-3">Post a Comment</h2>
        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            </div>
            <button type="submit" class="btn btn-primary my-3">Post Comment</button>
        </form>
    </div>';}
    else {
        echo '<div class="container">
        <h2 class="py-1">Post a Comment</h2>
        <p class="lead">You are not logged in. Please login to be able to post comments.</p>
        
        </div>';
    }




?>
    <div class="container" id=footer>
        <h2 class="py-3">Discussions</h2>
        <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `comments` WHERE thread_id=$id ";
          $result=mysqli_query($conn,$sql);
          $noresult=true;
while ($row=mysqli_fetch_assoc($result)) {
    $noresult=false;
    $id=$row['thread_id'];
    $commentdesc=$row['comment_desc'];
    $comment_time=$row['comment_time'];
    $thread_user_id=$row['comment_by'];
    $sql2="SELECT user_email FROM `users` WHERE `sno`='$thread_user_id'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    echo '<div class="d-flex my-3">
            <div class="flex-shrink-0">
                <img src="img/userdefault.jfif" width="45px" alt="...">
            </div>
            <div class="flex-grow-1 ms-2">
            <p class="fw-bold my-0">'.$row2['user_email'].' at '.$comment_time.'</p>
                '.$commentdesc.'
            </div>
        </div>';
}
if($noresult){
    //echo var_dump($noresult);
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
            <p class="display-6"> No Comments Found</p>
        <p class="lead">Be the first person to answer this question</p>
        </div>
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
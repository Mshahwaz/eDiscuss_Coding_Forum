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
    .maincontainer {
        min-height: 450px;

    }

    .container {
        margin: 5px auto;
        align-items: center;
        width: 40%;
        background-color: #E7E9EB;
        display: block;
        box-shadow: 0px 2px 17px 4px rgba(0,0,0,32%);
    }

    .img {
        background-image: url("img/contact1.jpg");
        height: 250px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        /*position: relative;*/
    }

    .text {
        text-align: center;
        padding-top: 200px;
    }
    .g-recaptcha{
        margin: auto;
    }
    </style>
    <title>eDiscuss Online Coding Forum</title>
</head>

<body background-color:blue;>
    <?php include 'partials.php/_dbconnect.php';  ?>
    <?php include 'partials.php/_header.php'; ?>
    
    <?php 
    $showalert=false;
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $concern=$_POST['concern'];
        $sql="INSERT INTO `user_contact` (`user_name`, `user_email`, `user_concern`, `time`) VALUES ('$name', '$email', '$concern', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        if($result){
            $showalert=true;
        }
    }

?>
<div class="alertcont">
            <?php
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thanks&nbsp</strong>to reaching out with us. We will look into your matter shortly.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                    }
        ?>
        </div>


    <div class="img">
        <div class="text text-light">
            <h3>Contact Us</h3>
        </div>
    </div>
    <div class="maincontainer">
        
        <div class="container">
            <form action="contactus.php" method="post">
                <div class="form-group  py-3">
                    <label for="exampleInputEmail1">Your Name</label>
                    <input type="text" name="name" class="form-control my-1" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="form-group my-2">
                    <label for="exampleInputEmail1">Your Email</label>
                    <input type="email" name="email" class="form-control my-1" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group my-2">
                    <label for="textarea">Your concern</label>
                    <textarea name="concern" class="form-control my-1" id="textarea" rows="2"></textarea>
                </div>
                <div class="g-recaptcha" data-sitekey="6LeQmPQcAAAAAK2KnVZbvCe3gULotySEF__Kz0ul"></div>
                    <br />
                <button type="submit" class="btn btn-dark my-3">Submit</button>
            </form>
        </div>

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
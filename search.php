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
        min-height: 500px;
    }

    #aresult {
        text-decoration: none;
    }
    #noresult{
        border: 2px ;
        background-color: #e5edf5;
        width: 40%;
    }
    .result{
        border: 2px ;
        background-color: #e5edf5;
    }
    /*
        #ques {
            border-radius: 10px 10px;
            background-color: #c2dbff;
        }*/
    </style>
    <title>eDiscuss Online Forum</title>
</head>

<body>
    <?php include 'partials.php/_dbconnect.php';?>
    <?php include 'partials.php/_header.php'; ?>
   

    <!--search result start here -->
    <div class="container my-3" id="footer">
    <h3 class="">Search result for <i><?php echo '"'.$_GET['query'].'"';  ?></i></h3>
    <?php     
    $noresult=true;
    $query=$_GET['query'];
    $sql="SELECT * FROM threads where match (thread_title,thread_desc)against('$query')";
          $result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    $title=$row['thread_title'];
    $threaddesc=$row['thread_desc'];
    $threadid=$row['thread_id'];
    $url="thread.php?threadid=".$threadid;
    $noresult=false;
    echo '<div class="result my-3 py-3 px-1">
            <h4><a href="'.$url.'" class="text-dark" id="aresult">'.$title.'</a></h4>
            <p>'.$threaddesc.'</p>
        </div>';
}
if($noresult){
    echo '<div class="container py-2" id="noresult">
        <h3> No Results Found</h3>
        <p>Suggestions:<ul>

        <li>Make sure that all words are spelled correctly.</li>
        <li>Try different keywords.</li>
        <li>Try more general keywords</p></li>    
    </ul>
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
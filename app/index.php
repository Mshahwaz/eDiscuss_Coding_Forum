<?php include 'partials.php/_dbconnect.php';?>
<?php include 'partials.php/_header.php'; ?>
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
/*
        #ques {
            border-radius: 10px 10px;
            background-color: #c2dbff;
        }*/
    </style>
    <title>eDiscuss Online Forum</title>
</head>

<body>
    
    <?php
    function buildCategoryImage($categoryName) {
        $palettes = [
            ['#0f172a', '#2563eb', '#38bdf8', '#e0f2fe'],
            ['#1f2937', '#059669', '#34d399', '#d1fae5'],
            ['#3f1d2e', '#db2777', '#f472b6', '#fce7f3'],
            ['#3b0764', '#7c3aed', '#c084fc', '#f3e8ff'],
            ['#172554', '#ea580c', '#fdba74', '#ffedd5'],
            ['#082f49', '#0891b2', '#67e8f9', '#cffafe']
        ];

        $hash = abs(crc32($categoryName));
        $palette = $palettes[$hash % count($palettes)];
        $primary = $palette[0];
        $secondary = $palette[1];
        $accent = $palette[2];
        $soft = $palette[3];
        $safeName = htmlspecialchars($categoryName, ENT_QUOTES, 'UTF-8');
        $safeLabel = htmlspecialchars(strtoupper(substr($categoryName, 0, 1)), ENT_QUOTES, 'UTF-8');

        $svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 360">
            <defs>
                <linearGradient id="bg" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="'.$primary.'" />
                    <stop offset="55%" stop-color="'.$secondary.'" />
                    <stop offset="100%" stop-color="'.$accent.'" />
                </linearGradient>
            </defs>
            <rect width="640" height="360" fill="url(#bg)" />
            <circle cx="530" cy="78" r="88" fill="'.$soft.'" fill-opacity="0.16" />
            <circle cx="120" cy="305" r="120" fill="#ffffff" fill-opacity="0.08" />
            <rect x="42" y="42" width="108" height="108" rx="28" fill="#ffffff" fill-opacity="0.12" stroke="#ffffff" stroke-opacity="0.28" />
            <text x="76" y="114" fill="#ffffff" font-family="Arial, sans-serif" font-size="52" font-weight="700">'.$safeLabel.'</text>
            <text x="48" y="215" fill="#ffffff" font-family="Arial, sans-serif" font-size="42" font-weight="700">'.$safeName.'</text>
            <text x="48" y="258" fill="'.$soft.'" font-family="Arial, sans-serif" font-size="22">Coding Discussions</text>
            <path d="M435 250 L545 250 L515 288 L405 288 Z" fill="#ffffff" fill-opacity="0.1" />
        </svg>';

        return 'data:image/svg+xml;charset=UTF-8,' . rawurlencode($svg);
    }
    ?>

    <!--slider start here 
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x600/?programmer,python" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x600/?programmer,c" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x600/?programmer,javascript" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->
    <!--category start here -->
    <div class="container my-3">
        <div class="contaiter text-center" id="ques">
            <h2>eDiscuss - Browse Categories</h2>
        </div>
        <div class="row my-3">
            <?php
          $sql="SELECT * FROM `categories`";
          $result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
  /*echo $row['category_id'];
  echo $row['category_name'];*/
  $id=$row['category_id'];
  $cat=$row['category_name'];
  $desc=$row['category_desc'];
  $categoryImage = buildCategoryImage($cat);
   echo '<div class="col-md-4 my-3">
                <div class="card" style="width: 18rem;">
                    <img src="'.$categoryImage.'" class="card-img-top" alt="'.$cat.' category image">
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
                        <p class="card-text">'.substr($desc,0,100).'...</p>
                        <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                    </div>
                </div>
            </div>';

  
}

?>




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

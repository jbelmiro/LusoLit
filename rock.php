<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php

//MIT License
//
//Copyright (c) 2022 Jack Acres
//
//Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
//
//The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
//
//THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

include("config.php");

//This passes the geosamples ID to the URL so that the below data is correct and only data pertaining to the sample is grabbed.
$rock_id = $_GET['id'];
//SQL query to get needed data from database
$query = 'SELECT geosamples.name, storage.store_name, geosamples.year, geosamples.researcher, geosamples.latitude, geosamples.longitude, macroscopy.color, macroscopy.fabric, macroscopy.cortex, macroscopy.quality, outcrop.age, outcrop.reference, geoprovenance.description, geoprovenance.state, petrography.texturalclassification, petrography.composition, petrography.othertextural FROM geosamples INNER JOIN storage ON geosamples.storage_id = storage.storage_id INNER JOIN thinsection ON geosamples.thinsection_id = thinsection.thin_id INNER JOIN outcrop on geosamples.outcrop_id = outcrop.id INNER JOIN geoprovenance on geoprovenance.geosamples_id = geosamples.id INNER JOIN macroscopy on macroscopy.geosamples_id = geosamples.id INNER JOIN petrography on petrography.thinsection_id = thinsection.thin_id WHERE geosamples.id = ' . $rock_id;

$result = mysqli_query($conn, $query);
//This turns the data from the database into an array for easy usage below.
$row = mysqli_fetch_array($result, MYSQLI_BOTH);


//Set variables for all the parts of the page. This allows this one template to be used to create all pages.
$rock_file = 'docs/' . $row['name'] . '.pdf';
$petroppl1 = 'img/' . $row['name'] . '_001_PPL.jpg';
$petroxpl1 = 'img/' . $row['name'] . '_001_XPL.jpg';
$petroppl2 = 'img/' . $row['name'] . '_002_PPL.jpg';
$petroxpl2 = 'img/' . $row['name'] . '_002_XPL.jpg';
$petroppl3 = 'img/' . $row['name'] . '_003_PPL.jpg';
$petroxpl3 = 'img/' . $row['name'] . '_003_XPL.jpg';
$petroppl4 = 'img/' . $row['name'] . '_004_PPL.jpg';
$petroxpl4 = 'img/' . $row['name'] . '_004_XPL.jpg';
$petroppl5 = 'img/' . $row['name'] . '_005_PPL.jpg';
$petroxpl5 = 'img/' . $row['name'] . '_005_XPL.jpg';
$petroppl6 = 'img/' . $row['name'] . '_006_PPL.jpg';
$petroxpl6 = 'img/' . $row['name'] . '_006_XPL.jpg';
$petroppl7 = 'img/' . $row['name'] . '_007_PPL.jpg';
$petroxpl7 = 'img/' . $row['name'] . '_007_XPL.jpg';
$petroppl8 = 'img/' . $row['name'] . '_008_PPL.jpg';
$petroxpl8 = 'img/' . $row['name'] . '_008_XPL.jpg';
$petroppl9 = 'img/' . $row['name'] . '_009_PPL.jpg';
$petroxpl9 = 'img/' . $row['name'] . '_009_XPL.jpg';
$petroppl10 = 'img/' . $row['name'] . '_0010_PPL.jpg';
$petroxpl10 = 'img/' . $row['name'] . '_0010_XPL.jpg';

$appearance1 = 'img/' . $row['name'] . '_001.jpg';
$appearance2 = 'img/' . $row['name'] . '_002.jpg';
$appearance3 = 'img/' . $row['name'] . '_003.jpg';
$appearance4 = 'img/' . $row['name'] . '_004.jpg';
$appearance5 = 'img/' . $row['name'] . '_005.jpg';
$appearance6 = 'img/' . $row['name'] . '_006.jpg';
$appearance7 = 'img/' . $row['name'] . '_007.jpg';
$appearance8 = 'img/' . $row['name'] . '_008.jpg';
$appearance9 = 'img/' . $row['name'] . '_009.jpg';
$appearance10 = 'img/' . $row['name'] . '_010.jpg';
$appearance11 = 'img/' . $row['name'] . '_011.jpg';

$outcrop1 = 'img/' . $row['name'] . '_001_O.jpg';
$outcrop2 = 'img/' . $row['name'] . '_002_O.jpg';
$outcrop3 = 'img/' . $row['name'] . '_003_O.jpg';
$outcrop4 = 'img/' . $row['name'] . '_004_O.jpg';
$outcrop5 = 'img/' . $row['name'] . '_005_O.jpg';
$outcrop6 = 'img/' . $row['name'] . '_006_O.jpg';


if (!file_exists($outcrop1)) {
    $outcrop1 = 'img/sugarglider.jpg';

}
?>


<html>
<head>
    <title>Luso Lit</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  <!-- AJAX -->
    <script src="js/bootstrap.js"></script> <!-- JS -->
    <script src="js/modernizr.js"></script> <!-- Modernizr -->
    <link rel="stylesheet" href="css\reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css\style.css"> <!-- Resource style -->
    <link href="css/bootstrap.css" rel="stylesheet"> <!-- Bootstrap -->
    <script
            defer
            src="https://unpkg.com/img-comparison-slider@7/dist/index.js"
    ></script>
    <link
            rel="stylesheet"
            href="https://unpkg.com/img-comparison-slider@7/dist/styles.css"
    />

</head>

<?php include('header.php')?>

<div class="container-fluid  sticky-top">
    <div class="content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="btn btn-primary" style="background-color:#9e0000" href="https://www.lusolit.icarehb.com/list.php"
                   role="button">Go Back</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#description" style="color: black ">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#petrography" style="color: black">Petrography</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#outcrop" style="color: black">Outcrop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#location" style="color: black">Location</a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>


    </div>
</div>
<div class="pt-lg-5">
    <body style="padding-bottom: 75px">

    <div class="container-fluid">
        <div class="content-wrapper">
            <br>
            <div class="container ">

                <p class="h3 navanchor mb-4" style="scroll-margin-top: 2em" id="description">
                    Sample <?php echo $row['name'] ?></p>
                <p class="h6 mb-3" style=" position: relative;right:-30px ">
                    Collection: <?php echo $row['store_name'] ?></p>
                <p class="h6 mb-3" style=" position: relative;right:-30px">Year of
                    Collection: <?php echo $row['year'] ?></p>
                <p class="h6 mb-3" style=" position: relative;right:-30px">Lead
                    Researcher: <?php echo $row['researcher'] ?></p>
                <a class="btn btn-primary mb-5" style=" position: relative;right:-30px; background-color:#9e0000"
                   href="<?php echo $rock_file; ?>" role="button">Download Sample Information</a>


                <p class="h3" style="scroll-margin-top: 2em" id="appearance">Appearance</p>
                <p class="h6 mb-3" style=" position: relative;right:-30px ">Color: <?php echo $row['color'] ?>  </p>
                <p class="h6 mb-3" style=" position: relative;right:-30px">Fabric: <?php echo $row['fabric'] ?></p>
                <p class="h6 mb-3" style=" position: relative;right:-30px">Cortex: <?php echo $row['cortex'] ?></p>
                <p class="h6 mb-3" style=" position: relative;right:-30px">Quality: <?php echo $row['quality'] ?></p>


                <?php if (file_exists($appearance11)) {
                    echo '
                        <div id="carouselExampleControls" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="' . $appearance1 . '" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance2 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance3 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance4 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance5 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                  
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance6 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance7 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                   
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance8 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                   
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance9 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                  
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance10 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                  
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance11 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>';
                } elseif (file_exists($appearance10)) {
                    echo '
        <div id="carouselExampleControls" class="carousel slide" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="' . $appearance1 . '" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance2 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance3 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance4 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance5 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                  
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance6 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance7 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                   
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance8 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                   
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance9 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
               
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance10 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    </div>
                    <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>';
                } elseif (file_exists($appearance9)) {
                    echo '
                    <div id="carouselExampleControls" class="carousel slide" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="' . $appearance1 . '" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance2 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance3 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance4 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance5 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                  
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance6 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                  
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance7 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance8 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance9 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    </div>
                    <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>';
                } elseif (file_exists($appearance8)) {
                    echo '
                    <div id="carouselExampleControls" class="carousel slide" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="' . $appearance1 . '" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance2 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance3 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance4 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance5 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                  
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance6 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
               
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance7 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                 
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance8 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>';
                } elseif (file_exists($appearance7)) {
                    echo '
                    <div id="carouselExampleControls" class="carousel slide" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="' . $appearance1 . '" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance2 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance3 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance4 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance5 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                  
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance6 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
               
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance7 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    </div>
                    <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>';
                } elseif (file_exists($appearance6)) {
                    echo '
<div id="carouselExampleControls" class="carousel slide" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="' . $appearance1 . '" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance2 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance3 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance4 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance5 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                  
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance6 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    </div>
                    <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>';
                } elseif (file_exists($appearance5)) {
                    echo '
                            <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="' . $appearance1 . '" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance2 . '" loading="lazy" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance3 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance4 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance5 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                     
                       
                        </div>
                        </div>
                    <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                            ';
                } elseif (file_exists($appearance4)) {
                    echo '
                            <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="' . $appearance1 . '" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance2 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance3 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance4 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                        </div>
                    <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                ';
                } elseif (file_exists($appearance3)) {
                    echo '
                            <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="' . $appearance1 . '" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance2 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance3 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                        </div>
                    <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                ';
                } elseif (file_exists($appearance2)) {
                    echo '
                            <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="' . $appearance1 . '" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="' . $appearance2 . '" loading="lazy" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        </div>
                    <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                ';
                } elseif (file_exists($appearance1)) {
                    echo '
                            <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="' . $appearance1 . '" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        </div>
                    <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next"  type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                ';
                }

                ?>

                <p class="h3 mt-5" style="scroll-margin-top: 2em" id="petrography">Petrography</p>
                <p class="h6 mb-3" style=" position: relative;right:-30px ">Textural
                    classification: <?php echo $row['texturalclassification'] ?></p>
                <p class="h6 mb-3" style=" position: relative;right:-30px">
                    Composition: <?php echo $row['composition'] ?></p>
                <p class="h6 mb-3" style=" position: relative;right:-30px">Other textural
                    characteristics: <?php echo $row['othertextural'] ?></p>


                <?php

                if (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5) && file_exists($petroppl6) && file_exists($petroppl7) && file_exists($petroppl8) && file_exists($petroppl9) && file_exists($petroppl10)) {

                    echo '
                            
                            <div id="carouselIndicator2" class="carousel carousel-dark slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" ">
                        <figure class="cd-image-container">
                            <img-comparison-slider>
                                <img slot="first" loading="lazy" width="100%" src="' . $petroppl1 . '">
                                <img slot="second" loading="lazy" width="100%" src="' . $petroxpl1 . '">
                                <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                    <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                </svg>
                            </img-comparison-slider>
                        </figure>
                            
                            <div class="carousel-caption d-none d-md-block">
                        
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="' . $petroppl2 . '">
                            <p>Test</p>
                            <img slot="second" width="100%" src="' . $petroxpl2 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl3 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl3 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl4 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl4 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl5 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl5 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl6 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl6 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl7 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl7 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl8 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl8 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl9 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl9 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl10 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl10 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                        </div>
            <button class="carousel-control-prev"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
                            
                            
                            ';
                } elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5) && file_exists($petroppl6) && file_exists($petroppl7) && file_exists($petroppl8) && file_exists($petroppl9)) {

                    echo '
                            
                            <div id="carouselIndicator2" class="carousel carousel-dark slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" ">
                        <figure class="cd-image-container">
                            <img-comparison-slider>
                                <img slot="first" loading="lazy" width="100%" src="' . $petroppl1 . '">
                                <img slot="second" loading="lazy" width="100%" src="' . $petroxpl1 . '">
                                <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                    <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                </svg>
                            </img-comparison-slider>
                        </figure>       
                    </div>
                     <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl2 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl2 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl3 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl3 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl4 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl4 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl5 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl5 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl6 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl6 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl7 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl7 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl8 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl8 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl9 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl9 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                
                        </div>
            <button class="carousel-control-prev"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
                ';

                } elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5) && file_exists($petroppl6) && file_exists($petroppl7) && file_exists($petroppl8)) {

                    echo '

<div id="carouselIndicator2" class="carousel carousel-dark slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" ">
                        <figure class="cd-image-container">
                            <img-comparison-slider>
                                <img slot="first" loading="lazy" width="100%" src="' . $petroppl1 . '">
                                <img slot="second" loading="lazy" width="100%" src="' . $petroxpl1 . '">
                                <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                    <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                </svg>
                            </img-comparison-slider>
                        </figure>

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl2 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl2 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl3 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl3 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl4 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl4 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl5 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl5 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl6 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl6 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl7 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl7 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl8 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl8 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                
                                    </div>
            <button class="carousel-control-prev"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
                            
                            ';
                } elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5) && file_exists($petroppl6) && file_exists($petroppl7)) {

                    echo '

<div id="carouselIndicator2" class="carousel carousel-dark slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" ">
                        <figure class="cd-image-container">
                            <img-comparison-slider>
                                <img slot="first" loading="lazy" width="100%" src="' . $petroppl1 . '">
                                <img slot="second" loading="lazy" width="100%" src="' . $petroxpl1 . '">
                                <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                    <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                </svg>
                            </img-comparison-slider>
                        </figure>

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl2 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl2 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl3 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl3 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl4 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl4 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl5 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl5 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl6 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl6 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl7 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl7 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                
                        </div>
            <button class="carousel-control-prev"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
                            
                            
                            ';
                } elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5) && file_exists($petroppl6)) {

                    echo '

<div id="carouselIndicator2" class="carousel carousel-dark slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" ">
                        <figure class="cd-image-container">
                            <img-comparison-slider>
                                <img slot="first" loading="lazy" width="100%" src="' . $petroppl1 . '">
                                <img slot="second" loading="lazy" width="100%" src="' . $petroxpl1 . '">
                                <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                    <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                </svg>
                            </img-comparison-slider>
                        </figure>

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl2 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl2 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl3 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl3 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl4 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl4 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl5 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl5 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl6 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl6 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                
                        </div>
            <button class="carousel-control-prev"   type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
                            ';
                } elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5)) {

                    echo '

<div id="carouselIndicator2" class="carousel carousel-dark slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" ">
                        <figure class="cd-image-container">
                            <img-comparison-slider>
                                <img slot="first" loading="lazy" width="100%" src="' . $petroppl1 . '">
                                <img slot="second" loading="lazy" width="100%" src="' . $petroxpl1 . '">
                                <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                    <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                </svg>
                            </img-comparison-slider>
                        </figure>

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl2 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl2 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl3 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl3 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl4 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl4 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl5 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl5 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                        </div>
            <button class="carousel-control-prev"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
                        
                            ';
                } elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4)) {

                    echo '

<div id="carouselIndicator2" class="carousel carousel-dark slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" ">
                        <figure class="cd-image-container">
                            <img-comparison-slider>
                                <img slot="first" loading="lazy" width="100%" src="' . $petroppl1 . '">
                                <img slot="second" loading="lazy" width="100%" src="' . $petroxpl1 . '">
                                <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                    <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                </svg>
                            </img-comparison-slider>
                        </figure>

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl2 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl2 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl3 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl3 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl4 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl4 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                                    </div>
            <button class="carousel-control-prev"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
                        
                
                            
        
                            ';
                } elseif (file_exists($petroppl2) && file_exists($petroppl3)) {

                    echo '

<div id="carouselIndicator2" class="carousel carousel-dark slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" ">
                        <figure class="cd-image-container">
                            <img-comparison-slider>
                                <img slot="first" loading="lazy" width="100%" src="' . $petroppl1 . '">
                                <img slot="second" loading="lazy" width="100%" src="' . $petroxpl1 . '">
                                <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                    <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                </svg>
                            </img-comparison-slider>
                        </figure>

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl2 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl2 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl3 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl3 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            
                                    </div>
            <button class="carousel-control-prev"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
                
                            
                           
                            ';
                } elseif (file_exists($petroppl2)) {

                    echo '

<div id="carouselIndicator2" class="carousel carousel-dark slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" ">
                        <figure class="cd-image-container">
                            <img-comparison-slider>
                                <img slot="first" loading="lazy" width="100%" src="' . $petroppl1 . '">
                                <img slot="second" loading="lazy" width="100%" src="' . $petroxpl1 . '">
                                <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                    <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                </svg>
                            </img-comparison-slider>
                        </figure>

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" loading="lazy" width="100%" src="' . $petroppl2 . '">
                            <img slot="second" loading="lazy" width="100%" src="' . $petroxpl2 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 
            <button class="carousel-control-prev"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
                
                            
                           
                            ';
                } elseif (file_exists($petroppl1)) {

                    echo '

<div id="carouselIndicator2" class="carousel carousel-dark slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" ">
                        <figure class="cd-image-container">
                            <img-comparison-slider>
                                <img slot="first" loading="lazy" width="100%" src="' . $petroppl1 . '">
                                <img slot="second" loading="lazy" width="100%" src="' . $petroxpl1 . '">
                                <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                    <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                </svg>
                            </img-comparison-slider>
                        </figure>

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                 
            <button class="carousel-control-prev"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
                
                            
                           
                            ';
                }
                ?>


                <div class="mt-4">

                    <p class="h3 mt-5" style="scroll-margin-top: 2em" id="outcrop">Outcrop</p>
                    <p class="h6 mb-3" style=" position: relative;right:-30px ">State: <?php echo $row['state'] ?></p>
                    <p class="h6 mb-3" style=" position: relative;right:-30px">Age: <?php echo $row['age'] ?></p>
                    <p class="h6 mb-3" style=" position: relative;right:-30px">
                        Description: <?php echo $row['description'] ?></p>


                    <?php if (file_exists($outcrop6)) {
                        echo '
        <div id="carouselControlsOutcrop" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop1 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop2 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop3 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop4 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop5 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop6 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


';
                    } elseif (file_exists($outcrop5)) {
                        echo '
        <div id="carouselControlsOutcrop" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop1 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop2 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop3 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop4 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop5 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


';
                    } elseif (file_exists($outcrop4)) {
                        echo '
        <div id="carouselControlsOutcrop" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop1 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop2 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop3 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop4 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
          </div>
            <button class="carousel-control-prev"  type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


';
                    } elseif (file_exists($outcrop3)) {
                        echo '
        <div id="carouselControlsOutcrop" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop1 . '" loading="lazy" class="d-block" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop2 . '" loading="lazy" class="d-block " alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop3 . '" loading="lazy" class="d-block " alt="...">
                    </figure>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
               
            </button>
        </div>


    
';
                    } elseif (file_exists($outcrop2)) {
                        echo '
        <div id="carouselControlsOutcrop" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop1 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
                <div class="carousel-item">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop2 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

  
';
                    } elseif (file_exists($outcrop1)) {
                        echo '
        <div id="carouselControlsOutcrop" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <figure class="cd-image-container">
                        <img src="' . $outcrop1 . '" loading="lazy" class="d-block w-100" alt="...">
                    </figure>
                </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"  type="button" data-bs-target="#carouselControlsOutcrop" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

';
                    }
                    ?>
                    <p class="h3 mt-5" id="location">Location</p>
                    <p class="h6 mb-4" style=" position: relative;right:-30px ">
                        Coordinates: <?php echo $row['latitude'] ?>+<?php echo $row['longitude'] ?></p>
                    <p align="center">
                        <iframe style="display:block"
                                width=75%
                                height="50%"
                                frameborder="0"
                                scrolling="no"
                                marginheight="0"
                                marginwidth="0"
                                src="https://maps.google.com/maps?q=<?php echo $row['latitude'] ?>+<?php echo $row['longitude'] ?>&hl=en&z=18&amp;output=embed"
                        >
                        </iframe>
                        <br/>
                    </p>

                </div>
            </div>
        </div>


        <div class="mt-8">


        </div>
    </div>

</div>
</body>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script> <!-- Resource jQuery -->
<script src="js/main.js"></script> <!-- Resource jQuery -->

<?php include('footer.php')?>

</html>
       <div class="col-lg-6">
<div class="card" style="width: 24rem;">
  <img src="<?php echo $row[3] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  </div>
    </div>    
  </div>

  <p class="lead alert alert-dark" role="alert"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum orci nibh. Nam ullamcorper, nisi eu consequat porttitor, eros elit consequat elit, non egestas orci urna ac mauris. Sed vehicula non nunc efficitur mollis. Aenean in faucibus turpis, non consequat ante. Cras nec dolor turpis. Aenean velit nisi, placerat eget rhoncus eu, porttitor id purus. Aliquam massa sapien, euismod a efficitur eu, semper ac enim. Ut odio mi, posuere quis magna a, malesuada consequat ante. Integer tincidunt ultrices lectus, non gravida elit feugiat quis. Donec molestie orci est, eu vehicula purus tristique nec. Cras et consequat arcu. Morbi a rutrum sapien. Mauris eget lorem aliquet, hendrerit risus id, consequat enim.</p>
    
</div>
</div>


$tempresult = mysqli_query($conn,$temp);
if (!$tempresult) {
  echo "feck";
  exit;
}

$temprow = mysqli_fetch_row($tempresult);

$query = "SELECT * FROM rocks
  WHERE Rock  LIKE '%".$search."%'
  OR Taste LIKE '%".$search."%' 
  OR Look LIKE '%".$search."%' 
  OR Emotion LIKE '%".$search."%' 
  ";}

    $search = mysqli_real_escape_string($conn, $_POST["query"]);
  
  $query = "SELECT geosamples.*, storage.* FROM geosamples
    INNER JOIN storage
    on geosamples.storage_id = storage.storage.id 
    WHERE latitude LIKE '%".$search."%'
    OR name LIKE '%".$search."%'
    OR researcher LIKE '%".$search."%'
    OR city LIKE '%".$search."%'

   
  ";}
else
{
  $query = "SELECT geosamples.*, storage.* FROM geosamples
    INNER JOIN storage";
}
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
  $return .='
  <div class="table-responsive">
  <table class="table table-stripe">
  <thead>
  <tr>
    <th scope="col">Rock</th>
    <th scope="col">Taste</th>
    <th scope="col">Look</th>
    <th scope="col">Emotion</th>
  </thead>
  </tr>';
  while($row1 = mysqli_fetch_array($result))
  {
    $return .= '
    <tr>
    <td><a href="rock.php?id=' . $row1['id'] . '">' . $row1['name'] . '</a></td>
    <td>'.$row1["longitude"].'</td>
    <td>'.$row1["year"].'</td>
    <td>'.$row1["location"].'</td>
    <td>'.$row1["city"].'</td>

    </tr>';
    print_r($row1);
  }
  echo $return;
  }
else
{
  echo 'No results containing all your search terms were found.';
}
?>



      <html>
      <head>
          <title>Astro's Rock Collection</title>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="js\bootstrap.js"></script>
          <script src="js\modernizr.js"></script> <!-- Modernizr -->
          <link rel="stylesheet" href="css\reset.css"> <!-- CSS reset -->
          <link rel="stylesheet" href="css\style.css"> <!-- Resource style -->
          <link href="css\bootstrap.css" rel="stylesheet">

      </head>
      <div class="container-fluid">
          <div class="content-wrapper">
              <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                  <div class="container">
                      <a class="btn btn-primary" href="https://rock.nebulatech.co.uk" role="button">Go Back</a>
                      <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav">
                              <li class="nav-item">
                                  <a class="nav-link" href="#description" style="color: black " >Description</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#petrography" style="color: black" >Petrography</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#outcrop" style="color: black" >Outcrop</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link "href="#location" style="color: black" >Location</a>
                              </li>
                          </ul>
                      </div>
                  </div>

              </nav>

              </nav>
          </div>
          #





          <meta name="viewport" content="width=device-width, initial-scale=1.0">

          <?php

          include("config.php");

          $rock_id = $_GET['id'];

          $query = 'SELECT geosamples.name, storage.store_name, geosamples.year, geosamples.researcher, geosamples.latitude, geosamples.longitude, macroscopy.color, macroscopy.fabric, macroscopy.cortex, macroscopy.quality, outcrop.age, outcrop.reference, geoprovenance.description, geoprovenance.state, petrography.texturalclassification, petrography.composition, petrography.othertextural  FROM geosamples INNER JOIN storage ON geosamples.storage_id = storage.storage_id INNER JOIN thinsection ON geosamples.thinsection_id = thinsection.thin_id INNER JOIN outcrop on geosamples.outcrop_id = outcrop.id INNER JOIN geoprovenance on geoprovenance.geosamples_id = geosamples.id INNER JOIN macroscopy on macroscopy.geosamples_id = geosamples.id INNER JOIN petrography on petrography.thinsection_id = thinsection.thin_id WHERE geosamples.id = ' . $rock_id;

          $result = mysqli_query($conn, $query);
          if (!$result) {
              echo 'Could not run query: ' . mysqli_error();
              exit;
          }

          $row = mysqli_fetch_array($result,MYSQLI_BOTH);

          $rock_file = 'docs/' .$row['name'] . '.pdf';
          $petroppl1 = 'img/' .$row['name']. '_001_PPL.png';
          $petroxpl1 = 'img/' .$row['name']. '_001_XPL.png';
          ?>


          <html>
          <head>
              <title>Astro's Rock Collection</title>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  <!-- AJAX -->
              <script src="js\bootstrap.js"></script> <!-- JS -->
              <script src="js\modernizr.js"></script> <!-- Modernizr -->
              <link rel="stylesheet" href="css\reset.css"> <!-- CSS reset -->
              <link rel="stylesheet" href="css\style.css"> <!-- Resource style -->
              <link href="css\bootstrap.css" rel="stylesheet"> <!-- Bootstrap -->
              <script
                      defer
                      src="https://unpkg.com/img-comparison-slider@7/dist/index.js"
              ></script>
              <link
                      rel="stylesheet"
                      href="https://unpkg.com/img-comparison-slider@7/dist/styles.css"
              />

          </head>
          <div class="container-fluid">
              <div class="content-wrapper">
                  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                      <div class="container">
                          <a class="btn btn-primary" style="background-color:#9e0000"  href="https://rock.nebulatech.co.uk" role="button">Go Back</a>
                          <div class="collapse navbar-collapse" id="navbarNav">
                              <ul class="navbar-nav">
                                  <li class="nav-item">
                                      <a class="nav-link" href="#description" style="color: black " >Description</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#petrography" style="color: black" >Petrography</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#outcrop" style="color: black" >Outcrop</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link "href="#location" style="color: black" >Location</a>
                                  </li>
                              </ul>
                          </div>
                      </div>

                  </nav>

                  </nav>
              </div>
          </div>




          <div class="mt-4">
              <body style="padding-bottom: 50px">
              <div class="container-fluid">
                  <div class="content-wrapper">
                      <div class="container">

                          <p class="h3 navanchor mb-4" style="scroll-margin-top: 2em" id="description"> Sample <?php echo $row['name'] ?></p>
                          <p class="h6 mb-3" style=" position: relative;right:-30px ">Collection: <?php echo $row['store_name'] ?></p>
                          <p class="h6 mb-3" style=" position: relative;right:-30px">Year of Collection: <?php echo $row['year'] ?></p>
                          <p class="h6 mb-3" style=" position: relative;right:-30px">Lead Researcher: <?php echo $row['researcher'] ?></p>
                          <a class="btn btn-primary mb-5" style=" position: relative;right:-30px; background-color:#9e0000" href="<?php echo $rock_file; ?>" role="button">Download Sample Information</a>



                          <p class="h3" style="scroll-margin-top: 2em" id="appearance">Appearance</p>
                          <p class="h6 mb-3" style=" position: relative;right:-30px ">Colour: <?php echo $row['color'] ?>  </p>
                          <p class="h6 mb-3" style=" position: relative;right:-30px">Fabric: <?php echo $row['fabric'] ?></p>
                          <p class="h6 mb-3" style=" position: relative;right:-30px">Cortex: <?php echo $row['cortex'] ?></p>
                          <p class="h6 mb-3" style=" position: relative;right:-30px">Quality: <?php echo $row['quality'] ?></p>

                          <div class="item mt-2">
                              <figure class="cd-image-container">
                                  <img src="img\SP36_005_CPL.avif" alt="Original Image">
                                  <span class="cd-image-label" data-type="original"></span>

                                  <div class="cd-resize-img"> <!-- the resizable image on top -->
                                      <img src="img\SP36_005_PPL.avif" alt="Modified Image">
                                      <span class="cd-image-label" data-type="modified"></span>
                                  </div>
                                  <span class="cd-handle"></span>
                              </figure>
                          </div>


                          <p class="h3 mt-5" style="scroll-margin-top: 2em" id="petrography">Petrography</p>
                          <p class="h6 mb-3" style=" position: relative;right:-30px ">Textural classification: <?php echo $row['texturalclassification'] ?></p>
                          <p class="h6 mb-3" style=" position: relative;right:-30px">Composition: <?php echo $row['composition'] ?></p>
                          <p class="h6 mb-3" style=" position: relative;right:-30px">Other textural characteristics: <?php echo $row['othertextural'] ?></p>

                          <div id="carouselIndicator2" class="carousel carousel-dark slide" data-interval="false">
                              <div class="carousel-indicators">
                                  <button type="button" data-bs-target="#carouselIndicator2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                  <button type="button" data-bs-target="#carouselIndicator2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                  <button type="button" data-bs-target="#carouselIndicator2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                              </div>
                              <div class="carousel-inner">
                                  <div class="carousel-item active" ">
                                  <figure class="cd-image-container">
                                      <img-comparison-slider>
                                          <img slot="first" width="100%" src="img\SP36_005_CPL.avif">
                                          <img slot="second" width="100%" src="img\SP36_005_PPL.avif">
                                          <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                              <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                          </svg>
                                      </img-comparison-slider>
                                  </figure>
                                  <div class="carousel-caption d-none d-md-block">
                                      <h6>Second slide label</h6>
                                      <p>Some representative placeholder content for the second slide.</p>
                                  </div>
                              </div>
                              <div class="carousel-item" ">
                              <figure class="cd-image-container">
                                  <img-comparison-slider>
                                      <img slot="first" width="100%" src="img\SP36_005_CPL.avif">
                                      <img slot="second" width="100%" src="img\SP36_005_PPL.avif">
                                      <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                          <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                      </svg>
                                  </img-comparison-slider>
                              </figure>
                          </div>
                          <div class="carousel-item" ">
                          <figure class="cd-image-container">
                              <img-comparison-slider>
                                  <img slot="first" width="100%" src="img\SP36_005_CPL.avif">
                                  <img slot="second" width="100%" src="img\SP36_005_PPL.avif">
                                  <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                      <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                  </svg>
                              </img-comparison-slider>
                          </figure>
                      </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                  </button>
              </div>


              <div class="mt-4">

                  <p class="h3 mt-5" style="scroll-margin-top: 2em" id="outcrop">Outcrop</p>
                  <p class="h6 mb-3" style=" position: relative;right:-30px ">State: <?php echo $row['state'] ?></p>
                  <p class="h6 mb-3" style=" position: relative;right:-30px">Age: <?php echo $row['age'] ?></p>
                  <p class="h6 mb-3" style=" position: relative;right:-30px">Reference: <?php echo $row['reference'] ?></p>
                  <p class="h6 mb-3" style=" position: relative;right:-30px">Description: <?php echo $row['description'] ?></p>

                  <div id="carouselIndicator3" class="carousel carousel-dark slide" data-interval="false">
                      <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselIndicator3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselIndicator3" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselIndicator3" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner">
                          <div class="carousel-item active" ">
                          <figure class="cd-image-container">
                              <img src="img\SP36_005_CPL.avif">
                          </figure>
                          <div class="carousel-caption d-none d-md-block">
                              <h6>Second slide label</h6>
                              <p>Some representative placeholder content for the second slide.</p>
                          </div>
                      </div>
                      <div class="carousel-item" ">
                      <figure class="cd-image-container">
                          <img src="img\SP36_005_CPL.avif">
                      </figure>
                  </div>
                  <div class="carousel-item" ">
                  <figure class="cd-image-container">
                      <img src="img\SP36_005_CPL.avif">
                  </figure>
              </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicator3" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicator3" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>

      </div>

      <p class="h3 mt-5" id="location">Location</p>
      <p class="h6 mb-4" style=" position: relative;right:-30px ">Coordinates: <?php echo $row['latitude']?>+<?php echo $row['longitude']?></p>
      <p align="center"><iframe style="display:block"
                                width = 75%
                                height="50%"
                                frameborder="0"
                                scrolling="no"
                                marginheight="0"
                                marginwidth="0"
                                src="https://maps.google.com/maps?q=<?php echo $row['latitude']?>+<?php echo $row['longitude']?>&hl=en&z=18&amp;output=embed"
          >
          </iframe>
          <br />
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

       <div class="container">
           <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
               <div class="col-md-4 d-flex align-items-center">
                   <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                       <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                   </a>
                   <span class="text-muted">© 2022 Astro Website Design </span>
               </div>

               <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                   <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                   <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                   <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
               </ul>
           </footer>
       </div>
       </html>









       <?php if(file_exists($appearance6)){
           echo '
                        <div id="carouselExampleControls" class="carousel slide" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="'.$appearance1.'" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance2.'" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance3.'" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance4.'" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance5.'" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                  
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance6.'" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    </div>
                    <button class="carousel-control-prev" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>';
       } elseif (file_exists($appearance5)){
           echo '
                            <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="'.$appearance1.'" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance2.'" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance3.'" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance4.'" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance5.'" class="d-block w-100" alt="...">
                            </figure>
                     
                       
                        </div>
                        </div>
                    <button class="carousel-control-prev" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                            ';
       }elseif (file_exists($appearance4)){
           echo '
                            <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="'.$appearance1.'" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance2.'" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance3.'" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                    
                    <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance4.'" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                        </div>
                    <button class="carousel-control-prev" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                ';}elseif (file_exists($appearance3)){
           echo '
                            <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="'.$appearance1.'" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance2.'" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance3.'" class="d-block w-100" alt="...">
                            </figure>
                        </div>
                        </div>
                    <button class="carousel-control-prev" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                ';}elseif (file_exists($appearance2)){
           echo '
                            <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="'.$appearance1.'" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        <div class="carousel-item">
                            <figure class="cd-image-container">
                            <img src="'.$appearance2.'" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        </div>
                    <button class="carousel-control-prev" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                ';}elseif (file_exists($appearance1)){
           echo '
                            <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="cd-image-container">
                            <img src="'.$appearance1.'" class="d-block w-100" alt="...">
                            </figure>
                            </div>
                        </div>
                    <button class="carousel-control-prev" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                ';}

       ?>

       <p class="h3 mt-5" style="scroll-margin-top: 2em" id="petrography">Petrography</p>
       <p class="h6 mb-3" style=" position: relative;right:-30px ">Textural classification: <?php echo $row['texturalclassification'] ?></p>
       <p class="h6 mb-3" style=" position: relative;right:-30px">Composition: <?php echo $row['composition'] ?></p>
       <p class="h6 mb-3" style=" position: relative;right:-30px">Other textural characteristics: <?php echo $row['othertextural'] ?></p>

       <div id="carouselIndicator2" class="carousel carousel-dark slide" data-mdb-ride="carousel" data-mdb-interval="false">
           <div class="carousel-inner">
               <div class="carousel-item active" ">
               <figure class="cd-image-container">
                   <img-comparison-slider>
                       <img slot="first" width="100%" src="<?php echo $petroppl1 ?>">
                       <img slot="second" width="100%" src="<?php echo $petroxpl1 ?>">
                       <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                           <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                       </svg>
                   </img-comparison-slider>
               </figure>

               <?php

               if (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5) && file_exists($petroppl6) && file_exists($petroppl7) && file_exists($petroppl8) && file_exists($petroppl9) && file_exists($petroppl9) && file_exists($petroppl10)) {

                   echo '
                            
                            <div class="carousel-caption d-none d-md-block">
                        
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl2.'">
                            <p>Test</p>
                            <img slot="second" width="100%" src="'.$petroxpl2.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl3.'">
                            <img slot="second" width="100%" src="'.$petroxpl3.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl4.'">
                            <img slot="second" width="100%" src="'.$petroxpl4.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl5.'">
                            <img slot="second" width="100%" src="'.$petroxpl5.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl6.'">
                            <img slot="second" width="100%" src="'.$petroxpl6.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl7.'">
                            <img slot="second" width="100%" src="'.$petroxpl7.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl8.'">
                            <img slot="second" width="100%" src="'.$petroxpl8.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl9.'">
                            <img slot="second" width="100%" src="'.$petroxpl9.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl10.'">
                            <img slot="second" width="100%" src="'.$petroxpl10.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                
                            
                            
                            ';
               } elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5) && file_exists($petroppl6) && file_exists($petroppl7) && file_exists($petroppl8) && file_exists($petroppl9))
               {

                   echo '
                            
                            <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                        <figure>
                            <img slot="first" width="100%" src="'.$petroppl2.'">
                            <figcaption>Fig.1 - Trulli, Puglia, Italy.</figcaption>
                            </figure>
                            <img slot="second" width="100%" src="'.$petroxpl2.'">
                            <div><h1>iuhwerhuwehriuwheriuh</h1></div>
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl3.'">
                            <img slot="second" width="100%" src="'.$petroxpl3.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl4.'">
                            <img slot="second" width="100%" src="'.$petroxpl4.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl5.'">
                            <img slot="second" width="100%" src="'.$petroxpl5.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl6.'">
                            <img slot="second" width="100%" src="'.$petroxpl6.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl7.'">
                            <img slot="second" width="100%" src="'.$petroxpl7.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl8.'">
                            <img slot="second" width="100%" src="'.$petroxpl8.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl9.'">
                            <img slot="second" width="100%" src="'.$petroxpl9.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                ';

               } elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5) && file_exists($petroppl6) && file_exists($petroppl7) && file_exists($petroppl8))
               {

                   echo '

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl2.'">
                            <img slot="second" width="100%" src="'.$petroxpl2.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl3.'">
                            <img slot="second" width="100%" src="'.$petroxpl3.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl4.'">
                            <img slot="second" width="100%" src="'.$petroxpl4.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl5.'">
                            <img slot="second" width="100%" src="'.$petroxpl5.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl6.'">
                            <img slot="second" width="100%" src="'.$petroxpl6.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl7.'">
                            <img slot="second" width="100%" src="'.$petroxpl7.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl8.'">
                            <img slot="second" width="100%" src="'.$petroxpl8.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                
                            
                            
                            ';
               } elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5) && file_exists($petroppl6) && file_exists($petroppl7)) {

                   echo '

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="' . $petroppl2 . '">
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
                            <img slot="first" width="100%" src="' . $petroppl3 . '">
                            <img slot="second" width="100%" src="' . $petroxpl3 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="' . $petroppl4 . '">
                            <img slot="second" width="100%" src="' . $petroxpl4 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="' . $petroppl5 . '">
                            <img slot="second" width="100%" src="' . $petroxpl5 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="' . $petroppl6 . '">
                            <img slot="second" width="100%" src="' . $petroxpl6 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="' . $petroppl7 . '">
                            <img slot="second" width="100%" src="' . $petroxpl7 . '">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                
                            
                            
                            ';
               }elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5) && file_exists($petroppl6))
               {

                   echo '

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl2.'">
                            <img slot="second" width="100%" src="'.$petroxpl2.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl3.'">
                            <img slot="second" width="100%" src="'.$petroxpl3.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl4.'">
                            <img slot="second" width="100%" src="'.$petroxpl4.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl5.'">
                            <img slot="second" width="100%" src="'.$petroxpl5.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl6.'">
                            <img slot="second" width="100%" src="'.$petroxpl6.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                            ';}elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4) && file_exists($petroppl5))
               {

                   echo '

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl2.'">
                            <img slot="second" width="100%" src="'.$petroxpl2.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl3.'">
                            <img slot="second" width="100%" src="'.$petroxpl3.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl4.'">
                            <img slot="second" width="100%" src="'.$petroxpl4.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl5.'">
                            <img slot="second" width="100%" src="'.$petroxpl5.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                        
                            ';} elseif (file_exists($petroppl2) && file_exists($petroppl3) && file_exists($petroppl4))
               {

                   echo '

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl2.'">
                            <img slot="second" width="100%" src="'.$petroxpl2.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl3.'">
                            <img slot="second" width="100%" src="'.$petroxpl3.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl4.'">
                            <img slot="second" width="100%" src="'.$petroxpl4.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        
                
                            
        
                            ';}elseif (file_exists($petroppl2) && file_exists($petroppl3))
               {

                   echo '

                                <div class="carousel-caption d-none d-md-block">
                            
                        </div>
                    </div>
                    <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl2.'">
                            <img slot="second" width="100%" src="'.$petroxpl2.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            </svg>
                        </img-comparison-slider>
                    </figure>
                </div>
                 <div class="carousel-item" ">
                    <figure class="cd-image-container">
                        <img-comparison-slider>
                            <img slot="first" width="100%" src="'.$petroppl3.'">
                            <img slot="second" width="100%" src="'.$petroxpl3.'">
                            <svg slot="handle" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                            
                
                            
                           
                            ';}
               ?>

           </div>
           <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicator2" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
           </button>
           <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicator2" data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
           </button>
       </div>
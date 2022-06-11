<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php

include("config.php");

$rock_id = $_GET['id'];

$query = 'SELECT * FROM geosamples WHERE id = ' . $rock_id;

$result = mysqli_query($conn, "SELECT * FROM geosamples WHERE id = $rock_id");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysqli_fetch_row($result);

?>


<html>
<head>
	<title>Astro's Rock Collection</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
</div>

<div class="mt-4">
<body style="padding-bottom: 50px">
<<div class="container-fluid">       
<div class="content-wrapper">
  <div class="container">
    <p class="display-3">Astro's Rock Collection 

    <p class="h3 navanchor" style="scroll-margin-top: 2em" id="description">Description</p>
    <p class="h5" style=" position: relative;right:-30px">Macroscopic Description</p>
    <p class="lead alert alert-dark" role="alert""> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum orci nibh. Nam ullamcorper, nisi eu consequat porttitor, eros elit consequat elit, non egestas orci urna ac mauris. Sed vehicula non nunc efficitur mollis. Aenean in faucibus turpis, non consequat ante. Cras nec dolor turpis. Aenean velit nisi, placerat eget rhoncus eu, porttitor id purus. Aliquam massa sapien, euismod a efficitur eu, semper ac enim. Ut odio mi, posuere quis magna a, malesuada consequat ante. Integer tincidunt ultrices lectus, non gravida elit feugiat quis. Donec molestie orci est, eu vehicula purus tristique nec. Cras et consequat arcu. Morbi a rutrum sapien. Mauris eget lorem aliquet, hendrerit risus id, consequat enim</p>
   

    <div class="item">
      <figure class="cd-image-container">
    <img src="img\SP36_005_CPL" alt="Original Image">
    <span class="cd-image-label" data-type="original"></span>
    </figure>
    </div> 


    
<p class="h3" style="scroll-margin-top: 2em" id="petrography">Petrography</p>
    <p class="h5" style=" position: relative;right:-30px">Description</p>
    <p class="lead alert alert-dark" role="alert""> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum orci nibh. Nam ullamcorper, nisi eu consequat porttitor, eros elit consequat elit, non egestas orci urna ac mauris. Sed vehicula non nunc efficitur mollis. Aenean in faucibus turpis, non consequat ante. Cras nec dolor turpis. Aenean velit nisi, placerat eget rhoncus eu, porttitor id purus. Aliquam massa sapien, euismod a efficitur eu, semper ac enim. Ut odio mi, posuere quis magna a, malesuada consequat ante. Integer tincidunt ultrices lectus, non gravida elit feugiat quis. Donec molestie orci est, eu vehicula purus tristique nec. Cras et consequat arcu. Morbi a rutrum sapien. Mauris eget lorem aliquet, hendrerit risus id, consequat enim</p>
  
<div class="item">
      <figure class="cd-image-container">
    <img src="img\SP36_005_CPL" alt="Original Image">
    <span class="cd-image-label" data-type="original"></span>

    <div class="cd-resize-img"> <!-- the resizable image on top -->
      <img src="img\SP36_005_PPL" alt="Modified Image">
      <span class="cd-image-label" data-type="modified"></span>
    </div>
    <span class="cd-handle"></span>
  </figure> 
    </div>
  
    <div class="mt-4">

<p class="h3" style="scroll-margin-top: 2em" id="outcrop">Outcrop</p>
    <p class="h5" style=" position: relative;right:-30px">Description</p>
    <p class="lead alert alert-dark" role="alert""> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum orci nibh. Nam ullamcorper, nisi eu consequat porttitor, eros elit consequat elit, non egestas orci urna ac mauris. Sed vehicula non nunc efficitur mollis. Aenean in faucibus turpis, non consequat ante. Cras nec dolor turpis. Aenean velit nisi, placerat eget rhoncus eu, porttitor id purus. Aliquam massa sapien, euismod a efficitur eu, semper ac enim. Ut odio mi, posuere quis magna a, malesuada consequat ante. Integer tincidunt ultrices lectus, non gravida elit feugiat quis. Donec molestie orci est, eu vehicula purus tristique nec. Cras et consequat arcu. Morbi a rutrum sapien. Mauris eget lorem aliquet, hendrerit risus id, consequat enim</p>

<div class="item">
      <figure class="cd-image-container">
    <img src="img\SP36_005_CPL" alt="Original Image">
    <span class="cd-image-label" data-type="original"></span>
    </figure>
    </div> 

  <p class="lead alert alert-dark" role="alert"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum orci nibh. Nam ullamcorper, nisi eu consequat porttitor, eros elit consequat elit, non egestas orci urna ac mauris. Sed vehicula non nunc efficitur mollis. Aenean in faucibus turpis, non consequat ante. Cras nec dolor turpis. Aenean velit nisi, placerat eget rhoncus eu, porttitor id purus. Aliquam massa sapien, euismod a efficitur eu, semper ac enim. Ut odio mi, posuere quis magna a, malesuada consequat ante. Integer tincidunt ultrices lectus, non gravida elit feugiat quis. Donec molestie orci est, eu vehicula purus tristique nec. Cras et consequat arcu. Morbi a rutrum sapien. Mauris eget lorem aliquet, hendrerit risus id, consequat enim.</p>
 
<p class="h3" id="location">Location</p>

<div class="mapouter"><div class="gmap_canvas"><iframe width="900" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=bishops%20stortford&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br><style>.mapouter{position:relative; right: -380;text-align:right;height:500px;width:900px;}</style><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
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
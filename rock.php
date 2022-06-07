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
<body>
<<div class="container-fluid">       
<div class="content-wrapper">
  <div class="container">
    <p class="display-3">Astro's Rock Collection   <button type="button" class="btn btn-secondary" style="position:relative; left:-750px" onclick="history.back()">Go Back</button></p>

    <p class="h3"><?php echo $row[1] ?></p>
    <p class="lead"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at augue. Mi proin sed libero enim sed faucibus turpis in.</p>
   
    <figure class="cd-image-container">
    <img src="<?php echo $row[3] ?>" alt="Original Image">
    <span class="cd-image-label" data-type="original"></span>

    <div class="cd-resize-img"> <!-- the resizable image on top -->
      <img src="<?php echo $row[4] ?>" alt="Modified Image">
      <span class="cd-image-label" data-type="modified"></span>
    </div>
    <span class="cd-handle"></span>
  </figure> <!-- cd-image-container -->
  <div class="mt-4">
  <p class="lead alert alert-dark" role="alert"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum orci nibh. Nam ullamcorper, nisi eu consequat porttitor, eros elit consequat elit, non egestas orci urna ac mauris. Sed vehicula non nunc efficitur mollis. Aenean in faucibus turpis, non consequat ante. Cras nec dolor turpis. Aenean velit nisi, placerat eget rhoncus eu, porttitor id purus. Aliquam massa sapien, euismod a efficitur eu, semper ac enim. Ut odio mi, posuere quis magna a, malesuada consequat ante. Integer tincidunt ultrices lectus, non gravida elit feugiat quis. Donec molestie orci est, eu vehicula purus tristique nec. Cras et consequat arcu. Morbi a rutrum sapien. Mauris eget lorem aliquet, hendrerit risus id, consequat enim.</p>
  </div>
</div>

</div>
</div>

</div>
</body>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script> <!-- Resource jQuery -->
<script src="js/main.js"></script> <!-- Resource jQuery -->
</html>
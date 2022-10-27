<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
	include("config.php");
?>
<html lang="">
<head>
	<title>Astro's Rock Collection</title>
    <script src="js\bootstrap.js"></script>
    <script src="js\jquery-3.6.0.js"></script>
	<link href="css\bootstrap.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
		load_data();
		function load_data(query)
		{
			$.ajax({
			url:"searchresult.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
		}
		$('#search').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
		});
	});
	</script>
</head>
<body>
<div class="container-fluid">       
<div class="content-wrapper">
	<div class="container">
        <div class="row mb-3">
            <div class="col-md-3 themed-grid-col "><img src="img/lusolit_logo%20smol.png" class="img-thumbnail" /></div>
            <div class="col-md-8 themed-grid-col align-self-end"><h1>Luso Lit</h1></div>
        </div>
		<div class="row margin-top:5px">
		<div class="col-sm-12 ">
            <label for="search"></label><input type="text" name="search" id="search" placeholder="Search" class="form-control" />
			
			<div class='mt-2' id="result"></div>
		</div>
		</div>	
	</div>
</div>
</div>
</body>
</html>
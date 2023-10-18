<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php 
	include("config.php");

    ?>
<html lang="">
<!--
MIT License

Copyright (c) 2022 Jack Acres

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Luso Lit</title>
    <script src="js\bootstrap.js"></script>
    <script src="js\jquery-3.6.0.js"></script>
	<link href="css\bootstrap.css" rel="stylesheet">
	<script>
        <!-- This is AJAX/jQuery code which fetches the data returned from SQL via searchresult.php. It then allows the data to be added to a realtime searchable table -->
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
    <?php include('header.php')?>
</head>
<body class="d-flex flex-column">

<!-- Below constructs the search box for the table-->
<div class="pt-lg-5">
<div class="container-fluid">
<div class="content-wrapper">
	<div class="container">
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
<?php include('footer.php')?>
</html>


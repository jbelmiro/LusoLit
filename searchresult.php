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

require ('config.php');
$name = 1;
$return = '';

// This bit of PHP runs the query from the search box on list.php.
//It will run a query looking for geosamples.name, geosamples.id, geosamples.location, geoprovenance.state, geosamples.thinsection_id based on what is entered in the search box and filter accordingly.
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	//Below is the query that is sent to the SQL server
	$query = "SELECT DISTINCT geosamples.name, geosamples.id, geosamples.location, geoprovenance.state, geosamples.thinsection_id FROM geosamples INNER JOIN geoprovenance ON geosamples.id = geoprovenance.geosamples_id
	WHERE geosamples.name  LIKE '%".$search."%' 
	OR location LIKE '%".$search."%' 
	OR state LIKE '%".$search."%'
	";}
else
// If no query is submitted (nothing is searched) then the sql query is set to just return all items in the database.
{
	$query = "SELECT geosamples.name, geosamples.id, geosamples.location, geoprovenance.state, geosamples.thinsection_id FROM geosamples INNER JOIN geoprovenance ON geosamples.id = geoprovenance.geosamples_id;
    ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
//If the database actually has data in it, then a table is constructed and each item is added to a row.
{

	$return .='
	<div class="table-responsive" >
	<table class="table table-striped">
	<thead>
	<tr>
		<th scope="col" style="color:#A03232">ID</th>
		<th scope="col" style="color:#A03232">Location</th>
		<th scope="col" style="color:#A03232">Outcrop State</th>
		<th scope="col" style="color:#A03232">Thin Section</th>
	</thead>
	</tr>
	';
	while($row1 = mysqli_fetch_array($result))
	{
		// This is some dirty code to flag whether the samples have a thinsection or not. If their thinsection ID greater than 0 then yes, if not, then no.
    if ($row1['thinsection_id'] > 0){
    $thin = 'Yes';
    } else {
    $thin = 'No';
    }


$return .= '
		<tr>
		<td><a href="rock.php?id=' . $row1['id'] . '" style="color:#A03232; text-decoration: none">' . $row1['name'] . ' </a></td>
		<td>'.$row1["location"].'</td>
		<td>'.$row1["state"].'</td>
		<td>'.$thin.'</td>

		</tr>
		';
	}
	echo $return;
	}
else
{
	echo 'No results containing all your search terms were found.';
}
?>


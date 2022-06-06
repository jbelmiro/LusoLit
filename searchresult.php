<?php
require ('config.php');
$name = 1;
$return = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT DISTINCT geosamples.name, geosamples.longitude, geosamples.latitude, geosamples.location, geosamples.id, storage.storage_id, storage.city FROM geosamples INNER JOIN storage ON geosamples.storage_id = storage.storage_id
	WHERE name  LIKE '%".$search."%'
	OR location LIKE '%".$search."%' 
	OR longitude LIKE '%".$search."%' 
	OR latitude LIKE '%".$search."%' 
	OR city LIKE '%".$search."%'
	";}
else
{
	$query = "SELECT DISTINCT geosamples.name, geosamples.longitude, geosamples.latitude, geosamples.location, geosamples.id, storage.storage_id, storage.city FROM geosamples INNER JOIN storage ON geosamples.storage_id = storage.storage_id;
    ";
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
		<td>'.$row1["location"].'</td>
		<td>'.$row1["longitude"].'</td>
		<td>'.$row1["latitude"].'
		</td><td>'.$row1["city"].'</td>

		</tr>';
	}
	echo $return;
	}
else
{
	echo 'No results containing all your search terms were found.';
}
?>


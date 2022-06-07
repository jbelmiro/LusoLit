<?php
require ('config.php');
$name = 1;
$return = '';


if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT DISTINCT geosamples.name, geosamples.longitude, geosamples.latitude, geosamples.location, geosamples.id, geosamples.researcher, storage.storage_id, storage.city, outcrop.age, geoprovenance.*, thinsection_id FROM geosamples INNER JOIN storage ON geosamples.storage_id = storage.storage_id INNER JOIN thinsection ON geosamples.thinsection_id = thinsection.thin_id INNER JOIN outcrop on geosamples.outcrop_id = outcrop.id INNER JOIN geoprovenance on geoprovenance.geosamples_id = geosamples.id
	WHERE geosamples.name  LIKE '%".$search."%'
	OR location LIKE '%".$search."%' 
	OR longitude LIKE '%".$search."%' 
	OR latitude LIKE '%".$search."%' 
	OR city LIKE '%".$search."%'
	OR age LIKE '%".$search."%'
	";}
else
{
	$query = "SELECT geosamples.*, storage.*, outcrop.*, thinsection.thin_id, geoprovenance.* FROM geosamples INNER JOIN storage ON geosamples.storage_id = storage.storage_id INNER JOIN thinsection ON geosamples.thinsection_id = thinsection.thin_id INNER JOIN outcrop on geosamples.outcrop_id = outcrop.id INNER JOIN geoprovenance on geoprovenance.geosamples_id = geosamples.id;
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
		<th scope="col">ID</th>
		<th scope="col">Location</th>
		<th scope="col">Outcrop State</th>
		<th scope="col">Thin Section</th>
	</thead>
	</tr>';
	while($row1 = mysqli_fetch_array($result))
	{
		$thin = ($row1["thinsection_id"]=='0')? "Yes" : "No";

		$return .= '
		<tr>
		<td><a href="rock.php?id=' . $row1['id'] . '">' . $row1['name'] . '</a></td>
		<td>'.$row1["location"].'</td>
		<td>'.$row1["state"].'</td>
		</td><td>'.$thin.'</td>

		</tr>';
	}
	echo $return;
	}
else
{
	echo 'No results containing all your search terms were found.';
}
?>


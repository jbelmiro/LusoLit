<?php
require ('config.php');
$name = 1;
$return = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT * FROM rocks
	WHERE Rock  LIKE '%".$search."%'
	OR Taste LIKE '%".$search."%' 
	OR Look LIKE '%".$search."%' 
	OR Emotion LIKE '%".$search."%' 
	";}
else
{
	$query = "SELECT * FROM rocks";
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
		<td><a href="rock.php?id=' . $row1['ID'] . '">' . $row1['Rock'] . '</a></td>
		<td>'.$row1["Taste"].'</td>
		<td>'.$row1["Look"].'</td>
		<td>'.$row1["Emotion"].'</td>
		</tr>';
	}
	echo $return;
	}
else
{
	echo 'No results containing all your search terms were found.';
}
?>


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


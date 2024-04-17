<?php include('db/db.php') ?>
<?php
// Check if any data was sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if any data is set in the $_POST array
    if (!empty($_POST)) {
        $name = $_POST['Name'];
        $description = $_POST['Description'];
        $sql = "INSERT INTO items(Name,Description) VALUES ('$name','$description')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo json_encode(array("statusCode"=>200));
        }else{
            echo json_encode(array("statusCode"=>201));
        }
    } 
    else {
        echo "No data received.";
    }
} else {
    echo "This endpoint only accepts POST requests.";
}
$sql = "SELECT * FROM items";
$result = mysqli_query($conn, $sql);
$num_row = mysqli_num_rows($result);
if($num_row > 0){
  while($row = mysqli_fetch_assoc($num_row)) {
    ?>
    <tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['Name']; ?></td>
			<td><?php $row['Description']; ?></td>
		</tr>
    <?php
  }

}else{
  echo 'No Record';
}
?>

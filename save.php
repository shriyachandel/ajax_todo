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
            // Fetch the inserted data
            $selectSql = "SELECT * FROM items";
            $selectResult = mysqli_query($conn, $selectSql);
            $num_rows = mysqli_num_rows($selectResult);
            if($num_rows > 0){
                while($row = mysqli_fetch_assoc($selectResult)) {
                    ?>
                    <tr>
                        <td><?php echo $row['Id']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Description']; ?></td> <!-- Added echo here -->
                    </tr>
                    <?php
                }
            }
            else {
                echo 'No Record';
            }
            echo json_encode(array("statusCode"=>200)); // Returning number of rows in response
        } else {
            echo json_encode(array("statusCode"=>201, "error"=>mysqli_error($conn))); // Return error if insertion failed
        }
    } 
    else {
        echo "No data received.";
    }
} else {
    echo "This endpoint only accepts POST requests.";
}
?>

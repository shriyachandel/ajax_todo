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
    } 
    else {
        echo "1";
    }
} else {
    echo "0";
}
?>

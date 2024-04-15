<?php
// Check if any data was sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if any data is set in the $_POST array
    if (!empty($_POST)) {
        $name = $_POST['Name'];
        $description = $_POST['Description'];
    } else {
        echo "No data received.";
    }
} else {
    echo "This endpoint only accepts POST requests.";
}
?>

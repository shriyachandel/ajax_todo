<?php include('db/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST)) {
        $name = $_POST['Name'];
        $description = $_POST['Description'];
        $sql = "INSERT INTO items(Name, Description) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $name, $description);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $selectSql = "SELECT * FROM items";
            $selectResult = mysqli_query($conn, $selectSql);
            $rows = [];
            while ($row = mysqli_fetch_assoc($selectResult)) {
                $rows[] = $row;
            }
            echo json_encode(array("statusCode" => 200, "data" => $rows));
        } else {
            echo json_encode(array("statusCode" => 201, "error" => mysqli_error($conn)));
        }
    } else {
        echo json_encode(array("statusCode" => 400, "error" => "No data received."));
    }
} else {
    echo json_encode(array("statusCode" => 405, "error" => "This endpoint only accepts POST requests."));
}
?>

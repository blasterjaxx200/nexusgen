<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data'])) {
        $data = $_POST['data'];
        file_put_contents('test.txt', $data);
        echo "File updated successfully";
    } else {
        echo "No data received";
    }
} else {
    echo "Invalid request method";
}
?>

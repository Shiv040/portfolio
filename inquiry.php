<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    echo json_encode($_POST, JSON_PRETTY_PRINT);
} else {
    echo "Please submit the form using POST method.";
}
?>
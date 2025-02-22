<?php
include('../conn.php');
header('Content-Type: application/json');

if (!isset($_GET['category_id'])) {
    echo json_encode(['error' => 'Category ID is required']);
    exit;
}
$category_id = intval($_GET['category_id']);

$query = "SELECT s.service_id, s.service_name, s.category_id, s.description, vc.category_name
        FROM service s
        JOIN vendor_categories vc ON vc.category_id = s.category_id
        WHERE vc.category_id = ?";

if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $services = [];
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }

    $stmt->close();

    echo json_encode(!empty($services) ? $services : ['message' => 'No services found for this category']);
} else {
    echo json_encode(['error' => 'Database query failed']);
}

$conn->close();
?>
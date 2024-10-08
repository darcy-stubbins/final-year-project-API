//function to update a record
<?php
header('Content-Type: application/json');
include "../flutter_api/db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$age = (int) $_POST['age'];

$stmt = $db->prepare("UPDATE student SET name = ?, age = ? WHERE id = ?");
$result = $stmt->execute([$name, $age, $id]);

echo json_encode([
    'success' => $result
]);
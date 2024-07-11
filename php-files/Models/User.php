<?php
// header('Content-Type: application/json');
// include "../flutter_api/db.php";


// $user_name = $_POST['user_name'];



namespace Models;

use Classes\Model;

class User extends Model
{
    public function create(array $data)
    {
        $stmt = $this->db->prepare("INSERT INTO users (user_name) VALUES (?)");
        $result = $stmt->execute(array_values($data));

        echo json_encode([
            'success' => $result
        ]);
    }
}
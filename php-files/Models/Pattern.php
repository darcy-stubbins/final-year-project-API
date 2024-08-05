<?php

namespace Models;

use Classes\Model;

class Pattern extends Model
{
    //function to add a pattern to the db 
    public function create(array $data)
    {
        $stmt = $this->db->prepare("INSERT INTO patterns (pattern_name, pdf_path) VALUES (?, ?)");
        $result = $stmt->execute(array_values($data));

        return json_encode([
            'pattern added' => $result
        ]);
    }

    //function to show patterns 
    public function show(int $id, array $data): string
    {
        $stmt = $this->db->prepare("SELECT * FROM patterns WHERE id=?");
        $stmt->execute([$id]);
        $pattern = $stmt->fetch();

        return json_encode([
            $pattern
        ]);
    }

    //function to add comments to a pattern 
    public function postPatternComment(array $data)
    {
        $stmt = $this->db->prepare("INSERT INTO comments (pattern_id, user_id, comment_body) VALUES (?, ?, ?)");
        $result = $stmt->execute(array_values($data));

        return json_encode([
            'comment addded' => $result
        ]);
    }

    //function to show comments on a pattern 
    public function getPatternComments(int $id, array $data)
    {
        $stmt = $this->db->prepare("SELECT * FROM comments JOIN patterns ON comments.pattern_id = patterns.id WHERE comments.user_id=?");
        $stmt->execute([$id]);
        $comments = $stmt->fetchAll();

        return json_encode([
            $comments
        ]);
    }

    //function to add a like to a pattern 
    public function postPatternLike(array $data)
    {
        $stmt = $this->db->prepare("INSERT INTO likes (user_id, pattern_id) VALUES (?, ?)");
        $result = $stmt->execute(array_values($data));

        return json_encode([
            'pattern liked' => $result
        ]);
    }
}
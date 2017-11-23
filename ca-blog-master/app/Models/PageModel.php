<?php

class PageModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Get single post ( [0]'st element from results array)
    public function getPage(string $id): array
    {
        return $this->db->select("SELECT * FROM pages WHERE id = :id", ["id" => $id])[0];
    }

    // Get all posts
    public function getAllPages(): array
    {
        return $this->db->select("SELECT * FROM pages");
    }

    public function paginate(int $limit, int $offset) :array {
        return $this->db->select("SELECT * FROM pages LIMIT :limit OFFSET :offset",
            [
                'limit' => $limit,
                'offset' => $offset
            ]);
    }



}

<?php

class BlogModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }



    // Get all posts
    public function getAll(): array
    { //SELECT SUBSTR(column, start_position, desired_length) FROM some_table
        return $this->db->select("SELECT * ,SUBSTR(body, 1, 150) as body FROM posts");
    }

    public function getSinglePost($id): array
    {
        return $this->db->select("SELECT * FROM posts WHERE id = :id",
            ['id' => $id])[0];
    }

    public function search(string $query): array
    {
        $query = "%".$query."%";
        return $this->db->select("SELECT * ,SUBSTR(body, 1, 150) as body FROM posts WHERE upper(title) like upper(?) OR upper(body) like upper(?)",
            ["%$query%", "%$query%"]);
    }

    public function paginate(int $limit, int $offset) :array {
        return $this->db->select("SELECT *, SUBSTR(body, 1, 100) as body FROM posts LIMIT :limit OFFSET :offset",
                        [
                                'limit' => $limit,
                                'offset' => $offset
                                ]);
    }

    public function destroy(int $id) : bool{
        return $this->db->remove("DELETE FROM posts WHERE id = :id",
            ["id" => $id]);
    }

    public function update(int $id ,string $title, string $body) : bool{
        return $this->db->update("UPDATE posts SET title = :title , body = :body WHERE id = :id",
            ["id" => $id,
                "title" => $title,
                "body" => $body
                ]);
    }





}

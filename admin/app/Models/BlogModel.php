<?php

class BlogModel{

    private $db;

    public function __construct($db){

        $this->db = $db;
    }

    public function getAll(): array
    {
        return $this->db->select("SELECT * FROM users");
    }

    public function getSingle(int $id){
        return $this->db->select("SELECT *FROM users WHERE GIMIMO_METAI = :GIMIMO_METAI", ["GIMIMO_METAI" =>$id])[0];
    }

    public function search( string $query): array{

        return $this->db->select("SELECT * from users WHERE GIMIMO_METAI LIKE ? or GIMIMO_VALSTYBE LIKE ?" , ["%$query%", "%$query%"]);

    }

    public function paginate(int $limit, int $offset) :array {
        return $this->db->select("SELECT * FROM users LIMIT :limit OFFSET :offset",
                        [
                                'limit' => $limit,
                                'offset' => $offset
                                ]);
    }

    public function destroy(int $id) : bool{
        return $this->db->remove("DELETE FROM users WHERE GAT_ID = :GAT_ID",
            ["GAT_ID" => $id]);
    }

    public function update(int $id ,string $title, string $body) : bool{
        return $this->db->update("UPDATE users SET GIMIMO_METAI = :GIMIMO_METAI, body = :body WHERE GAT_ID = :GAT_ID",
            ["GAT_ID" => $id,
                "title" => $title,
                "body" => $body
                ]);
    }

}
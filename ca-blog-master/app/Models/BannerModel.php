<?php


class BannerModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Get banners
    public function getBanners($count = 3): array
    {
        return $this->db->select("SELECT * , rand() as rand FROM banners ORDER BY rand LIMIT $count");
    }

    public function getAllBanners(): array
    {
        return $this->db->select("SELECT * FROM banners ");
    }

    public function paginate(int $limit, int $offset): array
    {
        return $this->db->select("SELECT * FROM banners LIMIT :limit OFFSET :offset",
            [
                'limit' => $limit,
                'offset' => $offset
            ]);
    }

    public function destroy(int $id): bool
    {
        return $this->db->remove("DELETE FROM banners WHERE id = :id",
            ["id" => $id]);
    }

    public function update(int $id, string $name, string $link, string $image): bool
    {
        return $this->db->update("UPDATE banners SET name = :name , link = :link, image= :image WHERE id = :id",
            ["id" => $id,
                "name" => $name,
                "link" => $link,
                "image" => $image
            ]);
    }
}
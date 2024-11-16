<?php
class Comment {
    private $conn;
    private $table = 'comments';
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
  

    public function create($post_id, $author_id, $body) {
        $query = "INSERT INTO $this->table (post_id, author_id, body) VALUES (:post_id, :author_id, :body)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':author_id', $author_id);
        $stmt->bindParam(':body', $body);
        return $stmt->execute();
    }

    public function getByPostId($post_id) {
        $query = "SELECT * FROM $this->table WHERE post_id = :post_id ORDER BY created_at ASC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
      // Fetch comment by ID
      public function getById($id)
      {
          $query = $this->db->prepare("SELECT * FROM comments WHERE id = ?");
          $query->execute([$id]);
          return $query->fetch(PDO::FETCH_ASSOC);
      }
      // Update comment
      public function update($id, $body)
      {
          $query = $this->db->prepare("UPDATE comments SET body = :body, updated_at = NOW() WHERE id = :id");
          $query->bindParam(':body', $body);
          $query->bindParam(':id', $id);
          return $query->execute();
      }
  
      // Delete comment
      public function delete($id)
      {
          $query = $this->db->prepare("DELETE FROM comments WHERE id = ?");
          return $query->execute([$id]);
      }
}
?>

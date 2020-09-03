<?php


class Post{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        $this->db->query('SELECT * FROM posts');
        return $this->db->resultSet();
    }

    public function addPost($data) {
        $this->db->query('INSERT INTO posts (firstname, lastname, filename) VALUES (:firstname, :lastname, :filename)');
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':filename', $data['filename']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

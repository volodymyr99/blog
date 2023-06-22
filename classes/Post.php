<?php 

class Post extends QueryBuilder {

    public $successPost;

    public function createPost($userId){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $createdAt = date('Y-m-d');

        $sql = 'INSERT INTO posts VALUES(NULL,?,?,?,?)';
        $query = $this -> db -> prepare($sql);
        $query -> execute([$title,$description,$createdAt,$userId]);

        if($query) {
            $this -> successPost = true;

        } else {
            $this -> successPost = false;
        }

    }

    public function getAll() {
        $sql = 'SELECT * from posts';
        $query = $this -> db -> prepare($sql);
        $query -> execute();
        $posts = $query -> fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }

    public function getUser($userId) {
        $sql = 'SELECT * FROM users WHERE id=?';
        $query = $this -> db -> prepare($sql);
        $query -> execute([$userId]);
        $userPost = $query->fetch(PDO::FETCH_OBJ);
        $name = $userPost->name;
        return $name;
    }

    public function deletePost($postId) {
        $sql = 'DELETE FROM posts WHERE id = ?';
        $query = $this -> db -> prepare($sql);
        $query -> execute([$postId]);
    }

    public function getAllUserPosts($userId) {
        $sql = 'SELECT * FROM posts WHERE user_id=?';
        $query = $this -> db -> prepare($sql);
        $query -> execute([$userId]);
        $userPosts = $query->fetchAll(PDO::FETCH_OBJ);
        return $userPosts;
    }

    public function getSinglePost($postId) {
        $sql = 'SELECT * FROM posts WHERE id=?';
        $query = $this -> db -> prepare($sql);
        $query -> execute([$postId]);
        $singlePost = $query->fetch(PDO::FETCH_OBJ);
        return $singlePost;
    }

    public function getAllComments($postId) {
        $sql = 'SELECT * from comments WHERE id_post=?';
        $query = $this -> db -> prepare($sql);
        $query -> execute([$postId]);
        $allComments = $query -> fetchAll(PDO::FETCH_OBJ);
        return $allComments;
    }

    public function addComment($podtId){

        $comment = $_POST['description'];
        $createdAt = date('Y-m-d');

        $sql = 'INSERT INTO comments VALUES(NULL,?,?,?)';
        $query = $this -> db -> prepare($sql);
        $query -> execute([$description,$postId,$createdAt]);

        if($query) {
            $this -> successPost = true;

        } else {
            $this -> successPost = false;
        }

    }
}


?>
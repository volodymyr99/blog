<?php 

class Profile extends QueryBuilder {

    public function userPosts($userId) {

        $sql = "SELECT users.name,users.id, posts.user_id 
        FROM users
        INNER JOIN posts
        ON users.id = posts.user_id
        WHERE posts.user_id = $userId";
        $query = $this -> db -> query($sql);
        $query -> execute();
        $result = $query -> fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}



?>
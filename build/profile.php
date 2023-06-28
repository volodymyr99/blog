<?php 

require "bootstrap.php";

if(isset($_SESSION['loggedUser'])){
    $userId = $_SESSION['loggedUser']->id;
    $userPosts = $post -> getAllUserPosts($userId);
}

require "views/profile.view.php";



?>
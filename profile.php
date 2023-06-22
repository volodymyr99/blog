<?php 

require "bootstrap.php";

if(isset($_SESSION['loggedUser'])){
    $userId = $_SESSION['loggedUser']->id;
    $userPosts = $post -> getAllUserPosts($userId);
}

//view
require "views/profile.view.php";



?>
<?php 

require "bootstrap.php";


if(isset($_POST['postBtn'])) {
    $post -> createPost($_SESSION['loggedUser']->id);
}


require "views/add.post.view.php";

?>
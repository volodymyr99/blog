<?php 

require "bootstrap.php";

$postId = $_GET['id'];

$singlePost = $post -> getSinglePost($postId);

$comments = $post->getAllComments($postId);


require "views/single.view.php";

?>
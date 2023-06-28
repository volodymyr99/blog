<?php 

require "bootstrap.php";

$id = $_POST['id'];

$post -> addComment($id);

require "views/add.comment.view.php";


?>
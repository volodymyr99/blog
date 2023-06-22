<?php 

require "bootstrap.php";

$id = $_POST['id'];

$post -> addComment($id);

//header("Location: index.php");
require "views/add.comment.view.php";


?>
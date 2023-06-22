<?php 

require "bootstrap.php";

$id = $_GET['id'];

$post -> deletePost($id);

header("Location: index.php");


?>
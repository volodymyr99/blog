<?php 

require "bootstrap.php";

$posts = $post -> getAll();

require "views/index.view.php";


?>
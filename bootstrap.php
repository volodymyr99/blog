<?php 

session_start();

$config = require "config.php";

require "classes/Connection.php";
$db = Connection::connect($config['database']);


require "classes/QueryBuilder.php";

$query = new QueryBuilder($db);

require "classes/Profile.php";

$profile = new Profile($db);

require "classes/User.php";

$user = new User($db);

require "classes/Post.php";

$post = new Post($db);



?>
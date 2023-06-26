<?php 

require "bootstrap.php";


if(isset($_POST['resetBtn'])){
    $user -> passwordresetUser();
}


require "views/password_reset.view.php";


<?php 

class User extends QueryBuilder {

    public $successRegister;
    public $successLogin;

    public function registerUser(){
        $name = $_POST['name'];
        $email = $_POST['register_email'];
        $password = $_POST['register_password'];

        $sql = 'INSERT INTO users VALUES(NULL,?,?,?)';
        $query = $this -> db -> prepare($sql);
        $query -> execute([$name,$email,$password]);

        if($query) {
            $this -> successRegister = true;
        } else {
            $this -> successRegister = false;
        }

    }

    public function loginUser() {
        $email = $_POST['login_email'];
        $password = $_POST['login_password'];

        $sql = 'SELECT * FROM users WHERE email=? AND password=?';
        $query = $this -> db -> prepare($sql);
        $query -> execute([$email,$password]);
        $checkedUser = $query->fetchAll(PDO::FETCH_OBJ);

        if(count($checkedUser) > 0) {
            $this -> successLogin = true;
            $_SESSION['loggedUser'] = $checkedUser[0];

        } else {
            $this -> successLogin = false;
        }
    }

}


?>
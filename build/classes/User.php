<?php 

class User extends QueryBuilder {

    public $successRegister;
    public $successLogin;
    public $successReset;

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

    public function passwordresetUser(){
        $email = $_POST['email'];
        $sql = 'SELECT * FROM users WHERE email=?';
        $query = $this -> db -> prepare($sql);
        $query -> execute([$email]);
        $query = $query->fetch(PDO::FETCH_OBJ);

        if ($query) {
            $arr_large = ['A', 'B', 'C', 'D', 'E', 'F', 'H', 'K', 'L', 'M', 'N', 'P', 'R', 'S', 'T', 'X', 'Y', 'Z'];
            $arr_small = ['a', 'b', 'c', 'd', 'e', 'f', 'h', 'k', 'm', 'n', 'p', 's', 't', 'x', 'y', 'z'];
            $password = $arr_large[mt_rand(0, 17)].$arr_small[mt_rand(0, 15)].$arr_small[mt_rand(0, 15)].mt_rand(10000,99999);

            $sql = "UPDATE users SET password=$password WHERE email=$email";
            $query = $this -> db -> prepare($sql);
            $query -> execute();

                        $this -> successReset = true;
        }
        else {
            $this -> successReset = false;
        }
    }

}


?>
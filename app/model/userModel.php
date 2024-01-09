<?php
    require_once('../config/database.php');

    class UserModel
    {
        private $idUser;
        private $name;
        private $username;
        private $email;
        private $password;
        private $picture;
        private $role;
        private $conn;

        public function __construct()
        {

            $this->conn = Database::getDb()->getConn();
        }


        public function getIdUser()
        {
            return $this->idUser;
        }

        public function setIdUser($idUser)
        {
            $this->idUser = $idUser;
        }
        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }
        public function getUsername()
        {
            return $this->username;
        }

        public function setUsername($username)
        {
            $this->username = $username;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }
        public function getPicture()
        {
            return $this->picture;
        }

        public function setPicture($picture)
        {
            $this->picture = $picture;
        }
        public function getRole()
        {
            return $this->role;
        }

        public function setRole($role)
        {
            $this->role = $role;
        }

  
        public function register()

        {
            $emailCheckQuery = "SELECT COUNT(*) FROM user WHERE email=:email";
            $emailCheckStmt = $this->conn->prepare($emailCheckQuery);
            $emailCheckStmt->bindParam(":email", $this->email);
            $emailCheckStmt->execute();
            $emailCount = $emailCheckStmt->fetchColumn();

            if ($emailCount > 0) {
                return "L'email existe déjà.";
            }

            $this->password = password_hash($this->password, PASSWORD_DEFAULT);

            $query = "INSERT INTO `user` (name, username, email, password, picture,role)
                    VALUES (:name, :username, :email, :password, :picture,'auteur')";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":picture", $this->picture);

            $stmt->execute();
        }

        public function login()
        {
            $query = "SELECT * FROM user WHERE email=:email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result && password_verify($this->password, $result['password'])) {
               
                return $result;
            } else {
                return false;
            }
        }

        public function logout()
        {
            session_destroy();
            header("Location: ../services/view/logout.php");
            exit();
        }
    }
    ?>

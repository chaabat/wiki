<?php

require_once(__DIR__ . '/../../config/database.php');

require_once(__DIR__ .'/../../model/userModel.php');
require_once(__DIR__ .'/../interfaces/userInterface.php');

class UserImp extends DataBase implements UserInterface{

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

     $this->pass = password_hash($this->pass, PASSWORD_DEFAULT);

     $query = "INSERT INTO `user` (nom, prenom, email, pass, tel,role)
             VALUES (:username, :surname, :email, :password, :tel,'auteur')";

     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(":username", $this->nom);
     $stmt->bindParam(":surname", $this->prenom);
     $stmt->bindParam(":email", $this->email);
     $stmt->bindParam(":password", $this->pass);
     $stmt->bindParam(":tel", $this->tel);

     $stmt->execute();
 }

 public function login()
 {
     $query = "SELECT * FROM user WHERE email=:email";
     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(":email", $this->email);
     $stmt->execute();
     $result = $stmt->fetch(PDO::FETCH_ASSOC);

     if ($result && password_verify($this->pass, $result['pass'])) {
        
         return $result;
     } else {
         return false;
     }
 }

 public function logout()
 {
     session_destroy();
     header("Location: ../view/login.php");
     exit();
 }
}
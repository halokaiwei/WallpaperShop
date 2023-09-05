<?php
     $conn = new mysqli('localhost','root','','');
     if ($conn->connect_error) {
         die ('Connection failed...' . $conn->connect_error );
     }
     //create database
     $sql = "CREATE DATABASE IF NOT EXISTS users";
     if ($conn->query($sql) === TRUE) {
     }
     else {
        echo "<script> alert('Database users create failed')" . $conn -> error . "\n </script>";

     }
     //create table users
     $conn->select_db('users');
     $sql = "CREATE TABLE IF NOT EXISTS loging (
         id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(100) NOT NULL UNIQUE,
         password VARCHAR(100) NOT NULL
        )";
     if ($conn->query($sql) === TRUE) {
     }
     else {
         echo "<script> alert('Table loging create failed')" . $conn -> error . "\n </script>";
     }
     

     $conn->close();
 


?>
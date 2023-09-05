<?php 
    $conn = new mysqli('localhost','root','','');
    if ($conn->connect_error) {
        die ('Connection failed...' . $conn->connect_error );
    }
    //create database
    $sql = "CREATE DATABASE IF NOT EXISTS wallpaperDB";
    if ($conn->query($sql) === TRUE) {
    }
    else {
        echo "<script> alert('Database wallpaperDB create failed')" . $conn -> error . "\n </script>";

    }
    //create table wallpapers
    $conn->select_db('wallpaperDB');
    $sql = "CREATE TABLE IF NOT EXISTS wallpapers (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(40) NOT NULL,
        description TEXT,
        category VARCHAR(20) NOT NULL,
        image LONGBLOB NOT NULL,
        price INT(10) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
    }
    else {
        echo "<script> alert('Table wallpapers create failed')" . $conn -> error . "\n </script>";

    }
    //create table contactUs
    $sql = "CREATE TABLE IF NOT EXISTS contactUs (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(40) NOT NULL,
        email VARCHAR(40) NOT NULL,
        telno VARCHAR(15) NOT NULL,
        feedback VARCHAR(20) NOT NULL,
        suggestions TEXT NOT NULL,
        image LONGBLOB
    )";
    if ($conn->query($sql) === TRUE) {
    }
    else {
        echo "<script> alert('Table contactUs create failed')" . $conn -> error . "\n </script>";

    }
    $sql = "CREATE TABLE IF NOT EXISTS wishlist (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        image LONGBLOB
    )";
    if ($conn->query($sql) === TRUE) {
    }
    else {
        echo "Table wishlist create failed" . $conn -> error;
    }
    $conn->close();

?>
<?php
const DB_NAME = "forum";
const DB_USER = "root";
const DB_PASS = '';
const DB_HOST = 'localhost';
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(!$con){
    exit("Error: can't establish the database connection!");
}
if(!mysqli_select_db($con,DB_NAME)){
    exit("Error: can't connect to the database");
}
?>